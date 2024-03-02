<?php 
require_once "modelos/inicio_modelo.php";
class inicio_controlador {

    public function __construct() {
       $this->vista = new estructura;
    }

    public function index(){
        $this->vista->unir_vistas("empleados/index");
    }
}

?>