<?php
namespace tvitas\SiteRepo;

class Environment
{
    private static $instance;

    private static $config = [];

    public static function getInstance()
    {
        if (static::$instance === null) {
            static::$instance = new static();
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

    private function __wakeup()
    {
        throw new \Exception("Method not allowed");
    }

}
