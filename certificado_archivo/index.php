<?php
    //Llamamos al archivo de conexion.php
  require_once("../config/conection.php");
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php require_once("html/MainHead.php"); ?>
    <script> src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"</script>
    <title>Certificados-Usuarios</title>
  </head>

  <body>
    <?php require_once("html/MainMenu.php");?>
    <!-- ########## END: LEFT PANEL ########## -->
    
    <!-- ########## START: HEAD PANEL ########## -->
    <?php require_once("html/MainHeader.php");?>
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
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Descarga tu certificado<h6>
            <p class="mg-b-25 mg-lg-b-50">Aqui puedes descargar tu certificado</p>
            <!-- hhh -->
            <div>
                <form method="get" action="">
                    <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Tipo de Documento: <span class="tx-danger">*</span></label>
                            <select id="tipo_de_documento_n" name="tipo_de_documento_n" class="form-control select2" data-placeholder="Elige tu tipo de documento">
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
                            <input class="form-control" type="text" name="ndocumentoo" id="ndocumentoo"  placeholder="Ingresa tu número de documento">
                        </div>
                        </div>
                        <div class="form-layout-footer mg-t-25">
                            <button class="btn btn-info " id="validar" name="validar" type="submit" >Buscar Certificados</button>
                        </div>
                </form>
            </div>
            <!-- hhh -->
            <?php require_once("../config/consulta.php"); ?>
            <script>
              $(document).ready(function(){
                $('input[name="ndocumentoo"]').on('keyup',function(){
                  var ndocumentoo = $(this).val();
                  console.log(ndocumentoo);
                  $.ajax({
                    url:'consulta.php',
                    type:'GET',
                    data:{ndocumentoo:ndocumentoo},
                    sucess: function(response){
                      $('#resultados').html(response);
                    }
                  });

                });
              });

            </script>


        </div>
      </div>       
</div>



    <?php require_once("html/MainJs.php");?>
    <script type="text/javascript" src="certificado_archivo.js"></script>
    
  </body>
</html>
<?php
?>