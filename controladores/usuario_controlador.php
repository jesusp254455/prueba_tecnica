<?php 

require_once "modelos/usuario_modelo.php";

class usuario_controlador {
    public function __construct() {
        $this->vista = new estructura;
     }
 
     public function index(){
         $this->vista->unir_vistas("usuarios/index");
     }

     public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $required_fields = ['nombres', 'apellidos', 'email', 'password', 'tipo_usuario'];
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
                "apellidos" => $_POST["apellidos"],
                "email" => $_POST["email"],
                "password" => $_POST["password"],
                "tipo_usuario" => $_POST["tipo_usuario"],
                "photo" => "sddddd" // Reemplazar esto con la lógica real para manejar las fotos
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


    public function listar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $respuesta = usuario_modelo::listar();
        echo json_encode(array("data" => $respuesta));
        }else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }

    }
}

?>