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

        //TESTING SENSING
        $ph = rand(1, 99);
        $kTanah = rand(1, 99);
        $sTanah = rand(1, 99);
        $kUdara = rand(1, 99);
        $sUdara = rand(1, 99);

        $nodes_tanah = Array(1, 2, 3);
        $selectedTanahNodes = $nodes_tanah[rand(0, count($nodes_tanah) - 1)];


        echo $ph.$selectedTanahNodes."<br>";
        echo $kTanah.$selectedTanahNodes."<br>";
        echo $sTanah.$selectedTanahNodes."<br>";
        echo $kUdara.$selectedTanahNodes."<br>";
        echo $sUdara.$selectedTanahNodes."<br>";

        $result3 =$db->exec('UPDATE tanah SET ph_tanah = ? WHERE kode_petak = ?', array(1=>$ph, 2=>1));
        $result4 =$db->exec('UPDATE tanah SET kelembaban_tanah = ? WHERE kode_petak = ?', array(1=>$kTanah, 2=>1));
        $result5 =$db->exec('UPDATE tanah SET suhu_tanah = ? WHERE kode_petak = ?', array(1=>$sTanah, 2=>1));
        $result6 =$db->exec('UPDATE tanah SET kelembaban_udara = ? WHERE kode_petak = ?', array(1=>$kUdara, 2=>1));
        $result7 =$db->exec('UPDATE tanah SET suhu_udara = ? WHERE kode_petak = ?', array(1=>$sUdara, 2=>1));

        $result8 =$db->exec('UPDATE tanah SET ph_tanah = ? WHERE kode_petak = ?', array(1=>$ph, 2=> 2 ));
        $result9 =$db->exec('UPDATE tanah SET kelembaban_tanah = ? WHERE kode_petak = ?', array(1=>$kTanah, 2=>2));
        $result10 =$db->exec('UPDATE tanah SET suhu_tanah = ? WHERE kode_petak = ?', array(1=>$sTanah, 2=>2));
        $result11 =$db->exec('UPDATE tanah SET kelembaban_udara = ? WHERE kode_petak = ?', array(1=>$kUdara, 2=>2));
        $result12 =$db->exec('UPDATE tanah SET suhu_udara = ? WHERE kode_petak = ?', array(1=>$sUdara, 2=>2));

        $result13 =$db->exec('UPDATE tanah SET ph_tanah = ? WHERE kode_petak = ?', array(1=>$ph, 2=>3));
        $result14 =$db->exec('UPDATE tanah SET kelembaban_tanah = ? WHERE kode_petak = ?', array(1=>$kTanah, 2=>3));
        $result15 =$db->exec('UPDATE tanah SET suhu_tanah = ? WHERE kode_petak = ?', array(1=>$sTanah, 2=>3));
        $result16 =$db->exec('UPDATE tanah SET kelembaban_udara = ? WHERE kode_petak = ?', array(1=>$kUdara, 2=>3));
        $result17 =$db->exec('UPDATE tanah SET suhu_udara = ? WHERE kode_petak = ?', array(1=>$sUdara, 2=>3));
    }
}