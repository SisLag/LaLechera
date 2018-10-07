<?php 
if (isset($_SESSION['numeroDocumento'])) {

  $query = mysqli_query($mysqli, "SELECT * FROM encargados WHERE NumeroDocumento='$_SESSION[numeroDocumento]'")
    or die('error: ' . mysqli_error($mysqli));
  $data = mysqli_fetch_assoc($query);
}
?>

<?php 

$query_id = mysqli_query($mysqli, "SELECT n.PerfilEncargado, pe.NombrePerfil FROM encargados n LEFT JOIN perfiles pe ON n.PerfilEncargado=pe.IdPerfil")
  or die('error ' . mysqli_error($mysqli));

$data_id = mysqli_fetch_assoc($query_id);

?>


<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Perfil de Usuario
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active"> Perfil de Usuario</li>
  </ol>
</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php 

    if (empty($_GET['alert'])) {
      echo "";
    } elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Dato Modificado Correctamente
            </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que el archivo que se sube es correcto.
            </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que la imagen no es más de 1 MB.
            </div>";
    } elseif ($_GET['alert'] == 4) {
      echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que el tipo de archivo subido *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    ?>

      <div class="box box-success">
        <!-- form start -->
		
	
        <form role="form" class="form-horizontal" method="POST" action="?module=form_perfil" enctype="multipart/form-data">
        <div class="form-group">
        <div class="box-body3">
        <a class="btn btn-success glyphicon pull-right" href="?module=printPerfil" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
              <label class="col-sm-2 control-label">
              <?php 
              if ($data['Foto'] == "") { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/user-default.png" width="75">
              <?php

            } else { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/<?php echo $data['Foto']; ?>" width="75">
              <?php

            }
            ?>
              </label>
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['NombreEncargado']; ?></label>
              
            </div>
            
            </div>
            <hr>
          <div class="box-body3">

            <input type="hidden" name="numeroDocumento" value="<?php echo $data['NumeroDocumento']; ?>">
            
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Nombre de Usuario</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NombreEncargado']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['Correo']; ?></label>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Telefono</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['NumeroContacto']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Permisos de acceso</label>
              <label style="text-align:left" class="col-sm-8 control-label">:<?php echo $data_id['NombrePerfil']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['status']; ?></label>
            </div>
          </div><!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-submit" name="Modificar" value="Modificar">
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content