<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor'. DIRECTORY_SEPARATOR . 'autoload.php';
$app = new \Symfony\Component\Console\Application('demo git');
$app->add(new \App\InteractiveHello());
$app->run();