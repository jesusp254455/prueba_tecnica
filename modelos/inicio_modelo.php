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


    public static function vali($datos){
        $o = new conexion;
        $c = $o->obtenerCon();
        $sql = "SELECT * FROM t_usuarios WHERE estado = 1 and (correo = ? and contraseña =  ?)";
        $p =$c->prepare($sql);
        $vec = array($datos["email"],hash('sha256',$datos["password"]));
        $p->execute($vec);
        // var_dump($p->fetch());
        return $p->fetch();
    }

}



?>


