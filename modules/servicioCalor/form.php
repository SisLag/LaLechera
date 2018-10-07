 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Servicio y Calor
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=servicioCalor"> Servicios y Calores </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/servicioCalor/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdSCalores,2) as IdSCalores FROM servicioscalores
                                                ORDER BY IdSCalores DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idSCalores = $data_id['IdSCalores'] + 1;
              } else {
                $idSCalores = 1;
              }


              $buat_id = str_pad($idSCalores, 2, "0", STR_PAD_LEFT);
              $idSCalores = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Servicio Calores</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idSCalores" value="<?php echo $idSCalores; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Vaca</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="vacaSCalores" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT ChapetaAnimal, NombreAnimal FROM registrosanimeles WHERE TipoAnimal = '1' ORDER BY ChapetaAnimal ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[ChapetaAnimal]\"> $data_obat[ChapetaAnimal] | $data_obat[NombreAnimal] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechSCalores" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Toro Servicio Calores</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="toroSCalores" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdToroPadre, NombreToroPadre FROM registrosanimpadres ORDER BY IdToroPadre ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdToroPadre]\"> $data_obat[IdToroPadre] | $data_obat[NombreToroPadre] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Modo Inseminacion</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="modoInseminacion" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
					<option value="IA">IA | Inseminacion Artificial</option>
                    <option value="MN">MN | Monta Natural</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Número Servicio Calores</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="nroSCalores" autocomplete="off" readonly required>
                </div>
              </div>
			  			    
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Observaciones Servicio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observSCalores" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=servicioCalor" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT IdSCalores,ModoInseminacion,ObservSCalores FROM servicioscalores WHERE IdSCalores='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Servicio Calor
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=razas"> Razas </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/servicioCalor/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Servicio y Calor</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idSCalores" value="<?php echo $data['IdSCalores']; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Modo Inseminación</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="modoInseminacion" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['ModoInseminacion']; ?>"><?php echo $data['ModoInseminacion']; ?></option>
                    <option value="IA"> IA | Inseminacion Artificial </option>
                    <option value="MN"> MN | Monta Natural</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observSCalores" autocomplete="off" value="<?php echo $data['ObservSCalores']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=servicioCalor" class="btn btn-default btn-reset">Cancelar</a>
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