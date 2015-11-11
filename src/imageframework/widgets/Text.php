<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 11:38
 */

namespace imageframework\widgets;


use imageframework\models\Widget;

/**
 * Text widget implementation
 * @package imageframework\widgets
 */
class Text extends Widget {

    public function render()
    {
        return "
        <div class=\"control-group\">
        <input type=\"text\" name=\"{$this->getName()}\">
        </div>";
    }
}