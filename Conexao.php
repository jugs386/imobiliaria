<?php
class Conexao{

private $servername = "localhost:3306";
private $username = "root";
private $password = "123456";
private $database = "imobiliaria";
private $conection;

    public function getConection(){
        if (is_null($this->conection)) {
            $this->conexao = new PDO('mysql:host='.$this->servername.';dbname='.$this->database, $this->username, $this->password);
            $this->conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conexao->exec('set names utf8');
        }
        return $this->conexao;
    }
}


