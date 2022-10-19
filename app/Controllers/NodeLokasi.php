<?php

namespace Controllers;

class NodeLokasi {
    public function nodeLokasiAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $nodes = $db->exec("SELECT nama_node, lintang, bujur FROM nodesensor");

        header('Content-type: application/json');
        echo json_encode($nodes);
    }
}