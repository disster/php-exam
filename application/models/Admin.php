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
            'status' => 1,
            'token' => $this->createToken(),
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

    function getSessionData($id)
    {
        $params = [
            'id' => $id,
        ];
        $data = $this->db->queryAll('SELECT * FROM sessions WHERE id = :id', $params)[0];
        $questions = $this->db->queryAll('SELECT * FROM questions WHERE session_id = :id', $params);
        $data['questions'] = $questions;
        return $data;
    }

    public function sessionEdit($id, $post)
    {
        $params = [
            'type' => $post['type'],
            'text' => $post['text'],
            'session_id' => $id,
        ];
        $this->db->query('INSERT INTO questions(type, text, session_id) VALUES (:type, :text, :session_id)', $params);
    }

    public function isQuestionExist($id)
    {
        $params = [
            'question_id' => $id,
        ];
        if ($this->db->queryColumn('SELECT question_id FROM questions WHERE question_id = :question_id', $params)) {
            return true;
        } else return false;
    }

    public function removeQuestion($id)
    {
        $params = [
            'question_id' => $id,
        ];
        $this->db->query('DELETE FROM questions WHERE question_id = :question_id', $params);
    }
    public function sessionClose($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('UPDATE sessions SET status = 0 WHERE id = :id', $params);
    }
    public function sessionOpen($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('UPDATE sessions SET status = 1 WHERE id = :id', $params);
    }

}
