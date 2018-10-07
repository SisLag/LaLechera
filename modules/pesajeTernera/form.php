 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Pesaje Cria
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=pesajeTernera"> Pesaje Cria </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pesajeTernera/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdPTernera,2) as IdPTernera FROM pesajesterneras
                                                ORDER BY IdPTernera DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idPTernera = $data_id['IdPTernera'] + 1;
              } else {
                $idPTernera = 1;
              }


              $buat_id = str_pad($idPTernera, 2, "0", STR_PAD_LEFT);
              $idPTernera = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Peaje Ternera</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idPTernera" value="<?php echo $idPTernera; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechPTernera" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Animal</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="animPTernera" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT ChapetaAnimal, NombreAnimal FROM registrosanimeles WHERE TipoAnimal = '2' ORDER BY ChapetaAnimal ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[ChapetaAnimal]\"> $data_obat[ChapetaAnimal] | $data_obat[NombreAnimal] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Peso</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pesoPTernera" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Alzada</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alzadaPTernera" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Medicamento</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="medPTernera" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdRegIcaMedicamento, NombreMedicamento FROM registrosmedicamentos ORDER BY IdRegIcaMedicamento ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdRegIcaMedicamento]\"> $data_obat[IdRegIcaMedicamento] | $data_obat[NombreMedicamento] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Cantidad Medicamento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cantMedPTernera" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observPTernera" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=pesajeTernera" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT IdPTernera,PesoPTernera,AlzadaPTernera,MedPTernera,CantMedPTernera,ObservPTernera FROM pesajesterneras WHERE IdPTernera='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Pesaje Ternera
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=pesajeTernera"> Pesaje Terneta </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pesajeTernera/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Pesaje Ternera</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idPTernera" value="<?php echo $data['IdPTernera']; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Peso</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="pesoPTernera" autocomplete="off" value="<?php echo $data['PesoPTernera']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Alzada</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="alzadaPTernera" autocomplete="off" value="<?php echo $data['AlzadaPTernera']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Medida</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="medPTernera" autocomplete="off" value="<?php echo $data['MedPTernera']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Cantidad Medicamento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cantMedPTernera" autocomplete="off" value="<?php echo $data['CantMedPTernera']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observPTernera" autocomplete="off" value="<?php echo $data['ObservPTernera']; ?>">
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

}
?>