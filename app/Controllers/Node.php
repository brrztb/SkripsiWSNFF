<?php

namespace Controllers;

class Node {
    public function nodeStatusAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $nodes = $db->exec("SELECT * FROM nodesensor");

        header('Content-type: application/json');
        echo json_encode($nodes);
    }
}