<?php

namespace Controllers;

class Sensing {
    public function sensingAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $sinceList = $f3->get('GET.since');

        $sensing = [];
        
        if (!$sinceList) {
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
        }
        else {
            //Loop si petak dari query buat ambil data pointnya
            foreach ($sinceList as $kodeSensor => $since) {
                $resp = $db->exec("SELECT id_tanah, jenis_tanah, ph_tanah, suhu_tanah, kelembaban_tanah, suhu_udara, 
                                    kelembaban_udara, kode_petak, waktu_sensing
                                    FROM tanah
                                    WHERE
                                    waktu_sensing > '$since' and kode_petak = $kodeSensor
                                    ");
                //Untuk masukin data per data ke dalam array, bukan arraynya
                foreach($resp as $dataPoint) {
                    $sensing[] = $dataPoint;
               }
            }
        }

        header('Content-type: application/json');
        echo json_encode($sensing);
    }
}