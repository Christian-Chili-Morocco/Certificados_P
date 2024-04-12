<?php
  //Llamamos al archivo de conexion.php
  require_once("../../config/conection.php");
  if(isset($_SESSION["admin_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("../html/MainHead.php"); ?>
    <title>Seguridad-Perú::Panel de Administrador</title>
  </head>

  <body>
    <?php require_once("../html/MainMenu.php");?>
    <!-- ########## END: LEFT PANEL ########## -->
    
    <!-- ########## START: HEAD PANEL ########## -->
    <?php require_once("../html/MainHeader.php");?>
    <!-- ########## END: HEAD PANEL ########## -->

 

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">
      <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
          <a class="breadcrumb-item" href="#">Inicio</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Inicio</h4>
        <p class="mg-b-0">Tabla de nuestros estudiantes</p>
      </div>
      <!-- ACA EMPIEZA EL BODY PRINCIPAL -->
      <!-- CONTENIDO DEL PROYECTO-->
      <div class="br-pagebody">
        <div class="br-section-wrapper">
          <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Listado de Certificados y Usuarios<h6>
          <p class="mg-b-25 mg-lg-b-50">Aqui podremos visualizar los alumnos con sus respectivos certificados disponibles.</p>

          <div class="table-wrapper">
            <table id="data_alumno" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-1p">Tipo de Documento</th>
                  <th class="wd-1p">Documento</th>
                  <th class="wd-20p">Alumno</th>
                  <th class="wd-15p">Certificado</th>
                  <th class="wd-10p">Fecha de Emisión</th>
                  <th class="wd-25p">Fecha de Vencimiento</th>
                  <th class="wd-15p">PDF</th>
                  <!-- <th class="wd-5p">DIAPO</th> -->
                  <th class="wd-15p">Nacionalidad</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>  
          </div>
        </div>
      </div>       
    </div>
    



    <?php require_once("../html/MainJs.php");?>
    <script type="text/javascript" src="admhome.js"></script>
    
  </body>
</html>
<?php
  }else{
    header("Location:".Conectar::route()."view/404/");
  }
?>
