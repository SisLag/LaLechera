 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Refrigeración
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=refrigeracion"> Refrigeración </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/refrigeracion/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdRefrigeracion,2) as IdRefrigeracion FROM refrigeraciones
                                                ORDER BY IdRefrigeracion DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idRefrigeracion = $data_id['IdRefrigeracion'] + 1;
              } else {
                $idRefrigeracion = 1;
              }


              $buat_id = str_pad($idRefrigeracion, 2, "0", STR_PAD_LEFT);
              $idRefrigeracion = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Refrigeracion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idRefrigeracion" value="<?php echo $idRefrigeracion; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechRefrigeracion" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Hora Am</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="horaAmRefrigeracion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Temperatura Am</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tempAmRefrigeracion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Hora Pm </label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="horaPmRefrigeracion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Temperatura Pm</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tempPmRefrigeracion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Encargado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="encargadoRefrigeracion" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT NumeroDocumento, NombreEncargado FROM encargados ORDER BY NumeroDocumento ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[NumeroDocumento]\"> $data_obat[NumeroDocumento] | $data_obat[NombreEncargado] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=refrigeracion" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT IdRefrigeracion,HoraAmRefrigeracion,TempAmRefrigeracion,HoraPmRefrigeracion,TempPmRefrigeracion FROM refrigeraciones WHERE IdRefrigeracion='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Refrigeracion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=refrigeracion"> Refrigeracion </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/refrigeracion/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Refrigeracion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idRefrigeracion" value="<?php echo $data['IdRefrigeracion']; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Hora Am</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="horaAmRefrigeracion" autocomplete="off" value="<?php echo $data['HoraAmRefrigeracion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Temperatura Am</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tempAmRefrigeracion" autocomplete="off" value="<?php echo $data['TempAmRefrigeracion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Hora Pm</label>
                <div class="col-sm-5">
                  <input type="time" class="form-control" name="horaPmRefrigeracion" autocomplete="off" value="<?php echo $data['HoraPmRefrigeracion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Temperatura Pm</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tempPmRefrigeracion" autocomplete="off" value="<?php echo $data['TempPmRefrigeracion']; ?>">
                </div>
              </div>
			  			  
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=refrigeracion" class="btn btn-default btn-reset">Cancelar</a>
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