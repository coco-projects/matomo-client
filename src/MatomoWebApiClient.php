<?php

    namespace Coco\matomo;

    use Coco\simplePageDownloader\Downloader;

    // token 的使用讲究
    // How do I fix the tracking failure ‘Request was not authenticated but should have’
    // https://matomo.org/faq/how-to/faq_30835/

    // Which HTTP request headers are used by Matomo?
    // https://matomo.org/faq/general/faq_21023/

    // 源代码参考
    // https://github.com/matomo-org/matomo-php-tracker/blob/master/MatomoTracker.php
    // https://github.com/matomo-org/plugin-VisitorGenerator/blob/5.x-dev/Faker/Request.php

    class MatomoWebApiClient extends MatomoClient
    {
        private static array $ins = [];

        private function __construct(public string $apiUrl, public string $token, int $siteId)
        {
            parent::__construct($siteId);

            Downloader::initClientConfig([
                'timeout' => 60.0,
                'verify'  => false,
                'debug'   => false,
            ]);
        }

        public static function getClient(string $apiUrl, string $token, int $siteId): static
        {
            $apiUrl = rtrim($apiUrl, '/');

            $hash = static::makeHash($apiUrl, $token, $siteId);

            if (!isset(static::$ins[$hash]))
            {
                static::$ins[$hash] = new static($apiUrl, $token, $siteId);
            }

            return static::$ins[$hash];
        }

        private function makeRequests($uvs): array
        {
            $requests = [];

            foreach ($uvs as $uv)
            {
                $requests = array_merge($requests, $uv->makeRequests($this->siteId));
            }

            return $requests;
        }

        private function apiEndpoint(): string
        {
            return $this->apiUrl . '/matomo.php';
        }

        private static function makeHash(string $apiUrl, string $token, string $siteId): string
        {
            return md5($apiUrl . $token . $siteId);
        }

        public function sendRequest(): void
        {
            $ins = Downloader::ins();
            $ins->setCachePath('../downloadCache');

            $this->eachChunks(function($uvsChunk, $k) use (&$ins) {
                $request = $this->makeRequests($uvsChunk);

                $ins->setEnableCache(false);
                $ins->addBatchRequest($this->apiEndpoint(), 'post', [
                    'User-Agent' => "Mozilla/5.0 (Linux; Android 9; STK-AL00 Build/HUAWEISTK-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/1.0",
                    'body'       => json_encode([
                        "requests"   => $request,
                        'token_auth' => $this->token,
                    ], 256),
                ]);

                $ins->setSuccessCallback(function(string $contents, Downloader $_this, $response, $index) {
                    $requestInfo = $_this->getRequestInfoByIndex($index);

                    $this->logInfo($contents);
                });

                $ins->setErrorCallback(function($e, Downloader $_this, $index) {
                    $this->logInfo('出错：' . $e->getMessage());
                });

                $ins->setOnDoneCallback(function(Downloader $_this) {
//                    $this->logInfo('done');
                });

                $this->logInfo('发送中，共(' . $this->getUvsCount() . ')个uv,当前第(' . (($k * $this->chunkSize) + 1) . '-' . (($k + 1) * $this->chunkSize) . ')个');
                $ins->send();
                $this->logInfo('uv发送成功');
            });

            $this->restoreStatus();
        }

    }

