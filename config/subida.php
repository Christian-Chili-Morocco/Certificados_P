<?php
    if(isset($_FILES['archivocerti']) || isset($_FILES['archivodiapo'])){
        extract($_POST);
        $nombre = $_POST['nombre'];
        $tipo_de_documento = $_POST['tipo_de_documento'];
        $idcertificado = $_POST['idcertificado'];
        $ndocumento = $_POST['ndocumento'];
        $ncertificado = $_POST['ncertificado'];
        $nacionalidad = $_POST['nacionalidad'];
        $fechaemi = $_POST['fechaemi'];
        $fechaven = $_POST['fechaven'];
        $carpeta_destino1 = "../files/PDF/";
        $carpeta_destino2 = "../files/DIAPO/";

        $nombre_archivo1 = basename($_FILES["archivocerti"]["name"]);
        $extension1 = strtolower(pathinfo($nombre_archivo1, PATHINFO_EXTENSION));
        $nombre_archivo2 = basename($_FILES["archivodiapo"]["name"]);
        $extension2 = strtolower(pathinfo($nombre_archivo2, PATHINFO_EXTENSION));


        if ($extension1 == "pdf" || $extension1 == "doc" || $extension1 == "docx" || $extension2 == "pdf" || $extension2 == "doc" || $extension2 == "docx"){

        if(move_uploaded_file($_FILES['archivocerti']['tmp_name'], $carpeta_destino1 . $nombre_archivo1) && move_uploaded_file($_FILES['archivodiapo']['tmp_name'], $carpeta_destino2 . $nombre_archivo2) ){
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "seguridad_peru";
            $conexion = mysqli_connect($host, $user, $password, $database);
            if(!$conexion){
            echo "No se realizo la conexion a la basa de datos, el error fue:".
            mysqli_connect_error() ;
        }
            $sql = "INSERT INTO certificados (id_certificados, nombre_completo, tipo_documento, numero_documento, nombre_certificado, nacionalidad, fecha_emision, fecha_vencimiento, descarga_certificados, descarga_diapositivas)
            VALUES ('$idcertificado', '$nombre', '$tipo_de_documento', '$ndocumento', '$ncertificado', '$nacionalidad', '$fechaemi', '$fechaven', '$nombre_archivo1', '$nombre_archivo2')";
            $resultado = mysqli_query($conexion, $sql);
            if ($resultado) {
                echo "<script language='JavaScript'>
                alert('Archivo Subido');
                location.assign('../../CERTIFICADOS_P/view/AdmHome/');
                </script>";
            } else {

                echo "<script language='JavaScript'>
                alert('Error al subir el archivo: ');
                location.assign('../../view/AdmHome/');
                </script>";
            }
        } else {
            echo "<script language='JavaScript'>
            alert('Error al subir el archivo. ');
            /* location.assign('../../view/AdmHome/'); */
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