<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

    public function checkLoginData($login, $password)
    {
        if ($login != 'admin' && $password != '12345') {
            $this->error = 'Неверный логин или пароль';
            return false;
        }
        return true;
    }

    public function login($login)
    {
        $_SESSION['admin'] = true;

    }

    public function logout()
    {
        unset($_SESSION['admin']);
    }

    public function getSessionsList($route)
    {
        $max = 10;
        $params = [
            'max' => $max,
            'start' => (($route['page'] ?? 1) - 1) * $max,
        ];
        return $this->db->queryAll('SELECT * FROM sessions ORDER BY id ASC LIMIT :start, :max', $params);
    }

    public function sessionsCount()
    {
        return $this->db->queryColumn('SELECT COUNT(*) FROM sessions');
    }

    public function createToken()
    {
        return substr(str_shuffle(str_repeat('0123456789abcdefghijklmnopqrstuvwxyz', 30)), 0, 30);
    }


}
