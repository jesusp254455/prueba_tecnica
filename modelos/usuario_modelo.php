
<?php 

class usuario_modelo{

    public static function registrar($datos){

        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "INSERT INTO t_usuarios (uid,nombres,
        correo,estado,contraseña,rol)
        VALUES
        (?,?,?,?,?,?)";
        $p = $c->prepare($sql);
        $v = array($datos["uid"],
        $datos["nombres"],
        $datos["email"],
        $datos['estado'],
        hash('sha256',$datos['contraseña']),
        $datos['rol']
        );
        return $p->execute($v);
    }

    public static function buscar($argumento){    
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_usuarios WHERE estado = 1 AND (nombres LIKE '%$argumento%' OR correo LIKE '%$argumento%') ";
        $s = $c->prepare($sql);
        $s->execute();
        return $s->fetchAll();
    }

    public static function editar($argumento){ 
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "SELECT * FROM t_usuarios where uid = ?";
        $s = $c->prepare($sql);
        $v = array($argumento);
        $s->execute($v);
        $resultado = $s->fetch();
        return $resultado;
      }

      public static function actualizar($datos){
        $objeto = new conexion;
        $c = $objeto->obtenerCon();
        $sql = "UPDATE t_usuarios set  nombres = ?, correo = ?, rol = ?  where uid = ?";
        $p = $c->prepare($sql);
        $v = array(
            $datos["nombres"],
            $datos["email"],
            $datos["rol"],
            $datos["uid_usuario"],
        );
        return $p->execute($v);
      }

    public static function eliminar($uid){
       
        $obj = new conexion();
        $c = $obj->obtenerCon();
        $sql = "UPDATE t_usuarios  SET estado = 2 where uid = ? ";
        $s = $c->prepare($sql);
        $v = array($uid);
        return $s->execute($v);
    }
}


?>