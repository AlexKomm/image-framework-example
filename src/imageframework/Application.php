<?php


namespace imageframework;

use imageframework\environment\Config;
use imageframework\environment\Request;
use imageframework\environment\Session;
use imageframework\models\Image;
use imageframework\models\ImagePlugin;


/**
 * Core application class
 * @package imageframework
 */
class Application
{

    /**
     * @var Plugin[]
     */
    private $plugins;

    /**
     * Initial start of app
     *
     * @return mixed
     */
    public function run()
    {
        $this->initPlugins();

        if (Request::instance()->hasPostData()) {
            $this->processImageAction();
        }

        $output = include_once DIR . DIRECTORY_SEPARATOR . 'form.php';
        return $output;
    }

    /**
     * Image processing action
     *
     * @return bool
     */
    public function processImageAction()
    {
        $request = Request::instance();

        $enabled_plugins = $request->post('plugins');
        if ($enabled_plugins) {
            self::log("Enabled plugins: " . implode(',', $enabled_plugins));
        }


        $uploaded_image = $request->file('image');

        if (!$uploaded_image || $uploaded_image['error'] != UPLOAD_ERR_OK) {
            return false;
        }


        $image = new Image($uploaded_image['tmp_name']);

        foreach ($this->getPlugins() as $plugin) {
            if (in_array($plugin->getTag(), $enabled_plugins) && $plugin instanceof ImagePlugin) {
                $values = $request->post($plugin->getTag());

                if ($values) {
                    $this->mapPluginAttributes($plugin, $values);
                }

                $plugin->onImageProcess($image);
            }
        }
    }

    /**
     * Plugins initialization
     */
    private function initPlugins()
    {
        foreach (Config::instance()->plugins() as $plugin) {
            if (!$plugin['enabled']) {
                continue;
            }

            $plugin = PluginFactory::create($plugin);
            $plugin->init();

            $this->plugins[] = $plugin;
        }
    }


    /**
     * Returns plugin list
     *
     * @return \imageframework\Plugin[]
     */
    public function getPlugins()
    {
        return $this->plugins;
    }

    /**
     * Log message
     *
     * @param $msg
     */
    public static function log($msg) {
        $session = Session::instance();

        $log_messages = $session->get("log");

        if (!$log_messages) {
            $log_messages = array();
        }

        $log_messages[] = $msg;

        $session->set("log", $log_messages);
    }

    /**
     * Mapping input values to attribute values of plugin
     *
     * @param $plugin
     * @param $values
     */
    private function mapPluginAttributes($plugin, $values)
    {
        foreach ($values as $key => $value) {
            $attribute = $plugin->getAttribute($key);

            if ($attribute) {
                $attribute->setValue($value);
            }

            $plugin->setAttribute($attribute);
        }
    }
}