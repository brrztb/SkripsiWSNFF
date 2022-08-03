<?php

namespace Controllers;

class Tanah {
    public function tanahAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');
        $query1 = $f3->get('GET.spinner');
        $query2 = $f3->get('GET.sort');

        //sanitasi buat ngelindungin kalo ada yg mau masuk2in data lain. inputnya udh expected di dalem sini
        $allowedColumns = ["ph_tanah", "suhu_tanah", "kelembaban_tanah", "suhu_udara", "kelembaban_udara", "waktu_sensing"];
        if(!in_array($query1, $allowedColumns)) {
            throw new \InvalidArgumentException("$query1 is not in allowed columns for sorting.");
        }

        $tanah = $db->exec("SELECT *
                            FROM tanah
                            ORDER BY `$query1` DESC");

        if (strcasecmp($query2, "false") == 0) {
            $tanah = $db->exec("SELECT *
                                FROM tanah
                                ORDER BY `$query1` ASC");
        }

        header('Content-type: application/json');
        echo json_encode($tanah);
    }
}