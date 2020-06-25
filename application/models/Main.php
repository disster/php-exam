<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
    function getSessionData($token){
        $params = [
            'token'=>$token,
        ];
        $data = $this->db->queryAll('SELECT * FROM sessions WHERE token = :token', $params);
        return $data[0];
    }
}
