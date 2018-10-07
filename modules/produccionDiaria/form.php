 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Producción Diaria
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=produccionDiaria"> Producción Diaria </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/produccionDiaria/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdPDiaria,2) as IdPDiaria FROM produccionesdiarias
                                                ORDER BY IdPDiaria DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idPDiaria = $data_id['IdPDiaria'] + 1;
              } else {
                $idPDiaria = 1;
              }


              $buat_id = str_pad($idPDiaria, 2, "0", STR_PAD_LEFT);
              $idPDiaria = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Producción Diaria</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idPDiaria" value="<?php echo $idPDiaria; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechProdDiaria" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Litros Planta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="plantaProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Litros Cria</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="criaProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Litros Otros</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="otrosProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Total Producción Día</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="totalDiaProdDiaria" autocomplete="off" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Número Vacas en Ordeño</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroVacasOrdenoProdDiaria" autocomplete="off" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Promedio Litros Leche</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="promLtsProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Total Concentrado Am</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="totalConcentAmProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Total Concentrado Pm</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="totalConcentPmProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Promedio Concentrado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="promConcentProdDiaria" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Relación Leche Concentrado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="relacLecheConcentProdDiaria" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=produccionDiaria" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT IdPDiaria,PromLtsProdDiaria,TotalConcentAmProdDiaria,TotalConcentPmProdDiaria,PromConcentProdDiaria,RelacLecheConcentProdDiaria FROM produccionesdiarias WHERE IdPDiaria='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Produccion Diaria
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=produccionDiaria"> Produccion Diaria </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/produccionDiaria/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Produción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idPDiaria" value="<?php echo $data['IdPDiaria']; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Promedio Litros</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="promLtsProdDiaria" autocomplete="off" value="<?php echo $data['PromLtsProdDiaria']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Total Concentrado Am</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="totalConcentAmProdDiaria" autocomplete="off" value="<?php echo $data['TotalConcentAmProdDiaria']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Total Concentrado Pm</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="totalConcentPmProdDiaria" autocomplete="off" value="<?php echo $data['TotalConcentPmProdDiaria']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Promedio Concentrado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="promConcentProdDiaria" autocomplete="off" value="<?php echo $data['PromConcentProdDiaria']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Relación Leche Concentrado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="relacLecheConcentProdDiaria" autocomplete="off" value="<?php echo $data['RelacLecheConcentProdDiaria']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=produccionDiaria" class="btn btn-default btn-reset">Cancelar</a>
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