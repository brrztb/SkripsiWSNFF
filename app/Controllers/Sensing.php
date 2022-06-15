<?php

namespace Controllers;

class Sensing {
    public function sensingAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $sensing = $db->exec("SELECT * 
                                FROM (
                                    SELECT * FROM tanah
                                    ORDER BY waktu_sensing DESC
                                    LIMIT 18446744073709551615
                                ) AS sub
                            GROUP BY kode_petak");
        header('Content-type: application/json');
        echo json_encode($sensing);
    }
}