
<?php 
if (isset($_POST['numeroDocumento'])) {

  $query = mysqli_query($mysqli, "SELECT * FROM encargados WHERE NumeroDocumento='$_POST[numeroDocumento]'")
    or die('error ' . mysqli_error($mysqli));
  $data = mysqli_fetch_assoc($query);
}
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Perfil del Encargado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=perfil"> Perfil del Encargado </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/perfil/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="numeroDocumento" value="<?php echo $data['NumeroDocumento']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre(s)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreEncargado" autocomplete="off" value="<?php echo $data['NombreEncargado']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Paterno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellido1Encargado" autocomplete="off" value="<?php echo $data['Apellido1Encargado']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Apellido Materno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellido2Encargado" autocomplete="off" value="<?php echo $data['Apellido2Encargado']; ?>" required>
                </div>
              </div>		  
			  			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Número de Contacto</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="numeroContacto" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['NumeroContacto']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Correo Electronico</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="correo" autocomplete="off" value="<?php echo $data['Correo']; ?>">
                </div>
              </div>
              
            <div class="form-group">
                <label class="col-sm-2 control-label">Foto</label>
                <div class="col-sm-5">
                  <input type="file" name="foto">
                  <br/>
                <?php 
                if ($data['Foto'] == "") { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/user-default.png" width="128">
                <?php

              } else { ?>
                  <img style="border:1px solid #eaeaea;border-radius:5px;" src="images/user/<?php echo $data['Foto']; ?>" width="128">
                <?php

              }
              ?>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=perfil" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->