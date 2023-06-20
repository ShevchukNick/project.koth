<?php
function debug($data, $die = false)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
    if ($die) {
        die;
    }
}

function h($str)
{
    return htmlspecialchars($str);
}

function redirect($http = false)
{
    if ($http) {
        $redirect = $http;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location:$redirect");
    die;
}

function base_url()
{
    return PATH;
}



/** @param string $key key of GET array */
/** @param string $type values 'i' 's' 'f' */
/** @return float|int|string */

//get('page')
//$GET['page']
function get($key,$type='i')
{
    $param = $key;
    $$param=$_GET[$param] ?? '';
    // $page = $GET['page'] ?? ''
    if ($type=='i') {
        return (int)$$param;
    } elseif ($type=='f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}


/** @param string $key key of post array */
/** @param string $type values 'i' 's' 'f' */
/** @return float|int|string */

function post($key,$type='s')
{
    $param = $key;
    $$param=$_GET[$param] ?? '';
    // $page = $POST['page'] ?? ''
    if ($type=='i') {
        return (int)$$param;
    } elseif ($type=='f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}