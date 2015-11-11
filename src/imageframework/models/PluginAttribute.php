<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 10:57
 */

namespace imageframework\models;


class PluginAttribute
{

    /**
     * @var string Attribute name
     */
    private $name;

    /**
     * @var Widget
     */
    private $widget;

    /**
     * @var string Data type
     */
    private $type;


    /**
     * @var boolean Required attribute
     */
    private $required;


    /**
     * @var mixed Attribute value
     */
    private $value;


    function __construct($name, $type, $widget, $required = true)
    {
        $this->type = $type;
        $this->widget = $widget;
        $this->required = $required;
        $this->name = $name;
    }

    /**
     * @return boolean
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     */
    public function setRequired($required)
    {
        $this->required = $required;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return \imageframework\Widget
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * @param \imageframework\Widget $widget
     */
    public function setWidget($widget)
    {
        $this->widget = $widget;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }


}