<?php

use App\Utility\Project\SlimManager;

/**
 *  取得 route 處理之後獲得的參數
 */
function getParam($key, $defaultValue=null)
{
    if (isCli()) {
        throw new Exception('Error: Is command-line env');
    }
    return Bridge\Input::getParam($key, $defaultValue);
}

/**
 *  產生 url
 */
function url($segment, $args=[])
{
    return di('homeUrl')->CreateUrl($segment, $args);
}

/**
 *  導向某一個頁面
 */
function redirect($url, $isFullUrl=false)
{
    if (isCli()) {
        throw new Exception('Error: Is command-line env');
    }

    if (!$isFullUrl) {
        $url = url($url);
    }

    return SlimManager::getResponse()->withHeader('Location', $url);
}

/**
 *  導向 admin page 某一個頁面
 */
function redirectAdmin($url)
{
    if (isCli()) {
        throw new Exception('Error: Is command-line env');
    }

    $url = di('adminUrl')->createUrl($url);
    return SlimManager::getResponse()->withHeader('Location', $url);
}
