<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 12:13
 */

namespace imageframework\environment;

/**
 * $_SESSION wrapper
 * @package imageframework
 */
class Session
{
    /**
     * @var Session
     */
    private static $instance;

    protected function __construct()
    {
    }

    /**
     * @return Session
     */
    public static function instance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * @return bool
     */
    public function start()
    {
        if (!headers_sent() && !session_id()) {
            if (session_start()) {
                session_regenerate_id();
                return true;
            }
        }
        return false;
    }

    /**
     * @param $Key
     * @param $value
     */
    public function set($Key, $value)
    {
        $_SESSION[$Key] = $value;
    }

    /**
     * @param $Key
     * @return bool
     */
    public function has($Key)
    {
        return (bool)(isset($_SESSION[$Key])) ? $_SESSION[$Key] : false;
    }

    /**
     * @param $Key
     * @return bool
     */
    public function get($Key)
    {
        return (isset($_SESSION[$Key])) ? $_SESSION[$Key] : false;
    }

    /**
     * @param $Key
     * @return bool
     */
    public function del($Key)
    {
        if (isset($_SESSION[$Key])) {
            unset($_SESSION[$Key]);
            return false;
        }

    }

    /**
     * @return void
     */
    public function destroy()
    {
        if (isset($_SESSION)) {
            session_destroy();
        }
    }
}