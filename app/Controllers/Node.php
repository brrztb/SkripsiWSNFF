<?php

namespace Controllers;

class Node {
    public function nodeStatusAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $getHash = $f3->get('GET.hash');
        $nodes = $db->exec("SELECT nama_node, status_node, status_sensing FROM nodesensor ORDER BY kode_node ASC");

        $etag = "";

        foreach ($nodes as $node) {
            $etag .= $node['nama_node']. " ";
            $etag .= $node['status_node']." ";
            $etag .= $node['status_sensing']." ";
        }
        $etag = hash('sha256', $etag);

        if (strcmp($getHash, $etag) != 0) {
            $res = array("nodes"=>$nodes, "etag"=>$etag);
        }
        else {
            $res =  array("nodes"=>array(), "etag"=>$etag);
        }

        header('Content-type: application/json');
        echo json_encode($res);
    }
}