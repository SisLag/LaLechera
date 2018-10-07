 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Producción Vaca
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=produccionVaca"> Producción Vaca </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/produccionVaca/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdProdVaca,2) as IdProdVaca FROM produccionesvacas
                                                ORDER BY IdProdVaca DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idProdVaca = $data_id['IdProdVaca'] + 1;
              } else {
                $idProdVaca = 1;
              }


              $buat_id = str_pad($idProdVaca, 2, "0", STR_PAD_LEFT);
              $idProdVaca = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Producción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idProdVaca" value="<?php echo $idProdVaca; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Vaca Producción</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="vacaProd" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdVacaMadre, NombreVacaMadre FROM registrosanimmadres ORDER BY IdVacaMadre ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdVacaMadre]\"> $data_obat[IdVacaMadre] | $data_obat[NombreVacaMadre] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Producción</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechProdVaca" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Litros Am</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="jtsAmProdVaca" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Litros Pm</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="ltspmProdVaca" autocomplete="off">
                </div>
              </div>	
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Total Litros</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="totalLtsProdVaca" autocomplete="off" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Concentrado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="concentrProdVaca" autocomplete="off">
                </div>
              </div>

			  <div class="form-group">
                <label class="col-sm-2 control-label">* Condicion Corporal Vaca</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="condiccCorpVacaProdVaca" autocomplete="off">
                </div>
              </div>

			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observProdVaca" autocomplete="off">
                </div>
              </div> 	

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=produccionVaca" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT IdProdVaca,LtsAmProdVaca,LtspmProdVaca,TotalLtsProdVaca,ConcentrProdVaca,CondiccCorpVacaProdVaca,ObservProdVaca FROM produccionesvacas WHERE IdProdVaca='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Produccion Vaca
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=produccionVaca"> Produccion Vaca </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/produccionVaca/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Produción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idProdVaca" value="<?php echo $data['IdProdVaca']; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Litros Am</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="jtsAmProdVaca" autocomplete="off" value="<?php echo $data['LtsAmProdVaca']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Litros Pm</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ltspmProdVaca" autocomplete="off" value="<?php echo $data['LtspmProdVaca']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Total Litros</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="totalLtsProdVaca" autocomplete="off" value="<?php echo $data['TotalLtsProdVaca']; ?>">
                </div>
              </div>	
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Concentrado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="concentrProdVaca" autocomplete="off" value="<?php echo $data['ConcentrProdVaca']; ?>">
                </div>
              </div>

			  <div class="form-group">
                <label class="col-sm-2 control-label">Condición Corporal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="condiccCorpVacaProdVaca" autocomplete="off" value="<?php echo $data['CondiccCorpVacaProdVaca']; ?>">
                </div>
              </div>

			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observProdVaca" autocomplete="off" value="<?php echo $data['ObservProdVaca']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=produccionVaca" class="btn btn-default btn-reset">Cancelar</a>
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