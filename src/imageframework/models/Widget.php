<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 10:59
 */

namespace imageframework\models;


/**
 * Widget class
 * @package imageframework
 */
abstract class Widget {


    /**
     * @var string id attribute
     */
    private $id;

    /**
     * @var string name attribute
     */
    private $name;

    /**
     * @var array associative array of html attributes
     */
    private $attributes;


    function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @param array $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    public abstract function render();
} 