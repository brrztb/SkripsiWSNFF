<?php

namespace Controllers;

class Tanah {
    public function tanahAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $tanah = $db->exec("SELECT *
                                FROM tanah
                                ORDER BY waktu_sensing DESC");

        header('Content-type: application/json');
        echo json_encode($tanah);
    }
}