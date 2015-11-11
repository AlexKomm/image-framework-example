<?php

namespace imageframework\models;


use imageframework\Application;

abstract class ImagePlugin extends Plugin
{

    /**
     * Plugin initializing
     */
    public function init()
    {
        Application::log('Image plugin ' . $this->getTag() . ' initialized');
    }

    /**
     * Callback where actual image processing happens
     *
     * @param Image $image
     * @return mixed
     */
    public abstract function onImageProcess(Image $image);

} 