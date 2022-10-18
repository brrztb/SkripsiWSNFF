<?php

namespace Controllers;

class Testing {
    public function testingAction(\Base $f3, array $args = []): void {
        $db = $f3->get('DB');

        // //TESTING STATUS NODE
        $nodes = Array(1, 2, 3, 4, 5);
        $items = Array("Online", "Offline");
        $sens = Array("Sensing", "Not Sensing");

        $selectedNodes = $nodes[rand(0, count($nodes) - 1)];
        $status =  $items[rand(0, count($items) - 1)];
        $ranSens = $sens[rand(0, count($sens) -1)];
        echo $status.$selectedNodes;
        $result =$db->exec('UPDATE nodesensor SET status_node = ? WHERE kode_node = ?', array(1=>$status, 2=>$selectedNodes));
        $result2 =$db->exec('UPDATE nodesensor SET status_sensing = ? WHERE kode_node = ?', array(1=>$ranSens, 2=>$selectedNodes));
        
        //TESTING TANAH INSERT DATA SENSING 
        function frand($min, $max, $decimals = 0) {
            $scale = pow(10, $decimals);
            return mt_rand($min * $scale, $max * $scale) / $scale;
          }
          
          echo "frand(0, 10, 2) = " . frand(0, 10, 2) . "\n";

          date_default_timezone_set('Asia/Jakarta');
          $t=time();
          echo(date("Y-m-d H:i:s",$t));

          $result00 = $db->exec('INSERT INTO tanah (jenis_tanah, ph_tanah, suhu_tanah, kelembaban_tanah, suhu_udara, kelembaban_udara, kode_petak, waktu_sensing)
                                VALUES ("irigasi", ?, ?, ?, ?, ?, ?, ?)',array( frand(0, 10, 2),  frand(0, 10, 2),  frand(0, 10, 2),  frand(0, 10, 2),
                                frand(0, 10, 2), rand(1,3), date("Y-m-d H:i:s",$t)));
    }
}