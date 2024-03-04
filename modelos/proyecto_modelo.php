<?php 

class proyecto_modelo {

    public static function registrar($datos){

        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "INSERT INTO t_proyectos (nombre, descripcion, fecha_inicio, fecha_fin, id_empleado)
        VALUES (?, ?, ?, ?, ?)";
        $p = $c->prepare($sql);
        $v = array(
            $datos["nombre"],
            $datos["descripcion"],
            $datos["fecha_inicio"],
            $datos["fecha_fin"],
            $datos["id_empleado"]
        );
        return $p->execute($v);
    }

    public static function listar(){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_proyectos";
        $s = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function editar($id){
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_proyectos WHERE id = ?";
        $s = $c->prepare($sql);
        $v = array($id);
        $s->execute($v);
        $resultado = $s->fetch();
        return $resultado;
    }

    public static function actualizar($datos){

        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "UPDATE t_proyectos SET nombre = ?, descripcion = ?, fecha_inicio = ?, fecha_fin = ?, id_empleado = ? WHERE id = ?";
        $p = $c->prepare($sql);
        $v = array(
            $datos["nombre"],
            $datos["descripcion"],
            $datos["fecha_inicio"],
            $datos["fecha_fin"],
            $datos["id_empleado"],
            $datos["id"]
        );
        return $p->execute($v);
    }

    public static function eliminar($id){
       
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "DELETE FROM t_proyectos WHERE id = ?";
        $s = $c->prepare($sql);
        $v = array($id);
        return $s->execute($v);
    }
}

?>
