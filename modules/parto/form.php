 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Parto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=parto"> Parto </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/parto/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdParto,2) as IdParto FROM partos
                                                ORDER BY IdParto DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idParto = $data_id['IdParto'] + 1;
              } else {
                $idParto = 1;
              }


              $buat_id = str_pad($idParto, 2, "0", STR_PAD_LEFT);
              $idParto = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Parto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idParto" value="<?php echo $idParto; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechParto" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Vaca</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="vacaParto" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Toro</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="toroParto" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Aborto</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="abortoParto" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <option value="No">No</option>
					<option value="Si">Si</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Nombre Cria</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreCriaParto" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Sexo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="sexoCriaParto" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdSexo, NombreSexo FROM sexos ORDER BY IdSexo ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdSexo]\"> $data_obat[IdSexo] | $data_obat[NombreSexo] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observParto" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=razas" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT pa.IdParto,pa.AbortoParto,pa.NombreCriaParto,pa.SexoCriaParto,pa.ObservParto, sx.NombreSexo FROM partos pa LEFT JOIN sexos sx ON pa.SexoCriaParto=sx.IdSexo WHERE pa.IdParto='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Parto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=parto"> Parto </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/parto/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Parto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idParto" value="<?php echo $data['IdParto']; ?>" readonly required>
                </div>
              </div>
              			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Aborto</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="abortoParto" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="No">No</option>
					<option value="Si">Si</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Cria</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreCriaParto" autocomplete="off" value="<?php echo $data['NombreCriaParto']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Sexo Cria</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="sexoCriaParto" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['SexoCriaParto']; ?>"><?php echo $data['NombreSexo']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdSexo, NombreSexo FROM sexos ORDER BY IdSexo ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdSexo]\"> $data_obat[IdSexo] | $data_obat[NombreSexo] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observParto" autocomplete="off" value="<?php echo $data['ObservParto']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=parto" class="btn btn-default btn-reset">Cancelar</a>
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