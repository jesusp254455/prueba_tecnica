<?php 

class inicio_modelo{

    public static function tables(){
         $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SHOW TABLES";
        $s = $c->prepare($sql);
        $s->execute();
        var_dump($s->fetchAll());
    }

}


?>


