<?php
namespace tvitas\SiteRepo;

final class Environment
{
    private static $instance;

    private static $config = [];

    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new Environment();
        }
        return static::$instance;
    }

    public static function load($config = __DIR__ . '/../config/config.php')
    {
        self::$config = require $config;
    }

    public static function get($key, $default = null)
    {
        if (isset(self::$config[$key])) {
            return self::$config[$key];
        }
        return $default;
    }

    protected function __construct() {}

    protected function __clone()
    {
        throw new \Exception("Method not allowed");
    }

    protected function __wakeup()
    {
        throw new \Exception("Method not allowed");
    }

}
