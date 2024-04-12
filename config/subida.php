<?php
    if(isset($_FILES['archivocerti'])){
        extract($_POST);
        $nombre = $_POST['nombre'];
        $tipo_de_documento = $_POST['tipo_de_documento'];
        $ndocumento = $_POST['ndocumento'];
        $ncertificado = $_POST['ncertificado'];
        $nacionalidad = $_POST['nacionalidad'];
        $fechaemi = $_POST['fechaemi'];
        $fechaven = $_POST['fechaven'];

        $carpeta_destino = "../files/";

        $nombre_archivo = basename($_FILES["archivocerti"]["name"]);
        $extension = strtolower(pathinfo($nombre_archivo, PATHINFO_EXTENSION));

        if ($extension == "pdf" || $extension == "doc" || $extension == "docx"){

        if(move_uploaded_file($_FILES['archivocerti']['tmp_name'], $carpeta_destino . $nombre_archivo)){
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "seguridad_peru";
            $conexion = mysqli_connect($host, $user, $password, $database);
            if(!$conexion){
            echo "No se realizo la conexion a la basa de datos, el error fue:".
            mysqli_connect_error() ;
        }
            $sql = "INSERT INTO certificados (nombre_completo, tipo_documento, numero_documento, nombre_certificado, nacionalidad, fecha_emision, fecha_vencimiento, descarga_certificados, descarga_diapositivas)
            VALUES ('$nombre', '$tipo_de_documento', '$ndocumento', '$ncertificado', '$nacionalidad', $fechaemi, $fechaven, '$nombre_archivo', null)";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script language='JavaScript'>
                alert('Archivo Subido');
                location.assign('../../view/AdmHome'');
                </script>";
            } else {

                echo "<script language='JavaScript'>
                alert('Error al subir el archivo: ');
                location.assign('../../view/AdmHome');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            /* location.assign('../../view/AdmHome'); */
            </script>";
        }
    } else {
        echo "<script language='JavaScript'>
        alert('Solo se permiten archivos PDF, DOC y DOCX.');
        location.assign('../views/index.php');
        </script>";
      }
    }

?>