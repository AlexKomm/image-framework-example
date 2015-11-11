<?php
define('DIR', __DIR__);

require_once 'autoload.php';

$session = \imageframework\environment\Session::instance();
$session->start();

$app = new \imageframework\Application();
$app->run();

