 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Movimiento de Ganado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=movimientoGanado"> Movimiento de Ganado </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/movimientoGanado/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdMovGanado,2) as IdMovGanado FROM movimientosganados
                                                ORDER BY IdMovGanado DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idMovGanado = $data_id['IdMovGanado'] + 1;
              } else {
                $idMovGanado = 1;
              }


              $buat_id = str_pad($idMovGanado, 2, "0", STR_PAD_LEFT);
              $idMovGanado = "MO$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Movimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idMovGanado" value="<?php echo $idMovGanado; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechMovGanado" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Animal</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="animMovGanado" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Transacción</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="transMonvGanado" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <option value="Entrada">Entrada</option>
					<option value="Salida">Salida</option>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Valor Movimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="valorMGanado" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observMovGanado" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Guia Movilización</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="guiaMovilizMovGanado" autocomplete="off">
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

    $query = mysqli_query($mysqli, "SELECT mo.IdMovGanado,mo.ObservMovGanado,mo.GuiaMovilizMovGanado FROM movimientosganados mo LEFT JOIN perfiles p ON en.PerfilEncargado=p.IdPerfil WHERE IdMovGanado='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Movimiento Ganado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=movimientoGanado"> Movimiento Ganado </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/movimientoGanado/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Movimiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idMovGanado" value="<?php echo $data['IdMovGanado']; ?>" readonly required>
                </div>
              </div>
              			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observMovGanado" autocomplete="off" value="<?php echo $data['ObservMovGanado']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Guia Movilizacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="guiaMovilizMovGanado" autocomplete="off" value="<?php echo $data['GuiaMovilizMovGanado']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=movimientoGanado" class="btn btn-default btn-reset">Cancelar</a>
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