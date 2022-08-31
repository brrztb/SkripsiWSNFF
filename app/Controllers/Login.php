<?php
namespace Controllers;

use Models\User;

//php -r "echo password_hash('passwordnya', PASSWORD_ARGON2I);"

class Login {
    public function loginAction(\Base $f3, array $args = []): void {
        $username = $f3->get('POST.username');
        $password = $f3->get('POST.password');

        $user = new User($f3->DB);
        $user->getByName($username);

        if($user->dry()){
            echo 'User does not exist.';
        }
        else {
            if(password_verify($password, $user->password)) {
                //create token
                $auth = base64_encode($username . ":" . $password);
                $user->addToken($username,$auth);

                $tz = 'Asia/Jakarta';
                $timestamp = time();
                $dt = new \DateTime("now", new \DateTimeZone($tz)); //first argument "must" be a string
                $dt->setTimestamp($timestamp); //adjust the object to correct timestamp
                $dateNow = $dt->format('Y-m-d H:i:s');

                $user->updateLoginDate($username,$dateNow);
                $array = array("username"=>"$username", "token"=>"$auth", "loginDate"=>"$dateNow");

                header('Content-type: application/json');
                echo json_encode($array);
            }
            else {
                echo 'Password NOT OK';
            }
        }
    }
}