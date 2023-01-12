<?php

namespace Controllers;

class NodeCount {
    public function nodeCountAction(\Base $f3, array $args = []) {
        $db = $f3->get('DB');

        $nodes = $db->exec("SELECT COUNT(DISTINCT kode_petak) AS 'jumlah_node' FROM tanah");

        header('Content-type: text/plain');
        echo $nodes[0]['jumlah_node'];  
    }
}