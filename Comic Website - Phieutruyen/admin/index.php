<?php
session_start();
define('ROOT_PATH', realpath(__DIR__));
require_once "./mvc/Bridge.php";
$myApp = new App();
