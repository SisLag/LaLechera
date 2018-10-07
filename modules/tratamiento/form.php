 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Tratamiento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=tratamiento"> Tratamiento </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tratamiento/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdTratamiento,2) as IdTratamiento FROM tratamientos
                                                ORDER BY IdTratamiento DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $IdTratamiento = $data_id['IdTratamiento'] + 1;
              } else {
                $IdTratamiento = 1;
              }


              $buat_id = str_pad($IdTratamiento, 2, "0", STR_PAD_LEFT);
              $IdTratamiento = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Tratamiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idTratamiento" value="<?php echo $IdTratamiento; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreTratamiento" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Enfermedad</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="enfermedadTratamiento" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechTratamiento" autocomplete="off" value="<?php echo $formateado; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Tiempo Retiro</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tiempoRetTratamiento" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Medicamento</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="medTratamiento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Laboratorio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="labTratamiento" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Lote</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="loteTratamiento" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Dosis</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="dosisTratamiento" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Via Aplicación</label>
                <div class="col-sm-5">
                <select class="chosen-select" name="viaAplicTratamiento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                  <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdVAplicacion, NombVAplicacion FROM viaaplicacion ORDER BY IdVAplicacion ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdVAplicacion]\"> $data_obat[IdVAplicacion] | $data_obat[NombVAplicacion] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Encargado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="encargadoTratamiento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observTratamiento" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=tratamiento" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT tr.IdTratamiento,tr.NombreTratamiento,tr.EnfermedadTratamiento,tr.TiempoRetTratamiento,tr.LabTratamiento,tr.ViaAplicTratamiento,tr.ObservTratamiento,va.NombVAplicacion FROM tratamientos tr LEFT JOIN viaaplicacion va ON tr.ViaAplicTratamiento=va.IdVAplicacion WHERE tr.IdTratamiento='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Tratamiento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=tratamiento"> Tratamiento </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/tratamiento/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Tratamiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idTratamiento" value="<?php echo $data['IdTratamiento']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreTratamiento" autocomplete="off" value="<?php echo $data['NombreTratamiento']; ?>" required>
                </div>
              </div>			  		  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">EnfermedadTratamiento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="enfermedadTratamiento" autocomplete="off" value="<?php echo $data['EnfermedadTratamiento']; ?>">
                </div>
              </div>			  			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Tiempo Retiro</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="tiempoRetTratamiento" autocomplete="off" value="<?php echo $data['TiempoRetTratamiento']; ?>">
                </div>
              </div>			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Laboratorio</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="labTratamiento" autocomplete="off" value="<?php echo $data['LabTratamiento']; ?>">
                </div>
              </div>  

              <div class="form-group">  
                <label class="col-sm-2 control-label">Via Aplicacion Tratamiento</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="viaAplicTratamiento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['viaAplicTratamiento']; ?>"><?php echo $data['NombVAplicacion']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdVAplicacion, NombVAplicacion FROM viaaplicacion ORDER BY IdVAplicacion ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdVAplicacion]\"> $data_obat[IdVAplicacion] | $data_obat[NombVAplicacion] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observTratamiento" autocomplete="off" value="<?php echo $data['ObservTratamiento']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=tratamiento" class="btn btn-default btn-reset">Cancelar</a>
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