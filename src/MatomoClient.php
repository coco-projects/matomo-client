<?php

    namespace Coco\matomo;

    use Coco\logger\Logger;

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
        use Logger;

        protected array $uvs       = [];
        public int   $chunkSize = 100;

        protected static string $logNamespace  = 'matomo-log';
        protected static bool   $enableEchoLog = false;

        public function __construct(public int $siteId)
        {
            if (static::$enableEchoLog)
            {
                $this->setStandardLogger(static::$logNamespace);
                $this->addStdoutHandler(static::getStandardFormatter());
            }
        }

        public static function initLogger(string $logNamespace, bool $enableEchoLog = false): void
        {
            static::$logNamespace  = $logNamespace;
            static::$enableEchoLog = $enableEchoLog;
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

        public function getUvsCount(): ?int
        {
            return count($this->uvs);
        }

        protected function restoreStatus(): void
        {
            $this->uvs = [];
        }

        public function eachChunks(callable $callback): void
        {
            $uvsChunks = array_chunk($this->uvs, $this->chunkSize);

            foreach ($uvsChunks as $uvsChunksKey => $uvsChunk)
            {
                call_user_func_array($callback, [
                    $uvsChunk,
                    $uvsChunksKey,
                ]);
            }

            $this->restoreStatus();
        }
    }

