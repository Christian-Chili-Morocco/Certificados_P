<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "seguridad_peru";
    $conexion = mysqli_connect($host, $user, $password, $database);
    if(!$conexion){
    echo "No se realizo la conexion a la basa de datos, el error fue:".
    mysqli_connect_error() ;
}

    // Obtener el nombre del archivo desde la URL
    $numero_documento = $_GET['numero_documento'];
    // Buscar el archivo en la base de datos
    $sql = "SELECT * FROM certificados WHERE numero_documento = '$numero_documento'";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_assoc($resultado);
        $archivo = $fila['archivocerti'];
        $ruta_archivo = "../files/" . $archivo;

        // Verificar que el archivo exista en el servidor
        if (file_exists($ruta_archivo)) {
            // Enviar el archivo al navegador
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $archivo . '"');
            readfile($ruta_archivo);
        } else {
            echo "El archivo no existe en el servidor.";
        }
    } else {
        echo "El archivo no se encontró en la base de datos.";
    }
?>