<?php

namespace Controllers;

class Index {
    public function helloWorldAction(\Base $f3, array $args = []): void {
        echo "This is a ". $f3->VERB . "add parameter + " .$args['name'];
    }

    public function nodeStatusAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $nodes = $db->exec("SELECT * FROM nodesensor");

        header('Content-type: application/json');
        echo json_encode($nodes);
    }

    public function sensingAction(\Base $f3, array $args = []): void {
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
    }
}