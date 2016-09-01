<?php
// --------------------------------------------------------------------------------
//  php -q /var/www/__project__/bin/testing-sleep-client.php
// --------------------------------------------------------------------------------
$basePath = dirname(__DIR__);
require_once $basePath . '/core/bootstrap.php';

//
$client = di('queue')->factoryClient();
$client->push('sleep');
