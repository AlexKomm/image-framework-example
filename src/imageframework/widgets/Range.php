<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 11:39
 */

namespace imageframework\widgets;


use imageframework\models\Widget;

/**
 * Range widget implementation
 * @package imageframework\widgets
 */
class Range extends Widget {

    public function render()
    {
        return "
        <div class=\"control-group\">
        <input type=\"range\" name=\"{$this->getName()}\" style=\"width: auto;\">
        </div>";
    }
}