<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 11.11.15
 * Time: 11:15
 */

namespace imageframework\plugins;


use imageframework\Application;
use imageframework\models\Image;
use imageframework\models\ImagePlugin;

/**
 * Resize processing plugin
 * @package imageframework\plugins
 */
class Resize extends ImagePlugin{

    public function onImageProcess(Image $image)
    {
        $amount = $this->getAttribute("amount")->getValue();
        Application::log("Resizing image...(amount: " . $amount . ')');
    }
}