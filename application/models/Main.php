<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    function getSessionData($token)
    {
        $params = [
            'token' => $token,
        ];
        $data = $this->db->queryAll('SELECT * FROM sessions WHERE token = :token', $params)[0];
        $params = [
            'id' => $data['id']
        ];
        $questions = $this->db->queryAll('SELECT * FROM questions WHERE session_id = :id', $params);
        $data['questions'] = $questions;
        return $data;
    }
    public function validate( $post)
    {
        return true;
    }
//    public function saveAnwsers($post,$token){
//        $params = [
//            'ip' =>$_SERVER['REMOTE_ADDR'],
//            'answer_text' =>$post['text'],
//            'session_token'=>$token,
//        ];
//        $this->db->query('INSERT INTO anwsers(type, text, session_id) VALUES (:type, :text, :session_id)', $params);
//    }
}
