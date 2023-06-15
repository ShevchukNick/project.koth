<?php

/**
 * @var $errno \koth\ErrorHandler
 * @var $errstr \koth\ErrorHandler
 * @var $errfile \koth\ErrorHandler
 * @var $errline \koth\ErrorHandler
 */

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ошибка</title>
</head>
<body>
<h1>произошла ошибка</h1>
<p><b>код ошибки:</b><?=$errno ?> </p>
<p><b>текст ошибки:</b><?=$errstr ?></p>
<p><b>файл в котором произошла ошибка:</b><?=$errfile?></p>
<p><b>строка в котором произошла ошибка:</b><?=$errline ?></p>
</body>
</html>
