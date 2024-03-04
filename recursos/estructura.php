<?php 

class estructura {

  
    public function unir_vistas($contenido, $cargar = true){
       if ($cargar == true) {
        require_once   "vistas/layout/header.php";
        require_once  "vistas/view_admin/$contenido".".php";
        require_once "vistas/layout/footer.php";
       } else {
        require_once  "vistas/view_admin/$contenido".".php";
       }
       
    }
}

?>