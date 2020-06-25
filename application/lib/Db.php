<?php

namespace application\lib;

use PDO;

class Db
{
    protected $db;
    function __construct()
    {
        $config  = require 'application/config/db.php';
        extract($config);
        $this->db = new PDO('mysql:host=' . $host . ';dbname=' . $name . '', $user, $password);
    }
    public function query($sql, $params = [])
    {
        $query = $this->db->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $key => $val) {
                if (is_int($val)) {
                    $type = PDO::PARAM_INT;
                } else {
                    $type = PDO::PARAM_STR;
                }
                $query->bindValue(':' . $key, $val, $type);
            }
        }
        $query->execute();
        return  $query;
    }
    public function queryAll($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return  $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function queryColumn($sql, $params = [])
    {
        $result = $this->query($sql, $params);
        return  $result->fetchColumn();
    }
    public function lastInsert()
    {
        return $this->db->lastInsertId();
    }
}
