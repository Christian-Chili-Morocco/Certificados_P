<?php
            
            if(isset($_GET['tipo_de_documento_n']) && isset($_GET['ndocumentoo'])){
                $host = "localhost";
                $user = "root";
                $password = "";
                $database = "seguridad_peru";
                $conexion = mysqli_connect($host, $user, $password, $database);
                
                if(!$conexion){
                    echo "No se realizo la conexion a la basa de datos, el error fue:".
                    mysqli_connect_error() ;
                }

            
                    $tipo_documento = $_GET["tipo_de_documento_n"];
                    $numero_documento = $_GET["ndocumentoo"];
                    $tipo_documento = mysqli_real_escape_string($conexion, $tipo_documento);
                    $numero_documento = mysqli_real_escape_string($conexion, $numero_documento);

                    // Consulta a la base de datos
                    $sql = "SELECT * FROM certificados WHERE tipo_documento = '$tipo_documento' AND numero_documento = '$numero_documento'";
                    $result = $conexion -> query($sql);
                    $data = Array();
                    if($result->num_rows > 0){
                        
                        foreach($result as $row){
                                $sub_array = array();
                                $sub_array[] = $row["tipo_documento"];
                                $sub_array[] = $row["numero_documento"];
                                $sub_array[] = $row["nombre_completo"];
                                $sub_array[] = $row["nombre_certificado"];
                                $sub_array[] = $row["fecha_emision"];
                                $sub_array[] = $row["fecha_vencimiento"];
                                $sub_array[] = '<a href="../files/PDF/' . $row['descarga_certificados'] . '">Descargar</a>';
                                $sub_array[] = '<a href="../files/DIAPO/' . $row['descarga_diapositivas'] . '">Descargar</a>';
                                $sub_array[] = $row["nacionalidad"];
                                $data[]= $sub_array;
                        }
                        $results = array(
                            "sEcho"=>1,
                            "iTotalRecords"=>count($data),
                            "iTotalDisplayRecords"=>count($data),
                            "aaData"=>$data);
                        $json_data=json_encode($results);
                        /* echo json_encode($results); */
                        $results = json_decode($json_data, true);

                        // Extraer los datos de aaData
                        $data = $results['aaData'];

                        // Generar tabla HTML
                        echo '<div class="table-wrapper">';
                        echo '<table border="1" class="table display responsive nowrap">';
                        echo '<thead>';
                        echo '<td>TIPO DE DOCUMENTO</td>';
                        echo '<td>NUMERO DE DOCUMENTO</td>';
                        echo '<td>NOMBRE DE ALUMNO</td>';
                        echo '<td>CERTIFICADO</td>';
                        echo '<td>FECHA DE EMISIÓN</td>';
                        echo '<td>FECHA DE VENCIMIENTO</td>';
                        echo '<td>DESCARGA PDF</td>';
                        echo '<td>DESCARGA DIAPOSITIVA</td>';
                        echo '<td>NACIONALIDAD</td>';
                        echo '</thead>';
                        foreach ($data as $row) {
                            echo '<tr>';
                            foreach ($row as $cell) {
                                echo '<td>' . $cell . '</td>';
                            }
                            echo '</tr>';
                        }
                        echo '</table>';
                        echo '</div>';

                       
                    }else{
                        echo '<div class="alert alert-warning" role="alert">';
                            echo'<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                               echo'<span aria-hidden="true">&times;</span>';
                            echo'</button>';
                            echo'<strong class="d-block d-sm-inline-block-force">Intentalo de nuevo!!!</strong> Ingresa tu documento y tipo de documento correctamente';
                        echo'</div>';
                    }
                    
    }

    
?>