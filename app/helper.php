<?php

use App\Models\Config;

if (! function_exists('colors')) {
    function colors(): string
    {
        $color = [
            '#4aa3df',
            '#2980b9',
            '#9b59b6',
            '#34495e',
            '#8e44ad',
            '#27ae60',
            '#8e44ad',
            '#1abc9c',
            '#d35400',
            '#e74c3c',
            '#c0392b'
        ];

        return $color[rand(0, 10)];
    }
}

if (!function_exists('systemDate')) {
    function systemDate($date = ''): string
    {
        if (empty($date)) {
            return '';
        }
        return date('d-m-Y', strtotime($date));
    }
}

if (!function_exists('currency')) {
    function currency($amount): string
    {
        return systemConfig('currency').' '.number_format($amount, 2);
    }
}

function __d($amount): string
{
    return number_format($amount, 2);
}

if (!function_exists('title')) {
    function title($text): string
    {
        return ucwords($text);
    }
}

if (!function_exists('systemConfig')) {
    function systemConfig($key): string
    {
        return Config::where('title', $key)->select('value')->first()->value ?? '';
    }
}

if (!function_exists('thumbnail')) {
    function thumbnail($url)
    {
//    $lfm_helper = \Unisharp\Laravelfilemanager\traits\LfmHelpers;
//    $full_file_path = ; // get this from db
//    $thumb_url = $lfm_helper->getThumbUrl($full_file_path);
//    return substr_replace($url, 'thumbs', $pos, 0);
    }
}
