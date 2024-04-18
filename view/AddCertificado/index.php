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
        <!-- ELEMENTOS PRINCIAPALES DE LA PAGINA -->
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">INGRESAR CERTIFICADOS</h6>
            <p class="mg-b-30 tx-gray-600">ACA PUEDES INSERTAR A LOS USUARIOS Y SUS CERTIFICADOS</p>
            <form action="../../config/subida.php" method="POST" enctype="multipart/form-data">
            <div class="form-layout form-layout-1">
              <div class="row mg-b-25">
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label" for="nombre">Nombre Completo: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre completo">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Tipo de Documento: <span class="tx-danger">*</span></label>
                    <select id="tipo_de_documento" name="tipo_de_documento" class="form-control select2" data-placeholder="Elige tu tipo de documento">
                      <option label="Elige tu tipo de documento"></option>
                      <option value="DNI">DNI</option>
                      <option value="RUC">RUC</option>  
                      <option value="CE">CE</option>
                      <option value="PPT">PPT</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Número de Documento: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="ndocumento" id="ndocumento"  placeholder="Ingresa tu número de documento">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Id del Certificado: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="idcertificado" id="idcertificado"  placeholder="Ingresa el id del certificado">
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Nombre del Certificado: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="ncertificado" id="ncertificado"  placeholder="Ingresa el nombre del certificado">
                  </div>
                </div><!-- col-4 -->
                <div class="col-lg-4">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Nacionalidad: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="text" name="nacionalidad" id="nacionalidad"  placeholder="Ingresa tu nacionalidad">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Fecha de Emisión: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="date" name="fechaemi" id="fechaemi"  placeholder="Ingresa tu fecha">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group mg-b-10-force">
                    <label class="form-control-label">Fecha de vencimiento: <span class="tx-danger">*</span></label>
                    <input class="form-control" type="date" name="fechaven" id="fechaven"  placeholder="Ingresa tu fecha">
                  </div>
                </div>
                <div class="col-lg-6 mg-t-15">
                  <div class="form-group mg-b-10-force">
                    <label for="archivocerti">Cargar Certificado:</label>
                    <input type="file" id="archivocerti" name="archivocerti">
                  </div>
                </div>
                <div class="col-lg-6 mg-t-15">
                  <div class="form-group mg-b-10-force">
                    <label for="archivodiapo">Cargar Diapositiva:</label>
                    <input type="file" id="archivodiapo" name="archivodiapo">
            </form>
                  </div>
                </div>
                
              </div><!-- row -->

              <div class="form-layout-footer">
                <button class="btn btn-info" id="register" name="registrar" type="submit" >Guardar Certificado</button>
                <button class="btn btn-secondary" type="button">Cancel</button>
              </div><!-- form-layout-footer -->
            </div>
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