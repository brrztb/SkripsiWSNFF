<?php

require (__DIR__.'/../vendor/autoload.php');

$f3 = Base::instance();

require (__DIR__.'/../app/config/config.php');

$f3->route('GET /', 
    function($f3) {
        echo "Hello, World!ssssssss";
    });
    $f3->route('GET /hello', 
    function($f3) {
        echo "Hello";
    });
    $f3->route('GET /sql', 
    function($f3) {
        $db = $f3->get('DB');
        $students = $db->exec("SELECT * FROM nodesensor");

        header('Content-type: application/json');
        echo json_encode($students);
    });
    $f3->route('GET /tanah', 
    function($f3) {
        $db = $f3->get('DB');
        $tanah = $db->exec("SELECT * FROM tanah");

        header('Content-type: application/json');
        echo json_encode($tanah);
    });
    $f3->route('GET /sensing', 
    function($f3) {
        $db = $f3->get('DB');
        $sensing = $db->exec("SELECT * 
                                FROM (
                                    SELECT * FROM tanah
                                    ORDER BY waktu_sensing DESC
                                    LIMIT 18446744073709551615
                                ) AS sub
                            GROUP BY kode_petak");
        header('Content-type: application/json');
        echo json_encode($sensing);
    });
$f3->run();