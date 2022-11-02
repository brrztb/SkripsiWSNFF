<?php

namespace Controllers;

class Petak {
    public function petakAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $query1 = $f3->get('GET.kode');
        $nodes = $db->exec('SELECT kode_petak, lintang, bujur
                            FROM petak
                            WHERE kode_petak=?', array($query1));

        header('Content-type: application/json');
        echo json_encode($nodes);
    }
}