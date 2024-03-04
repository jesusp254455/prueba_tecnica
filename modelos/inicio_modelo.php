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


    public static function setinformacion($id){
        $o = new conexion;
        $c = $o->obtenerCon();
        $sql = "SELECT * FROM t_usuarios WHERE estado = 1 and  id = ?";
        $p =$c->prepare($sql);
        $vec = array($id);
        $p->execute($vec);
        return $p->fetch();
    }

    public static function grafica(){
        $o = new conexion;
        $c = $o->obtenerCon();
        $sql = "SELECT 
        sum(case when MONTH(fecha_inicio) = '1'       then 1 else 0 end) as 'ENERO',
        sum(case when MONTH(fecha_inicio) = '2'      then 1 else 0 end) as 'FEBRERO',
        sum(case when MONTH(fecha_inicio) = '3'    then 1 else 0 end) as 'MARZO',
        sum(case when MONTH(fecha_inicio) = '4'     then 1 else 0 end) as 'ABRIL',
        sum(case when MONTH(fecha_inicio) = '5'       then 1 else 0 end) as 'MAYO',
        sum(case when MONTH(fecha_inicio) = '6'     then 1 else 0 end) as 'JUNIO',
        sum(case when MONTH(fecha_inicio) = '7'     then 1 else 0 end) as 'JULIO',
        sum(case when MONTH(fecha_inicio) = '8'     then 1 else 0 end) as 'AGOSTO',
        sum(case when MONTH(fecha_inicio) = '9'     then 1 else 0 end) as 'SEPTIEMBRE',
        sum(case when MONTH(fecha_inicio) = '10'     then 1 else 0 end) as 'OCTUBRE',
        sum(case when MONTH(fecha_inicio) = '11'     then 1 else 0 end) as 'NOVIEMBRE',
        sum(case when MONTH(fecha_inicio) = '12'     then 1 else 0 end) as 'DICIEMBRE'
        FROM `t_proyectos`";
        $p =$c->prepare($sql);
        $p->execute();
        return $p->fetch();
    }

}



?>


