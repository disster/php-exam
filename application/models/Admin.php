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

    public function addSession($name)
    {
        $params = [
            'name' => $name,
            'status' => 0,
            'token' =>$this->createToken(),
        ];
        $this->db->query('INSERT INTO sessions(name, status, token) VALUES (:name, :status, :token)', $params);
    }
    public function isSessionExist($id)
    {
        $params = [
            'id' => $id,
        ];
        if ($this->db->queryColumn('SELECT id FROM sessions WHERE id = :id', $params)) {
            return true;
        } else return false;
    }

    public function sessionDelete($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM sessions WHERE id = :id', $params);

    }
    function getSessionData($id){
        $params = [
            'id'=> $id,
        ];
        $data = $this->db->queryAll('SELECT * FROM sessions WHERE id = :id', $params);
        return $data[0];
    }
    public function sessionEdit($id, $post){
            $params = [
                'type' => $post['type'],
                'text' => $post['text'],
                'session_id' => $id,
            ];
            echo 111;
            $this->db->query('INSERT INTO questions(type, text, session_id) VALUES (:type, :text, :session_id)', $params);
    }
}
