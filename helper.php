<?php

// các function hỗ trợ 
if (!function_exists('dd')) {
    function dd($data)
    {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}


if (!function_exists('routeAdmin')) {
    function routeAdmin($url = null)
    {
        return $_ENV['BASE_URL_ADMIN'] . $url;
    }
}


if (!function_exists('routeAdmin')) {
    function routeAdmin($url = null)
    {
        return $_ENV['BASE_URL'] . $url;
    }
}


if (!function_exists('formatPrice')) {
    function formatPrice($price)
    {
        return number_format($price);
    }
}
