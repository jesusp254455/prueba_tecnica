<?php 

class empleado_modelo {


    public static function registrar($datos){

        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "INSERT INTO t_empleados (uid,nombres,apellidos,
        salario,fecha_contratacion,email,
        password,photo,estado)
        VALUES
        (?,?,?,?,?,?,?,?,?)";
        $p = $c->prepare($sql);
        $v = array($datos["uid"],
        $datos["nombres"],
        $datos["apellidos"],
        $datos["salario"],
        $datos["fecha_contratacion"],
        $datos["email"],
        hash('sha256', $datos["password"]),
        $datos["photo"],
        $datos['estado']
        );
        return $p->execute($v);
    }

    public static function listar(){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_empleados where estado = 1";
        $s = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }


    public static function editar($uid){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_empleados where uid = ?";
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
        $sql = "UPDATE t_empleados set  nombres = ?, apellidos = ?, salario = ?, fecha_contratacion = ?, email = ?  where uid = ?";
        $p = $c->prepare($sql);
        $v = array(
            $datos["nombres"],
            $datos["apellidos"],
            $datos["salario"],
            $datos["fecha_contratacion"],
            $datos["email"],
            $datos["uid"],
        );
        return $p->execute($v);
    }

    public static function eliminar($uid){
       
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "UPDATE t_empleados  SET estado = 2 where uid = ? ";
        $s = $c->prepare($sql);
        $v = array($uid);
        return $s->execute($v);
    }
    
}



?>