<?php

namespace Controllers;

class Index {
    public function helloWorldAction(\Base $f3, array $args = []): void {
        echo "This is a ". $f3->VERB . "add parameter + " .$args['name'];
    }
}