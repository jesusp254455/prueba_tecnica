<?php 

require_once "modelos/usuario_modelo.php";

class usuario_controlador{

    public function __construct(){
        if(isset($_SESSION["id"])){
            if ($_SESSION["rol"] == "1") {
                $this->vista = new estructura;
            }else{
                header("location: ?controlador=inicio&accion=index");
            }
        }else{
            header("location: ?controlador=inicio&accion=index");
        }
    }


    public function index(){
  
        $this->vista->unir_vistas("usuario/index");
    
    }

    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $required_fields = ['nombres','email','contraseña','rol'];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo json_encode(array("mensaje" => "Faltan campos requeridos", "icono" => "error"));
                    return;
                }
            }
            
            // Crear un array con los datos del usuario
            $datos = array(
                "uid" => uniqid(),
                "nombres" => $_POST["nombres"],
                "email" => $_POST["email"],
                "estado" => 1,
                "contraseña" => $_POST["contraseña"],
                "rol" => $_POST["rol"]
            );
          
    
            // Llamar al método del modelo para registrar al usuario
            $respuesta = usuario_modelo::registrar($datos);
            if ($respuesta) {
                echo json_encode(array("mensaje" => "Usuario registrado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Error al registrar usuario", "icono" => "error"));
            }
        } else {
            // Manejar la solicitud de manera apropiada si no es POST
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    public function buscar() {   
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            extract($_GET);
            if (isset($_GET["argu"])) {
                $argumento = $_GET["argu"];
                $respuesta = usuario_modelo::buscar($argumento);
              if ($respuesta) { 
                echo json_encode(array("datos"=> $respuesta));
              }else{
                echo json_encode(array("mensaje" => "No se encontraron Resultados", "icono" => "error"));
              }
            }
        }else{
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
     }


     public function editar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET["uid"])) {
                $uid = $_GET["uid"];
                $respuesta = usuario_modelo::editar($uid); 
                echo json_encode(array("datose" => $respuesta));
            } else {
                echo json_encode(array("mensaje" => "Parámetro uid no encontrado", "icono" => "error"));
            }
        } else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    public function actualizar(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $required_fields = ['nombres','email','rol','uid_usuario'];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo json_encode(array("mensaje" => "Faltan campos requeridos", "icono" => "error"));
                    return;
                }
            }
            
            // Crear un array con los datos del usuario
            $datos = array(
                "nombres" => $_POST["nombres"],
                "email" => $_POST["email"],
                "rol" => $_POST["rol"],
                "uid_usuario"=> $_POST["uid_usuario"],
            );
          
    
            // Llamar al método del modelo para registrar al usuario
            $respuesta = usuario_modelo::actualizar($datos);
            if ($respuesta) {
                echo json_encode(array("mensaje" => "Usuario Editado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Error al editar usuario", "icono" => "error"));
            }
        } else {
            // Manejar la solicitud de manera apropiada si no es POST
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

     public function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET["uid"])) {
                $uid = $_GET["uid"];
                $respuesta = usuario_modelo::eliminar($uid);
                if ($respuesta) {
                    echo json_encode(array("mensaje" => "Usuario eliminado", "icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "Usuario no eliminado", "icono" => "error"));
                }
            } else {
                echo json_encode(array("mensaje" => "Parámetro uid no encontrado", "icono" => "error"));
            }
        } else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }
}

?>