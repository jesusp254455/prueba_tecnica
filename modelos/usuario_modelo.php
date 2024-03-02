<?php 

class usuario_modelo {


    public static function registrar($datos){

        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "INSERT INTO t_usuario (uid,nombres,apellidos,email,password,tipo_usuario,photo)
        VALUES
        (?,?,?,?,?,?,?)";
        $p = $c->prepare($sql);
        $v = array($datos["uid"],
        $datos["nombres"],
        $datos["apellidos"],
        $datos["email"],
        $datos["password"],
        $datos["tipo_usuario"],
        $datos["photo"],
        );
        return $p->execute($v);
    }

    public static function listar(){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_usuario";
        $s = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }
    
}



?>