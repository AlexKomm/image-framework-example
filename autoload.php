<?php

spl_autoload_register(
    function ($class) {
        $namespace = str_replace("\\", "/", __NAMESPACE__);
        $class = str_replace("\\", "/", $class);
        $class = "src/" . (empty($namespace) ? "" : $namespace . "/") . "{$class}.php";

        include_once($class);
    }
);