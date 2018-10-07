 <script src="assets/js/validarTexto.js"></script>


 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Registro Animal
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=registroAnimal"> Registro Animal </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/registroAnimal/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(ChapetaAnimal,2) as ChapetaAnimal FROM registrosanimeles
                                                ORDER BY ChapetaAnimal DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $chapetaAnimal = $data_id['ChapetaAnimal'] + 1;
              } else {
                $chapetaAnimal = 1;
              }


              $buat_id = str_pad($chapetaAnimal, 2, "0", STR_PAD_LEFT);
              $chapetaAnimal = "CH$buat_id";
              ?>
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Chapeta Animal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="chapetaAnimal" id="chapetaAnimal" value="<?php echo $chapetaAnimal; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreAnimal" id="nombreAnimal" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Nacimiento</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechNacimAnimal" id="fechNacimAnimal" value="<?php echo $formateado; ?>" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Madre</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="madreAnimal" id="madreAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Padre</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="padreAnimal" id="padreAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Raza</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="razaAnimal" id="razaAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdRaza, NombreRaza FROM razas ORDER BY IdRaza ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdRaza]\"> $data_obat[IdRaza] | $data_obat[NombreRaza] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>			  		  
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Tipo Animal</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tipoAnimal" id="tipoAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdTipoAnimal, NombreTipoAnimal FROM tiposanimales ORDER BY IdTipoAnimal ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdTipoAnimal]\"> $data_obat[IdTipoAnimal] | $data_obat[NombreTipoAnimal] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>

			<div class="form-group">  
                <label class="col-sm-2 control-label">* Servicio</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="servicioAnimal" id="servicioAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
					<option value="No">No</option>
					<option value="Si">Si</option>
                  </select>
                </div>
              </div>			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observAnimal" id="observAnimal" autocomplete="off">
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar" Onclick="validarAnimal()">
                  <a href="?module=registroAnimal" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,ra.NombreAnimal,ra.MadreAnimal,ra.PadreAnimal,ra.ServicioAnimal,ra.ObservAnimal,rm.NombreVacaMadre,rm.IdVacaMadre, rp.NombreToroPadre,rp.IdToroPadre FROM registrosanimeles ra LEFT JOIN registrosanimmadres rm ON ra.MadreAnimal=rm.IdVacaMadre
                                                                                                                                                                                                                                          LEFT JOIN registrosanimpadres rp ON ra.PadreAnimal=rp.IdToroPadre")
      or die('error ' . mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
  }


  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Registro Animal
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=registroAnimal"> Registro Animal </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/registroAnimal/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Chapeta Animal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="chapetaAnimal" value="<?php echo $data['ChapetaAnimal']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreAnimal" autocomplete="off" value="<?php echo $data['NombreAnimal']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Madre</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="madreAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['IdVacaMadre']; ?>"><?php echo $data['NombreVacaMadre']; ?></option>
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
                <label class="col-sm-2 control-label">Padre</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="padreAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['IdToroPadre']; ?>"><?php echo $data['NombreToroPadre']; ?></option>
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
                <label class="col-sm-2 control-label">Servicio</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="servicioAnimal" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data['ServicioAnimal']; ?>"><?php echo $data['ServicioAnimal']; ?></option>                    
					<option value="No">No</option>
					<option value="Si">Si</option>
                  </select>
                </div>
              </div>			  
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observAnimal" autocomplete="off" value="<?php echo $data['ObservAnimal']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=registroAnimal" class="btn btn-default btn-reset">Cancelar</a>
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