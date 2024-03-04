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
           $this->vista->info = inicio_modelo::setinformacion($_SESSION["id"]);
           $this->vista->meses = inicio_modelo::grafica();
            $this->vista->unir_vistas("inicio/index");
        }
    }

    public function ingresar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);
    
            $datos["email"] = $_POST["email"];
            $datos["password"] = $_POST["password"];
            $r = inicio_modelo::vali($datos);

            if ($r > 0) {
                $_SESSION["nombres"] = $r["nombres"];
                $_SESSION["rol"] = $r["rol"];
                $_SESSION["id"] = $r["id"];
                header("location: ?controlador=inicio&accion=index");
            } else {
                echo json_encode(array("mensaje" => "Acceso denegado", "icono" => "error"));
            }
            
        }
    }


    public function salir(){
        session_destroy();
        header("location: /prueba_tecnica");
    }
}

?>