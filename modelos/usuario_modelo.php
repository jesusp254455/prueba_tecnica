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
        hash('sha256', $datos["password"]),
        $datos["tipo_usuario"],
        $datos["photo"],
        );
        return $p->execute($v);
    }

    public static function listar(){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_usuario where estado = 1";
        $s = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }


    public static function editar($uid){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_usuario where uid = ?";
        $s = $c->prepare($sql);
        $v = array($uid);
        $s->execute($v);
        $resultado = $s->fetch();
        return $resultado;
    }


    public static function actualizar($datos){

        // var_dump($datos);
        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "UPDATE t_usuario set  nombres = ?, apellidos = ?, email = ?, tipo_usuario = ? where uid = ?";
        $p = $c->prepare($sql);
        $v = array(
            $datos["nombres"],
            $datos["apellidos"],
            $datos["email"],
            $datos["tipo_usuario"],
            $datos["uid"],
        );
        return $p->execute($v);
    }

    public static function eliminar($uid){
       
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "UPDATE t_usuario  SET estado = 2 where uid = ? ";
        $s = $c->prepare($sql);
        $v = array($uid);
        return $s->execute($v);
    }
    
}



?>