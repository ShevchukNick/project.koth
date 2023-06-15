<?php

namespace koth;


// класс улавливателя ошибок
class ErrorHandler
{
    public function __construct()
    {
        //если включен режим разработки (в инит)
        if (DEBUG) {
            error_reporting(-1);
        } else {
            error_reporting(0); // выключили показ ошибок если в конст 0
        }
        set_exception_handler([$this, 'exceptionHandler']); // для отлова исключений
        set_error_handler([$this, 'errorHandler']); // для отлова ошибок
        // чтобы ошибка не выводилась ее нужно буферизировать (чтоб она попала в буфер откуда ее можно будет забрать)
        ob_start(); //vkl bufer
        register_shutdown_function([$this, 'fatalErrorHandler']);

    }

    public function errorHandler($errno, $errstr, $errfile, $errline)
    {
        $this->logError($errstr, $errfile, $errline);
        $this->displayError($errno, $errstr, $errfile, $errline);
    }

    public function fatalErrorHandler()
    {
        $error = error_get_last(); // получаем последнюю ошибку
        if (!empty($error) && $error['type'] & (E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
            $this->logError($error['message'],$error['file'],$error['line']);
            ob_end_clean();
            $this->displayError($error['type'],$error['message'],$error['file'],$error['line']);
        } else {
            ob_end_flush();
        }
    }

    /* наследуем интерфейс троуэбл и его обьект "е", в котором хранится вся инфа об ощибке (эту инфу мы должгы показаьб юзеру и залошировать */
    public function exceptionHandler(\Throwable $e)
    {
        $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('Исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    public function logError($message = '', $file = '', $line = '')
    {
        file_put_contents(
            LOGS . '/errors.log',
            "[" . date('Y-m-d H:i:s') . "] Текст ошибки: {$message} | Файл: {$file} | Строка: {$line} \n=======\n",
            FILE_APPEND);
    }

    public function displayError($errno, $errstr, $errfile, $errline, $responce = 500)
    {
        if ($responce == 0) {
            $responce = 404;
        }
        http_response_code($responce);
        // надо понят ькакую страницу показать пользователю и включен ли режим отладки (404 - страница не найдена
        if ($responce == 404 && !DEBUG) {
            require_once WWW . '/errors/404.php';
            die();
        }
        if (DEBUG) {
            require_once WWW . '/errors/development.php';
        } else {
            require_once WWW . '/errors/production.php';
        }
        die();
    }
}