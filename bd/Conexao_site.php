<?php

class Conexao extends PDO {

    private $banco = 'seerde54_natuveggie';
    private $user = 'seerde54_mysql';
    private $senha = 'Dinhoechi@12';
    private $host = '108.167.132.246';

    function __construct() {
        $dsn = 'mysql:host='.$this->host.';dbname=' . $this->banco;
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        try {
            parent::__construct($dsn, $this->user, $this->senha, $options);
        } catch (PDOException $e) {
            file_put_contents('erros.txt', $e->getMessage() . "/r/n", FILE_APPEND);
        }
    }

}
