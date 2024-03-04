<?php 
require_once "modelos/proyecto_modelo.php";
require_once "modelos/empleado_modelo.php";
class proyecto_controlador {

    public function __construct() {
       $this->vista = new estructura;
    }

    public function index(){
       
        $this->vista->unir_vistas("proyecto/index",);
    }

    public function vista_reg(){
        $this->vista->dato = empleado_modelo::listar();
     
        $this->vista->unir_vistas("proyecto/registrar");
    }

    public function registrar(){
       
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Validar los datos recibidos del formulario
                $required_fields = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'id_empleado'];
                foreach ($required_fields as $field) {
                    if (!isset($_POST[$field]) || empty($_POST[$field])) {
                        echo json_encode(array("mensaje" => "Faltan campos requeridos", "icono" => "error"));
                        return;
                    }
                }
                
                // Crear un array con los datos del proyecto
                $datos = array(
                    "nombre" => $_POST["nombre"],
                    "descripcion" => $_POST["descripcion"],
                    "fecha_inicio" => $_POST["fecha_inicio"],
                    "fecha_fin" => $_POST["fecha_fin"],
                    "id_empleado" => $_POST["id_empleado"]
                );
        
                // Llamar al método del modelo para registrar el proyecto
                $respuesta = proyecto_modelo::registrar($datos);
                if ($respuesta) {
                    echo json_encode(array("mensaje" => "Proyecto registrado", "icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "Error al registrar proyecto", "icono" => "error"));
                }
            } else {
                // Manejar la solicitud de manera apropiada si no es POST
                echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
            }
    
    }

    public function listar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $respuesta = proyecto_modelo::listar();
            echo json_encode(array("data" => $respuesta));
        }else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    public function editar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $this->vista->datos = proyecto_modelo::editar($id);
                $this->vista->empleados = empleado_modelo::listar();
                $this->vista->unir_vistas("proyecto/editar");
            } else {
                echo json_encode(array("mensaje" => "Parámetro id no encontrado", "icono" => "error"));
            }
        } else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Validar los datos recibidos del formulario
            $required_fields = ['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin', 'id_empleado', 'id'];
            foreach ($required_fields as $field) {
                if (!isset($_POST[$field]) || empty($_POST[$field])) {
                    echo json_encode(array("mensaje" => "Faltan campos requeridos", "icono" => "error"));
                    return;
                }
            }
            // Crear un array con los datos del proyecto
            $datos = array(
                "nombre" => $_POST["nombre"],
                "descripcion" => $_POST["descripcion"],
                "fecha_inicio" => $_POST["fecha_inicio"],
                "fecha_fin" => $_POST["fecha_fin"],
                "id_empleado" => $_POST["id_empleado"],
                "id" => $_POST["id"]
            );
    
            // Llamar al método del modelo para actualizar el proyecto
            $respuesta = proyecto_modelo::actualizar($datos);
            if ($respuesta) {
                echo json_encode(array("mensaje" => "Información actualizada", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Información no actualizada", "icono" => "error"));
            }
        } else {
            // Manejar la solicitud de manera apropiada si no es POST
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }

    public function eliminar(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if(isset($_GET["id"])) {
                $id = $_GET["id"];
                $respuesta = proyecto_modelo::eliminar($id);
                if ($respuesta) {
                    header('Location: ?controlador=proyecto&accion=index');
                } else {
                    echo json_encode(array("mensaje" => "Proyecto no eliminado", "icono" => "error"));
                }
            } else {
                echo json_encode(array("mensaje" => "Parámetro id no encontrado", "icono" => "error"));
            }
        } else {
            echo json_encode(array("mensaje" => "Método de solicitud no válido", "icono" => "error"));
        }
    }
}

?>