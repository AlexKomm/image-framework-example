<?php
/**
 *
 */

namespace imageframework\models;

use Exception;


/**
 * Класс для работы с изображением
 * @package imageframework
 */
class Image
{
    protected $imagePath;

    /**
     * Загружаем информацию о изображении или создаем новое
     *
     * @param string|null $imagePath
     * @param int $width
     * @param int|null $height
     */
    function __construct($imagePath = null, $width = null, $height = null)
    {
        if ($imagePath) {
            $this->load($imagePath);
        } else {
            $this->create($width, $height);
        }

        return $this;
    }


    /**
     * Loading image metadata
     *
     * @param $imagePath
     * @throws \Exception
     */
    protected function load($imagePath) {

        if (!extension_loaded('gd')) {
            throw new Exception('Missing gd extension');
        }

        $this->imagePath = $imagePath;
    }

    /**
     * Creation of new Image
     *
     * @param $width
     * @param $height
     */
    protected function create($width, $height) {
        // TODO To be implemented
    }
}