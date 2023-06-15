<?php
define("DEBUG",1); //1 статус разрабои, 0 - продакшн
define("ROOT",dirname(__DIR__));
define("WWW", ROOT . '/public');
define("APP", ROOT . '/app');
define("CORE", ROOT . '/vendor/koth');
define("HELPERS", ROOT . '/vendor/koth/helpers');
define("CACHE", ROOT . '/tmp/cache');
define("LOGS", ROOT . '/tmp/logs');
define("CONFIG", ROOT . '/config');
define("LAYOUT", 'koth');
define("PATH", 'http://project.koth');
define("ADMIN", 'http://project.koth/admin');
define("NO_IMAGE", 'uploads/no_image.jpg');

require_once ROOT . '/vendor/autoload.php';