<?php
    $id_certificados=$_GET['id_certificados'];
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "seguridad_peru";
    $conexion = mysqli_connect($host, $user, $password, $database);
    if(!$conexion){
    echo "No se realizo la conexion a la basa de datos, el error fue:".
    mysqli_connect_error() ;
    }
    $sql="DELETE FROM certificados WHERE id_certificados = '".$id_certificados."'";
    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
        echo "<script language='JavaScript'>
        alert('Certificado Eliminado');
        location.assign('../../CERTIFICADOS_P/view/AdmHome/');
        </script>";
    }else{
        echo "<script language='JavaScript'>
        alert('Certificado No Eliminado');
        location.assign('../../CERTIFICADOS_P/view/AdmHome/');
        </script>";
    }


?>