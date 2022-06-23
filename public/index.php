<?php

require (__DIR__.'/../vendor/autoload.php');

$f3 = Base::instance();

require (__DIR__.'/../app/config/config.php');
$f3->set('AUTOLOAD', '../app/');
$f3->route('GET /helloWorld/@name', 'Controllers\Index->helloWorldAction');
$f3->route('GET /sql', 'Controllers\Node->nodeStatusAction');
$f3->route('GET /tanah', 'Controllers\Tanah->tanahAction');
$f3->route('GET /sensing', 'Controllers\Sensing->sensingAction');
//$f3->map('/tanah', 'Controllers\Tanah');
$f3->run();