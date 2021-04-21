<?php
    include "./conexion.php";

    $token = $_POST['token'];
    $id_usuario=1;
    $registros=$conexion->query("select * from suscripciones where id_user = ".$id_usuario)or die($conexion->error);
    if(mysqli_num_rows($registros)>0){
        $fila=mysqli_fetch_row($registros);
        $conexion->query("update suscripciones set token='$token' where id_user=".$id_usuario)or die($conexion->error);
    }else{
        $conexion->query("insert into suscripciones (token, id_user) values('$token',$id_usuario)")or die($conexion->error);
    }
