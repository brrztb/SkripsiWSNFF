<?php

namespace Controllers;

class ChartData {
    public function getChartDataAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $query1 = $f3->get('GET.spinner');

        //sanitasi buat ngelindungin kalo ada yg mau masuk2in data lain. inputnya udh expected di dalem sini
        $allowedColumns = ["ph_tanah", "suhu_tanah", "kelembaban_tanah", "suhu_udara", "kelembaban_udara", "waktu_sensing"];

        if(!in_array($query1, $allowedColumns)) {
            throw new \InvalidArgumentException("$query1 is not in allowed columns for sorting.");
        }

        // $chartData = $db->exec("SELECT
        //                     kode_petak, `$query1`, waktu_sensing
        //                     FROM tanah
        //                     ORDER BY waktu_sensing
        //                     ASC");

        $chartData = $db->exec("SELECT * 
                                FROM (
                                    SELECT
                                    kode_petak, `$query1`, waktu_sensing
                                    FROM tanah
                                    ORDER BY waktu_sensing DESC
                                    LIMIT 18446744073709551615
                                ) AS sub
                            GROUP BY kode_petak");
                            
        header('Content-type: application/json');
        echo json_encode($chartData);
    }
}