<?php


namespace imageframework\models;


abstract class Plugin
{

    protected $enabled;
    protected $title;
    private $tag;

    /**
     * @var PluginAttribute[] Array of plugin attributes
     */
    private $attributes;

    function __construct($tag, $title, $attributes = array())
    {
        $this->title = $title;
        $this->tag = $tag;
        $this->attributes = $attributes;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param mixed $name
     */
    public function setTag($name)
    {
        $this->tag = $name;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param \imageframework\PluginAttribute[] $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @return \imageframework\PluginAttribute[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }


    /**
     * @param PluginAttribute $attribute
     */
    public function setAttribute(PluginAttribute $attribute) {
        $this->attributes[$attribute->getName()] = $attribute;
    }

    /**
     * @param $name
     * @return PluginAttribute
     */
    public function getAttribute($name) {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }

        return null;
    }

    public abstract function init();
} 