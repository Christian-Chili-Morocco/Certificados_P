<?php
    //Llamando cadena de conexión
    require_once("../config/conection.php");
    //Llamanado clase administrador-models
    require_once("../models/Administrador.php");
    //Inicializando la clase Administrador

    $administrador = new Administrador();

    //Opcion de solicitud de controller
    switch($_GET["op"]){
        //Microservicio para mostrar los cursos
        case "listar_alumnos":
            //LLAMAMOS A LA FUNCION
            $datos = $administrador->get_alumnos();
            $data = Array();

            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["tipo_documento"];
                $sub_array[] = $row["numero_documento"];
                $sub_array[] = $row["nombre_completo"];
                $sub_array[] = $row["nombre_certificado"];
                $sub_array[] = $row["fecha_emision"];
                $sub_array[] = $row["fecha_vencimiento"];
                $sub_array[] = '<a href="../../files/PDF/' . $row['descarga_certificados'] . '">Descargar</a>';
                $sub_array[] = '<a href="../../files/DIAPO/' . $row['descarga_diapositivas'] . '">Descargar</a>';
                $sub_array[] = $row["nacionalidad"];
                $data[]= $sub_array;
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
            break;
    }

?>