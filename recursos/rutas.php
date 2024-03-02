<?php 
// Definición de la clase "rutas"
class rutas {
    // Método estático para cargar contenido basado en el controlador y la acción proporcionados
    public static function cargar_contenido($controlador, $accion){
        // Construir la ruta del archivo del controlador
        $archivo = "controladores/" . $controlador . "_controlador.php";
        
        // Verificar si el archivo del controlador existe
        if (file_exists($archivo)) {
            // Incluir el archivo del controlador
            require_once $archivo;
            
            // Crear una instancia del controlador dinámicamente
            $clase = $controlador . "_controlador";
            $o = new $clase;
            
            // Verificar si el método especificado existe en la instancia del controlador
            if (method_exists($o, $accion)) {
                // Llamar al método especificado
                $o->$accion();
            } else {
                // Si el método no existe, mostrar un mensaje de error
                echo "<br> El método no existe";
            }
        } else {
            // Si el archivo del controlador no existe, mostrar un mensaje de error
            echo "<br> No existe el controlador";
        }
    }
}
?>
