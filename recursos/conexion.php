<?php

require('vendor/autoload.php');

// se carga el archivo env
// composer require vlucas/phpdotenv
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


class conexion{
    private $c;
    private $usuario;
    private $password;
    private $host;

    public function __construct(){
        $this->usuario = $_ENV["usuario"];
        $this->password = $_ENV["password"];
        $this->host = $_ENV["host"];
        try {
            $this->c = new PDO($this->host,$this->usuario,$this->password);
            $this->c->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
                echo "el error es".$e->getMessage();
        }
    }

    public function obtenerCon(){
        return $this->c;
    }
}
?>