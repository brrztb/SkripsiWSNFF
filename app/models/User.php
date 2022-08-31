<?php
namespace Models;

class User extends \DB\SQL\Mapper {
    public function __construct(\DB\SQL $db) {
        parent::__construct($db, 'users');
    }

    public function all() {
        $this->load();
        return $this->query;
    }
    public function getById($id) {
        $this->load(array('username=?', $id));
    }

    public function getByName($name) {
        $this->load(array('username=?', $name));
    }

    public function addToken($name, $token) {
        $this->db->exec("
                UPDATE users
                SET token = '$token'
                WHERE username = '$name'
            ");
    }

    public function updateLoginDate($name, $timestamp) {
        $this->db->exec("
                UPDATE users
                SET login_date = '$timestamp'
                WHERE username = '$name'
            ");
    }
}