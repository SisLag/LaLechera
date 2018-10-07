<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 <script src="assets/js/validarTexto.js"></script>
 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Cuarentena
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=rezas"> Cuarentena </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/cuarentena/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdCuarentena,2) as IdCuarentena FROM cuarentenas
                                                ORDER BY IdCuarentena DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idCuarentena = $data_id['IdCuarentena'] + 1;
              } else {
                $idCuarentena = 1;
              }


              $buat_id = str_pad($idCuarentena, 2, "0", STR_PAD_LEFT);
              $idCuarentena = "$buat_id";
              ?>
			  
			  
			  
			  <?php 

    $query_id = mysqli_query($mysqli, "SELECT COUNT(*) NumAnimalCuarentena from cuarentenas;")
      or die('error ' . mysqli_error($mysqli));

    $count = mysqli_num_rows($query_id);

    if ($count <> 0) {

      $data_id = mysqli_fetch_assoc($query_id);
      $numAnimalCuarentena = $data_id['NumAnimalCuarentena'];
    } else {
      $numAnimalCuarentena = 0;
    }
    ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>			  

              <div class="form-group">
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Id Cuarentena</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="idCuarentena" value="<?php echo $idCuarentena; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">  
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Animal</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="animCuarentena" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT ChapetaAnimal, NombreAnimal FROM registrosanimeles ORDER BY ChapetaAnimal ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[ChapetaAnimal]\"> $data_obat[ChapetaAnimal] | $data_obat[NombreAnimal] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Fecha Ingreso</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechIngresoCuarentena" autocomplete="off" value="<?php echo $formateado; ?>" required  readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Fecha Salida</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechSalidaCuarentena" autocomplete="off">
                </div>
              </div>		  			  
			   			  
			  <div class="form-group">
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Motivo Ingreso</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="motivoIngresoCuarentena" id="motivoIngresoCuarentena" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Diagnostico Presuntivo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="diagPresuntCuarentena" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">  
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Desinfección</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="desinfCuarentena" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
					<option value="No">No</option>
					<option value="Si">Si</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Producto Desinfectante</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="prodDesinfecCuarentena" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT RegIcaProd, NombreProd FROM registrosproductos WHERE TipoProd = '2' ORDER BY RegIcaProd ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[RegIcaProd]\"> $data_obat[RegIcaProd] | $data_obat[NombreProd] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Número Animales</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="numAnimalCuarentena" value="<?php echo $numAnimalCuarentena; ?>" readonly required>
                </div>
              </div>				
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar" Onclick="validarTextoMotivoIngresoCuarentena()">
                  <a href="?module=cuarentena" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT cu.IdCuarentena,cu.FechSalidaCuarentena,cu.MotivoIngresoCuarentena,cu.DiagPresuntCuarentena,cu.DesinfCuarentena,cu.ProdDesinfecCuarentena, rp.NombreProd FROM cuarentenas cu LEFT JOIN registrosproductos rp ON cu.ProdDesinfecCuarentena=rp.RegIcaProd WHERE cu.IdCuarentena='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Raza
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=cuarentena"> Razas </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/cuarentena/proses.php?act=update" method="POST">
            <div class="box-body">
			
			
			<div class="form-group">
                <label class="col-sm-2 control-label">Id Cuarentena</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idCuarentena" value="<?php echo $data['IdCuarentena']; ?>" readonly required>
                </div>
              </div>  			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Salida</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechSalidaCuarentena" autocomplete="off" value="<?php echo $data['FechSalidaCuarentena']; ?>">
                </div>
              </div>		  			  
			   			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Motivo Ingreso</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="motivoIngresoCuarentena" autocomplete="off" value="<?php echo $data['MotivoIngresoCuarentena']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Diagnostico Presuntivo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="diagPresuntCuarentena" autocomplete="off" value="<?php echo $data['DiagPresuntCuarentena']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Desinfección</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="desinfCuarentena" data-placeholder="-- Seleccionar desinfección --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['DesinfCuarentena']; ?>"><?php echo $data['DesinfCuarentena']; ?></option>
                    <option value="No">No</option>
					<option value="Si">Si</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Producto Desinfectante</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="prodDesinfecCuarentena" data-placeholder="-- Seleccionar Producto Desinfección --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['ProdDesinfecCuarentena']; ?>"><?php echo $data['NombreProd']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT RegIcaProd, NombreProd FROM registrosproductos ORDER BY RegIcaProd ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[RegIcaProd]\"> $data_obat[RegIcaProd] | $data_obat[NombreProd] </option>";
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
                  <a href="?module=cuarentena" class="btn btn-default btn-reset">Cancelar</a>
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