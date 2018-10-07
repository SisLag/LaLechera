 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Secado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=secado"> Secado </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/secado/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdSecado,2) as IdSecado FROM secados 
                                                ORDER BY IdSecado DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idSecado = $data_id['IdSecado'] + 1;
              } else {
                $idSecado = 1;
              }


              $buat_id = str_pad($idSecado, 2, "0", STR_PAD_LEFT);
              $idSecado = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Secado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idSecado" value="<?php echo $idSecado; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Vaca</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="vacaSecado" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                  <input type="date" class="form-control" name="fechSecado" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Real</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="realSecado" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Tratamiento</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tratamVacaSecado" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    /////////////////////////////////////////////////////////////
                    $sql = "SELECT COUNT(*) as total FROM tratamientos";
                    $resultado = mysql_query($sql);
                    if ((mysql_result($resultado, 0, "total") > 0)) {
                      header("location: ../../main.php?module=secado&alert=4");
                    } else {  
                    /////////////////////////////////////////////////////////////
                      $query_obat = mysqli_query($mysqli, "SELECT IdTratamiento, NombreTratamiento FROM tratamientos ORDER BY IdTratamiento ASC")
                        or die('error ' . mysqli_error($mysqli));
                      while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                        echo "<option value=\"$data_obat[IdTratamiento]\"> $data_obat[IdTratamiento] | $data_obat[NombreTratamiento] </option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Vermifugo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="vermiSecado" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT RegIcaProd, NombreProd FROM registrosproductos WHERE TipoProd = '3' ORDER BY RegIcaProd ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[RegIcaProd]\"> $data_obat[RegIcaProd] | $data_obat[NombreProd] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Otras PracTicas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="otrasPracTSecado" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=secado" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT se.IdSecado,se.RealSecado,se.TratamVacaSecado,se.OtrasPracTSecado,tr.NombreTratamiento FROM secados se LEFT JOIN tratamientos tr ON se.TratamVacaSecado=tr.IdTratamiento WHERE se.IdSecado='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Secado
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=secado"> Secado </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/secado/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Secado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idSecado" value="<?php echo $data['IdSecado']; ?>" readonly required>
                </div>
              </div>			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Real Secado</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="realSecado" autocomplete="off" value="<?php echo $data['RealSecado']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Tratamiento</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tratamVacaSecado" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['TratamVacaSecado']; ?>"><?php echo $data['NombreTratamiento']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdTratamiento, NombreTratamiento FROM tratamientos ORDER BY IdTratamiento ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdTratamiento]\"> $data_obat[IdTratamiento] | $data_obat[NombreTratamiento] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Otras Practicas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="otrasPracTSecado" autocomplete="off" value="<?php echo $data['OtrasPracTSecado']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=secado" class="btn btn-default btn-reset">Cancelar</a>
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