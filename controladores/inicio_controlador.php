<?php 
require_once "modelos/inicio_modelo.php";
class inicio_controlador {

    public function __construct() {
       $this->vista = new estructura;
    }

    public function index(){
       
        if(!isset($_SESSION["id"])){
            $this->vista->unir_vistas("inicio/login",false);
        }else{
           
            $this->vista->unir_vistas("inicio/index");
        }
    }
}

?>