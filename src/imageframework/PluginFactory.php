<?php


namespace imageframework;


use imageframework\models\Plugin;
use imageframework\models\PluginAttribute;
use InvalidArgumentException;

/**
 * Plugin Factory
 * @package imageframework
 */
class PluginFactory
{

    /**
     * @param array $options
     * @return Plugin
     * @throws \InvalidArgumentException
     */
    public static function create($options)
    {
        if (empty($options['name'])) {
            throw new InvalidArgumentException("Plugin name cannot be empty");
        }

        if (empty($options['title'])) {
            throw new InvalidArgumentException("Invalid plugin title parameter");
        }

        $plugin = self::getPluginClass($options['name']);

        if (!class_exists($plugin)) {
            throw new InvalidArgumentException("Invalid plugin name " . $options['name']);
        }

        $plugin = new $plugin($options['name'], $options['title']);

        if (!empty($options['attributes']) && is_array($options['attributes'])) {
            $attributes = array();
            foreach ($options['attributes'] as $attribute) {
                $name = $plugin->getTag() . "[" . $attribute['name'] . "]";
                $widget = WidgetFactory::create($attribute['widget'], $name);

                $attributes[$attribute['name']] = new PluginAttribute(
                    $attribute['name'],
                    $attribute['type'],
                    $widget,
                    $attribute['required']
                );
            }

            $plugin->setAttributes($attributes);
        }

        return $plugin;
    }

    /**
     * @param $name
     * @return string
     */
    private static function getPluginClass($name)
    {
        $className = "imageframework\\Plugins\\" . ucfirst($name);
        return $className;
    }
} 