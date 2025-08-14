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
        private ?Session $session = null;
        private array    $options = [];

        private static array $ins = [];

        private function __construct(public string $apiUrl, public string $token, public int $siteId)
        {
            Downloader::initClientConfig([
                'timeout' => 60.0,
                'verify'  => false,
                'debug'   => false,
            ]);

            Downloader::initLogger('matomo_log', !true, !true);
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

        public function setSession(?Session $session): static
        {
            $this->session = $session;

            return $this;
        }

        public function addOption(Option $option): static
        {
            $this->options[] = $option;

            return $this;
        }

        public function importOptions(array $options): static
        {
            foreach ($options as $k => $option)
            {
                $this->addOption($option);
            }

            return $this;
        }

        /*--------------------------------------------------------------------------------*/

        public function sendRequest(): bool
        {
            $ins = Downloader::ins();
            $ins->setCachePath('../downloadCache');

            $data = [
                "requests"   => [],
                'token_auth' => $this->token,
            ];

            foreach ($this->options as $option)
            {
                $option->setSiteId($this->siteId);

                $res = $this->session->getResolution();
                $option->setResolution($res[0], $res[1]);
                $option->setUserAgent($this->session->getUserAgent());
                $option->setSessionId($this->session->getId());
                $option->setIp($this->session->getIp());

                $data['requests'][] = $option->makeUrl();
            }

            $ins->setEnableCache(false);
            $ins->addBatchRequest($this->apiEndpoint(), 'post', [
                'User-Agent' => $this->session->getUserAgent(),
                'body'       => json_encode($data, 256),
            ]);

            $ins->setSuccessCallback(function(string $contents, Downloader $_this, $response, $index) {
                $requestInfo = $_this->getRequestInfoByIndex($index);

                $_this->logInfo($contents);
            });

            $ins->setErrorCallback(function($e, Downloader $_this, $index) {
                $_this->logInfo('出错：' . $e->getMessage());
            });

            $ins->setOnDoneCallback(function(Downloader $_this) {
                $_this->logInfo('done');
            });

            $ins->send();

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
            $this->session = null;
            $this->options = [];
        }

    }

