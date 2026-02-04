<?php

    class conexao{
        private $host = 'localhost';
        private $dbname = 'php_pdo';
        private $user = 'root';
        private $pass = '';


        public function conectar(){
            try{
                $conexao = new PDO(
                    "msql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );
                    return $conexao;
            } catch (PDOException $e) {
                echo '<p>'.$e->getMessage().'</p>';
            }
        }

    }


?>