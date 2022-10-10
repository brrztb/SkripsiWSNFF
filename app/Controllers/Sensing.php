<?php

namespace Controllers;

class Sensing {
    public function sensingAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $sensing = $db->exec("SELECT * 
                                FROM (
                                    SELECT
                                    id_tanah, jenis_tanah, ph_tanah, suhu_tanah, kelembaban_tanah, suhu_udara, 
                                    kelembaban_udara, kode_petak, waktu_sensing
                                    FROM tanah
                                    ORDER BY waktu_sensing DESC
                                    LIMIT 18446744073709551615
                                ) AS sub
                            GROUP BY kode_petak");
        header('Content-type: application/json');
        echo json_encode($sensing);
    }
}