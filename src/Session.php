<?php

    namespace Coco\matomo;

    use Coco\matomo\fakerProvider\Request;
    use Faker\Generator;

    class Session
    {
        private static string $cachePath = './insCache';

        private string   $ip;
        private string   $userAgent;
        private array    $resolution = [];
        public Generator $faker;

        public static function setCachePath(string $path): void
        {
            static::$cachePath = $path;
        }

        private function __construct(private string $id)
        {
            $faker = \Faker\Factory::create('zh_CN');
            $faker->addProvider(new Request($faker));

            $this->faker = $faker;
        }

        public function getId(): string
        {
            return $this->id;
        }

        public static function getInsById(string $id): ?static
        {
            return static::getInsCacheById($id);
        }

        public static function newIns(): static
        {
            return new static(static::makeVisitorId());
        }

        public function setIp(string $ip): static
        {
            $this->ip = $ip;

            return $this;
        }

        public function setResolution(array $resolution): static
        {
            $this->resolution = $resolution;

            return $this;
        }

        public function setUserAgent(string $userAgent): static
        {
            $this->userAgent = $userAgent;

            return $this;
        }

        public function getIp(): string
        {
            return $this->ip;
        }

        public function getResolution(): array
        {
            return $this->resolution;
        }

        public function getUserAgent(): string
        {
            return $this->userAgent;
        }

        public function pcDevice(): static
        {
            $this->setUserAgent($this->faker->userAgent);
            $this->setResolution($this->faker->pcResolution);
            $this->setIp($this->faker->ipv4);

            return $this;
        }

        public function mobileDevice(): static
        {
            $this->setUserAgent($this->faker->mobileUA);
            $this->setResolution($this->faker->mobileResolution);
            $this->setIp($this->faker->ipv4);

            return $this;
        }

        public function randomDevice(): static
        {
            rand(0, 1) ? $this->pcDevice() : $this->mobileDevice();

            return $this;
        }

        public function putTocache(): bool|int
        {
            return static::putInsCacheById($this->id, $this->serialize($this));
        }

        private static function getInsCacheById(string $id): ?static
        {
            $path = static::makeCacheFilePath($id);

            if (!is_file($path))
            {
                return null;
            }

            $string = file_get_contents($path);

            $obj = static::unserialize($string);

            if ($obj instanceof static)
            {
                return $obj;
            }

            return null;
        }

        private static function putInsCacheById(string $id, string $value): bool|int
        {
            $path = static::makeCacheFilePath($id);
            $dir  = dirname($path);

            (!is_dir($dir)) && mkdir($dir, 0755, true);

            return file_put_contents($path, $value);
        }

        private static function makeCacheFilePath(string $id): string
        {
            return implode('', [
                rtrim(static::$cachePath, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR,
                substr($id, 0, 2) . DIRECTORY_SEPARATOR,
                substr($id, 2, 2) . DIRECTORY_SEPARATOR,
                $id . '.txt',
            ]);
        }

        private function serialize(mixed $obj): string
        {
            return serialize($obj);
        }

        private static function unserialize(string $string)
        {
            return unserialize($string);
        }

        protected static function makeVisitorId(): string
        {
            $t = md5(uniqid(rand(), true));

            return substr($t, 0, 16);
        }

    }

