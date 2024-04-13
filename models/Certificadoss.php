<?php
    require_once("../config/conection.php");
    class Certificadoss extends Conectar{
        
        public function get_certificado_x_Documento($num_doc){
           
            $conectar = parent::Conexion();
            parent::set_names();
            $sql = "SELECT * FROM certificados WHERE numero_documento = ?";
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1,$num_doc);
            $sql -> execute();
            return $resultado = $sql->fetchAll();
    }  
    }

?>