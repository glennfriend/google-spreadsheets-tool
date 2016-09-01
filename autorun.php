#!/usr/bin/php
<?php

perform([
    [
        'title' => 'PHP',
        'cmd'   => 'php -v',
    ],
    [
        'title' => 'clear cache',
        'cmd'   => 'php bin/cache-clean.php',
    ],
    [
        'title' => 'create var folders',
        'funt'  => "createVarFolder",
    ],
    [
        'title' => 'Composer Install (use composer.lock)',
        'cmd'   => "cd composer; composer install",
    ],
]);

/**
 *
 */
function show($content)
{
    if ($content) {
        $left   = "\033[1;33m";
        $right  = "\033[0m";
        echo "{$left}---- {$content} ----{$right}";
    }
    echo "\n";
}

/**
 *
 */
function perform($commands)
{
    foreach ($commands as $item) {

        $title   = isset($item['title']) ? $item['title'] : '';
        $command = isset($item['cmd'])   ? $item['cmd']   : '';
        $funt    = isset($item['funt'])  ? $item['funt']  : '';

        show($title);
        if ($command) {
            system($command);
        }
        elseif ($funt) {
            $funt();
        }

        echo "\n";
    }
    exit;
}

/**
 *  建立 var/ 相關目錄
 */
function createVarFolder()
{
    $dir = __DIR__;

    system("mkdir -p {$dir}/var/cache");
    system("mkdir -p {$dir}/var/command-data-call");
    system("mkdir -p {$dir}/var/error-report");
    system("mkdir -p {$dir}/var/session");

    system("chmod -R 777 {$dir}/var");
}

