<?php

namespace Controllers;

class PhTanahGraph {
    public function getPhTanahAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $nodes = $db->exec("SELECT kode_petak, ph_tanah, waktu_sensing FROM tanah ORDER BY waktu_sensing ASC");

        header('Content-type: application/json');
        echo json_encode($nodes);
    }
}