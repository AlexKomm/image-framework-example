<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 10.11.15
 * Time: 11:00
 */

namespace imageframework\environment;

/**
 * Json configuration reader
 * @package imageframework
 */
class Config
{

    private static $instance;
    private static $fileName = 'config.json';
    private $data;
    private $arg_keys = array();

    protected function __construct()
    {
    }

    function __get($name)
    {
        if ($name == 'data') {
            return $this->data;
        }

        $this->arg_keys[] = $name;

    }

    function __call($name, $args)
    {
        if (count($args) > 1) {
            return null;
        }

        if (property_exists($this, $name)) {
            if (empty($args)) {
                return null;
            }

            $this->$name = $args[0];
            return self::instance();
        } else {
            $this->arg_keys[] = $name;
            $result = $this->data;
            foreach ($this->arg_keys as $name) {
                if (!is_array($result)) {
                    return null;
                }
                $result = $result[$name];
            }
            $this->arg_keys = null;

            return (isset($args[0]) && is_array($result)) ? $result[$args[0]] : $result;
        }
    }

    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();

            $file = DIR . DIRECTORY_SEPARATOR . static::$fileName;

            $json = is_file($file) ? file_get_contents($file) : null;
            static::$instance->data = json_decode($json, $assoc = true);
        }

        return static::$instance;
    }

    function __destruct()
    {
        $this->data = null;
    }


} 