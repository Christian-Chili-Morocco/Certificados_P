<?php
  require_once("../../config/conection.php");
  if(isset($_SESSION["admin_id"])){
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("../html/MainHead.php"); ?>
    <title>Seguridad-Perú::Agregar Certificados</title>
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
          <a class="breadcrumb-item" href="#">Agregar Certificados</a>
        </nav>
      </div><!-- br-pageheader -->
      <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Certificados</h4>
        <p class="mg-b-0">Pantalla para agregar certificados</p>
      </div>

      <div class="br-pagebody">

        <!-- start you own content here -->

      </div><!-- br-pagebody -->

    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php require_once("../html/MainJs.php");?>
  </body>
</html>
<?php
  }else{
    header("Location:".Conectar::route()."view/404/");
  }
?>