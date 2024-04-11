<?php
    //INICIALIZANDO LA SESIÓN DEL USUARIO
    session_start();

    /*CLASE CONECTAR */
    class Conectar{
        protected $dbh;

        //Función protegida de la cadena de conexión
        protected function Conexion(){
            try{
                //Cadena de conexión
                $conectar = $this -> dbh = new PDO("mysql:local=localhost;dbname=seguridad_peru","root","");
                return $conectar;
            }catch(Exception $e){
                //Si hay un error de conexión
                print "¡Error BD!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        //Para impedir que tengamos problemas con las ñ y tildes
        public function set_names(){
            return $this->dbh->query("SET NAMES 'utf8'");
        }
        //ruta pricipal del proyecto
        public static function route(){
            return "http://localhost/certificados_P/";
        }
    }
?>