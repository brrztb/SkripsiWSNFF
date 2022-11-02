<?php

namespace Controllers;

class PetakCount {
    public function petakCountAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');

        $nodes = $db->exec("SELECT COUNT(DISTINCT kode_petak) AS 'jumlah_kode' FROM petak");

        header('Content-type: text/plain');
        echo $nodes[0]['jumlah_kode'];  
    }
}