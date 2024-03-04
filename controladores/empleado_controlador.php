<?php 

require_once "modelos/empleado_modelo.php";

class empleado_controlador {
    public function __construct() {
        // Verifica si existe una sesión iniciada
        if(isset($_SESSION["id"])){
            // Verifica si el rol de usuario es válido para acceder a esta sección
            if ($_SESSION["rol"] == "1" || $_SESSION["rol"] == "3") {
                $this->vista = new estructura;
            }else{
                // Redirige a la página de inicio si el rol no es válido
                header("location: ?controlador=inicio&accion=index");
            }
        } else {
            // Redirige a la página de inicio si no hay sesión iniciada
            header("location: ?controlador=inicio&accion=index");
        }
    }
 
    // Método para cargar la vista principal de empleados
    public function index(){
        $this->vista->unir_vistas("empleado/index");
    }

    // Método para registrar un nuevo empleado
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $required_fields = ['nombres', 'apellidos',  'salario', 'fecha_contratacion', 'email'];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo json_encode(array("mensaje" => "Faltan campos requeridos", "icono" => "error"));
                    return;
                }
            }
            
            // Crear un array con los datos del empleado
            $datos = array(
                "uid" => uniqid(),
                "nombres" => $_POST["nombres"],
                "apellidos" => $_POST["apellidos"],
                "salario"=> $_POST["salario"],
                "fecha_contratacion"=> $_POST["fecha_contratacion"],
                "email" => $_POST["email"],
                "estado" => 1 // Reemplazar esto con la lógica real para manejar las fotos
            );
    
            // Llamar al método del modelo para registrar al empleado
            $respuesta = empleado_modelo::registrar($datos);
            if ($respuesta) {
                echo json_encode(array("mensaje" => "Empleado registrado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Error al registrar empleado", "icono" => "error"));
            }
        } else {
            // Manejar la solicitud de manera apropiada si no es POST
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    // Método para obtener la lista de empleados
    public function listar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $respuesta = empleado_modelo::listar();
            echo json_encode(array("data" => $respuesta));
        }else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    // Método para cargar la vista de edición de empleado
    public function editar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET["uid"])) {
                $uid = $_GET["uid"];
                $respuesta = empleado_modelo::editar($uid); // Llama a la función de modelo editar()
                echo json_encode(array("data" => $respuesta));
            } else {
                echo json_encode(array("mensaje" => "Parámetro uid no encontrado", "icono" => "error"));
            }
        } else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    // Método para actualizar la información de un empleado
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $required_fields = ['nombres', 'apellidos', 'salario', 'fecha_contratacion', 'email','uid'];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo json_encode(array("mensaje" => "Faltan campos requeridos", "icono" => "error"));
                    return;
                }
            }
            // Crear un array con los datos del empleado
            $datos = array(
                "nombres" => $_POST["nombres"],
                "apellidos" => $_POST["apellidos"],
                "salario"=> $_POST["salario"],
                "fecha_contratacion"=> $_POST["fecha_contratacion"],
                "email" => $_POST["email"],
                "uid" => $_POST["uid"],
            );
    
            // Llamar al método del modelo para actualizar la información del empleado
            $respuesta = empleado_modelo::actualizar($datos);
            if ($respuesta) {
                echo json_encode(array("mensaje" => "Informacion actualizada", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Informacion no actualizada", "icono" => "error"));
            }
        } else {
            // Manejar la solicitud de manera apropiada si no es POST
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    // Método para eliminar un empleado
    public function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET["uid"])) {
                $uid = $_GET["uid"];
                $respuesta = empleado_modelo::eliminar($uid);
                if ($respuesta) {
                    echo json_encode(array("mensaje" => "Empleado eliminado", "icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "Empleado no eliminado", "icono" => "error"));
                }
            } else {
                echo json_encode(array("mensaje" => "Parámetro uid no encontrado", "icono" => "error"));
            }
        } else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    // Método adicional para cargar la vista principal de empleados
    public function index2(){
        $this->vista->unir_vistas("empleado/index");
    }
}

?>
