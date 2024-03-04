<?php 

class empleado_modelo {


    public static function registrar($datos){
        // Se instancia un objeto de la clase 'conexion' para obtener la conexión a la base de datos
        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        // Se prepara la consulta SQL para insertar un nuevo empleado en la tabla 't_empleados'
        $sql = "INSERT INTO t_empleados (uid,nombres,apellidos,salario,fecha_contratacion,email,estado) VALUES (?,?,?,?,?,?,?)";
        $p = $c->prepare($sql);
        // Se asignan los valores de los datos recibidos al array '$v'
        $v = array(
            $datos["uid"],
            $datos["nombres"],
            $datos["apellidos"],
            $datos["salario"],
            $datos["fecha_contratacion"],
            $datos["email"],
            $datos['estado']
        );
        // Se ejecuta la consulta SQL y se retorna el resultado
        return $p->execute($v);
    }
    
    public static function listar(){
        // Se instancia un objeto de la clase 'conexion' para obtener la conexión a la base de datos
        $obj = new conexion();
        $c = $obj->obtenerCon();
        // Se prepara la consulta SQL para obtener todos los empleados activos de la tabla 't_empleados'
        $sql = "SELECT * FROM t_empleados where estado = 1";
        $s = $c->prepare($sql);
        $s->execute();
        // Se retornan todos los registros obtenidos
        return $s->fetchAll();
    }
    
    public static function editar($uid){
        // Se instancia un objeto de la clase 'conexion' para obtener la conexión a la base de datos
        $obj = new conexion();
        $c = $obj->obtenerCon();
        // Se prepara la consulta SQL para obtener los datos de un empleado específico por su 'uid'
        $sql = "SELECT * FROM t_empleados where uid = ?";
        $s = $c->prepare($sql);
        $v = array($uid);
        $s->execute($v);
        // Se retorna el resultado de la consulta
        $resultado = $s->fetch();
        return $resultado;
    }
    
    public static function actualizar($datos){
        // Se instancia un objeto de la clase 'conexion' para obtener la conexión a la base de datos
        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        // Se prepara la consulta SQL para actualizar los datos de un empleado en la tabla 't_empleados'
        $sql = "UPDATE t_empleados set  nombres = ?, apellidos = ?, salario = ?, fecha_contratacion = ?, email = ?  where uid = ?";
        $p = $c->prepare($sql);
        // Se asignan los valores de los datos recibidos al array '$v'
        $v = array(
            $datos["nombres"],
            $datos["apellidos"],
            $datos["salario"],
            $datos["fecha_contratacion"],
            $datos["email"],
            $datos["uid"],
        );
        // Se ejecuta la consulta SQL y se retorna el resultado
        return $p->execute($v);
    }
    
    public static function eliminar($uid){
        // Se instancia un objeto de la clase 'conexion' para obtener la conexión a la base de datos
        $obj = new conexion();
        $c = $obj->obtenerCon();
        // Se prepara la consulta SQL para marcar como inactivo (estado = 2) a un empleado en la tabla 't_empleados' por su 'uid'
        $sql = "UPDATE t_empleados  SET estado = 2 where uid = ? ";
        $s = $c->prepare($sql);
        $v = array($uid);
        // Se ejecuta la consulta SQL y se retorna el resultado
        return $s->execute($v);
    }
    
    
}



?>