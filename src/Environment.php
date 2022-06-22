<?php
declare(strict_types=1);

namespace tvitas\SiteRepo;

use Exception;

final class Environment
{
    /**
     * @var Environment|null
     */
    private static ?Environment $instance = null;

    /**
     * @var array
     */
    private static array $config = [];

    /**
     * @return Environment|null
     */
    public static function getInstance(): ?Environment
    {
        if (null === Environment::$instance) {
            self::$instance = new Environment();
        }

        return self::$instance;
    }

    /**
     * @param string $config
     * @return void
     */
    public static function load(string $config = __DIR__ . '/../config/config.php'): void
    {
        self::$config = require $config;
    }

    /**
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        return (null !== self::$config[$key]) ? self::$config[$key] : $default;
    }

    protected function __construct()
    {
    }

    /**
     * @throws Exception
     */
    public function __clone()
    {
        throw new Exception("Method not allowed");
    }

    /**
     * @throws Exception
     */
    public function __wakeup()
    {
        throw new Exception("Method not allowed");
    }
}
