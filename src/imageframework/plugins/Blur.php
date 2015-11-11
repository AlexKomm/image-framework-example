<?php
/**
 * Created by PhpStorm.
 * User: komm
 * Date: 10.11.15
 * Time: 10:12
 */

namespace imageframework\plugins;



use imageframework\Application;
use imageframework\models\Image;
use imageframework\models\ImagePlugin;

/**
 * Blur processing plugin
 * @package imageframework\plugins
 */
class Blur extends ImagePlugin {


    public function onImageProcess(Image $image)
    {
        $amount = $this->getAttribute("amount")->getValue();
        Application::log("Blurring image...(amount: " . $amount . ')');
    }
}