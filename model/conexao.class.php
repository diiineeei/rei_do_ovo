<?php

class Conexao
{
    private $host = "";
    private $db_name = "";
    private $user = "";
    private $password = "";

    function Conectar(){
        $con = new pdo(
            "mysql:host=".$this->host.";dbname=".$this->db_name,
            $this->user,
            $this->password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $con;
    }
}
