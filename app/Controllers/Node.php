<?php

namespace Controllers;

class Node {
    public function nodeStatusAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $nodes = $db->exec("SELECT nama_node, status_node, status_sensing FROM nodesensor ORDER BY kode_node ASC");

        header('Content-type: application/json');
        echo json_encode($nodes);
    }
}