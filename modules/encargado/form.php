<script src="assets/js/validarTexto.js"></script>
<?php 

if ($_GET['form'] == 'add') { ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Encargado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=encargado"> Encargado </a></li>
      <li class="active"> agregar </li>
    </ol>
  </section>
  

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
		  
          <form role="form" class="form-horizontal" method="POST" action="modules/encargado/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">
			<div class="alert alert-danger" role="alert" id="alert">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			</div>			
			<div class="form-group">
      <label class="col-sm-2 control-label">* Número de Documento</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="numeroDocumento" id="numeroDocumento" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
              <label class="col-sm-2 control-label">* Nombre(s)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreEncargado" id="nombreEncargado" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
        <label class="col-sm-2 control-label">* Apellido Paterno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellido1Encargado" id="apellido1Encargado" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
        <label class="col-sm-2 control-label">* Apellido Materno</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellido2Encargado" id="apellido2Encargado" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
        <label class="col-sm-2 control-label">* Usuario</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="usuarioEncargado" id="usuarioEncargado" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
              <label class="col-sm-2 control-label">* Contraseña</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" name="claveEncargado" id="claveEncargado" autocomplete="off" required>
                </div>
              </div>  
         			
			<div class="form-group">  
      <label class="col-sm-2 control-label">* Permisos de acceso</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="perfilEncargado" id="perfilEncargado" data-placeholder="-- Seleccionar Permisos --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdPerfil, NombrePerfil FROM perfiles ORDER BY IdPerfil ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdPerfil]\"> $data_obat[IdPerfil] | $data_obat[NombrePerfil] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar" Onclick="validarUsuario()">
                  <a href="?module=encargado" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php

} elseif ($_GET['form'] == 'edit') {
  if (isset($_GET['id'])) {

    $query = mysqli_query($mysqli, "SELECT en.NumeroDocumento,en.NombreEncargado,en.Apellido1Encargado,en.Apellido2Encargado,en.Correo,en.NumeroContacto,en.Foto,en.ClaveEncargado,en.PerfilEncargado,p.NombrePerfil FROM encargados en LEFT JOIN perfiles p ON en.PerfilEncargado=p.IdPerfil WHERE en.NumeroDocumento='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar datos del Encargado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
      <li><a href="?module=encargado"> Encargado </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/encargado/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">              
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Numero Documento</label>
                <div class="col-sm-5">
				  <input type="text" class="form-control" name="numeroDocumento" autocomplete="off" value="<?php echo $data['NumeroDocumento']; ?>" required readonly>
				</div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
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
                <label class="col-sm-2 control-label">Correo</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" name="correo" autocomplete="off" value="<?php echo $data['Correo']; ?>">
                </div>
              </div>
            
              <div class="form-group">
                <label class="col-sm-2 control-label">Numero Contacto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="numeroContacto" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['NumeroContacto']; ?>">
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

              <div class="form-group">
                <label class="col-sm-2 control-label">* Permisos de acceso</label>
                <div class="col-sm-5">
				  <select class="chosen-select" name="perfilEncargado" data-placeholder="-- Seleccionar Permisos --" onchange="tampil_obat(this)" autocomplete="off" required>
          <option value="<?php echo $data['PerfilEncargado']; ?>"><?php echo $data['NombrePerfil']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdPerfil, NombrePerfil FROM perfiles ORDER BY IdPerfil ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdPerfil]\"> $data_obat[IdPerfil] | $data_obat[NombrePerfil] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=encargado" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php

}
?>