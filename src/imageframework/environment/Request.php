<?php


namespace imageframework\environment;


/**
 * Wrapper around php $_REQUEST global variables
 * @package imageframework
 */
class Request
{

    /**
     * @var Request
     */
    private static $instance;

    protected function __construct()
    {
    }

    /**
     * @return Request
     */
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function get($name)
    {
        return !empty($_GET[$name]) ? $_GET[$name] : null;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function post($name)
    {
        return !empty($_POST[$name]) ? $_POST[$name] : null;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function file($name)
    {
        return !empty($_FILES[$name]) ? $_FILES[$name] : null;
    }

    /**
     * @return bool
     */
    public function hasPostData() {
        return !empty($_POST);
    }

    /**
     * @return bool
     */
    public function hasFilesData() {
        return !empty($_FILES);
    }
} 