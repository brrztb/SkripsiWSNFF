<?php

require (__DIR__.'/../vendor/autoload.php');

$f3 = Base::instance();

require (__DIR__.'/../app/config/config.php');
$f3->set('AUTOLOAD', '../app/');
$f3->set('UI', '../app/View/');
$f3->route('GET /helloWorld/@name', 'Controllers\Index->helloWorldAction');
$f3->route('GET /status', 'Controllers\Node->nodeStatusAction');
$f3->route('GET /tanah', 'Controllers\Tanah->tanahAction');
$f3->route('GET /sensing', 'Controllers\Sensing->sensingAction');
$f3->route('GET /makechart', 'Controllers\ChartData->getChartDataAction');
$f3->route('GET /petak', 'Controllers\Petak->petakAction');
$f3->route('GET /nodelokasi', 'Controllers\NodeLokasi->nodeLokasiAction');
$f3->route('GET /petakcount', 'Controllers\PetakCount->petakCountAction');
$f3->route('GET /nodecount', 'Controllers\NodeCount->nodeCountAction');
$f3->route('POST /login', 'Controllers\Login->loginAction');

$f3->route('GET /testing', 'Controllers\Testing->testingAction');
//$f3->map('/tanah', 'Controllers\Tanah');
$f3->run();