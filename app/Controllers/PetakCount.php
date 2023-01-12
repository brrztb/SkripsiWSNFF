<?php

namespace Controllers;

class PetakCount {
    public function petakCountAction(\Base $f3, array $args = []) {
        $db = $f3->get('DB');

        $petakCount = $db->exec("SELECT COUNT(DISTINCT kode_petak) AS 'jumlah_kode' FROM petak");

        header('Content-type: text/plain');
        echo $petakCount[0]['jumlah_kode'];  
    }
}