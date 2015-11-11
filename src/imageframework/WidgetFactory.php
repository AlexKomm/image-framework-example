<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 11:42
 */

namespace imageframework;


use imageframework\models\Widget;
use InvalidArgumentException;

/**
 * WidgetFactoryClass
 * @package imageframework
 */
class WidgetFactory {

    /**
     * @param $type
     * @param $name
     * @return Widget
     * @throws \InvalidArgumentException
     */
    public static function create($type, $name) {
        $widget = self::getWidgetClass($type);

        if (!class_exists($widget)) {
            throw new InvalidArgumentException("Invalid plugin name " . $type);
        }

        return new $widget($name);
    }

    /**
     * @param $widget
     * @return string
     */
    private static function getWidgetClass($widget)
    {
        $className = "imageframework\\Widgets\\" . ucfirst($widget);
        return $className;
    }
} 