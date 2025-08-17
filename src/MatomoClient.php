<?php

    namespace Coco\matomo;

    use Coco\magicAccess\MagicMethod;
    use Coco\simplePageDownloader\Downloader;
    use \Exception;

    // token 的使用讲究
    // How do I fix the tracking failure ‘Request was not authenticated but should have’
    // https://matomo.org/faq/how-to/faq_30835/

    // Which HTTP request headers are used by Matomo?
    // https://matomo.org/faq/general/faq_21023/

    // 源代码参考
    // https://github.com/matomo-org/matomo-php-tracker/blob/master/MatomoTracker.php
    // https://github.com/matomo-org/plugin-VisitorGenerator/blob/5.x-dev/Faker/Request.php

    class MatomoClient
    {
        private array       $uvs           = [];
        private int         $chunkSize     = 100;
        private static bool $enableEchoLog = false;

        private static array $ins = [];

        private function __construct(public string $apiUrl, public string $token, public int $siteId)
        {
            Downloader::initClientConfig([
                'timeout' => 60.0,
                'verify'  => false,
                'debug'   => false,
            ]);
        }

        public static function enableEchoLog($enable = true): void
        {
            static::$enableEchoLog = $enable;
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


        public function setChunkSize(int $chunkSize): static
        {
            $this->chunkSize = $chunkSize;

            return $this;
        }

        public function addUv(Uv $uv): void
        {
            $this->uvs[] = $uv;
        }

        public function importUvs(array $uvs): static
        {
            foreach ($uvs as $k => $uv)
            {
                $this->addUv($uv);
            }

            return $this;
        }

        private function makeRequests(): array
        {
            $requests = [];

            foreach ($this->uvs as $uv)
            {
                $requests = array_merge($requests, $uv->makeRequests($this->siteId));
            }

            return $requests;
        }

        /*--------------------------------------------------------------------------------*/

        public function sendRequest(): bool
        {
            Downloader::initLogger('matomo_log', static::$enableEchoLog, !true);

            $ins = Downloader::ins();
            $ins->setCachePath('../downloadCache');

            $requests = $this->makeRequests();

            $requestsChunk = array_chunk($requests, $this->chunkSize);

            $chunkCount    = count($requestsChunk);
            $requestsCount = count($requests);

            foreach ($requestsChunk as $k => $request)
            {
                $data = [
                    "requests"   => $request,
                    'token_auth' => $this->token,
                ];

                $ins->setEnableCache(false);
                $ins->addBatchRequest($this->apiEndpoint(), 'post', [
                    'User-Agent' => "Mozilla/5.0 (Linux; Android 9; STK-AL00 Build/HUAWEISTK-AL00; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/76.0.3809.89 Mobile Safari/537.36 T7/11.20 SP-engine/2.16.0 baiduboxapp/11.20.0.14 (Baidu; P1 9) NABar/1.0",
                    'body'       => json_encode($data, 256),
                ]);

                $ins->setSuccessCallback(function(string $contents, Downloader $_this, $response, $index) {
                    $requestInfo = $_this->getRequestInfoByIndex($index);

//                    $_this->logInfo($contents);
                });

                $ins->setErrorCallback(function($e, Downloader $_this, $index) {
                    $_this->logInfo('出错：' . $e->getMessage());
                });

                $ins->setOnDoneCallback(function(Downloader $_this) {
                    $_this->logInfo('done');
                });

                $ins->logInfo('pv发送中：' . (($k * $this->chunkSize) + 1) . '-' . (($k + 1) * $this->chunkSize) . ',共：' . $requestsCount);
                $ins->send();
                $ins->logInfo('pv发送成功');
            }

            $this->restoreStatus();

            return true;
        }

        private static function makeHash(string $apiUrl, string $token, string $siteId): string
        {
            return md5($apiUrl . $token . $siteId);
        }

        private function apiEndpoint(): string
        {
            return $this->apiUrl . '/matomo.php';
        }

        private function restoreStatus(): void
        {
            $this->uvs = [];
        }

    }

