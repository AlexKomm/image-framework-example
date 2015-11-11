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
 * Greyscale processing plugin
 * @package imageframework\plugins
 */
class Greyscale extends ImagePlugin {

    public function onImageProcess(Image $image)
    {
        Application::log('Grayscaling...');
    }
}