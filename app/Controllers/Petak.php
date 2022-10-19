<?php

namespace Controllers;

class Petak {
    public function petakAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $nodes = $db->exec("SELECT kode_petak, lintang, bujur FROM petak");

        header('Content-type: application/json');
        echo json_encode($nodes);
    }
}