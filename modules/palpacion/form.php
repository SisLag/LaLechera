 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Palpacion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=palpacion"> Palpacion </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/palpacion/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(IdPalpacion,2) as IdPalpacion FROM registrospalpaciones
                                                ORDER BY IdPalpacion DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $idPalpacion = $data_id['IdPalpacion'] + 1;
              } else {
                $idPalpacion = 1;
              }


              $buat_id = str_pad($idPalpacion, 2, "0", STR_PAD_LEFT);
              $idPalpacion = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id Palpación</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idPalpacion" value="<?php echo $idPalpacion; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechPalpacion" autocomplete="off" value="<?php echo $formateado; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Vaca</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="vacaPalpacion" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Fecha Ultimo Parto</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechUltimPartoPalpacion" autocomplete="off" required readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Dias en Leche</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="diasLechePalpacion" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Ultimo Servicio</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechUltimServicPalpacion" autocomplete="off" required readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Dias Servida</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="diasServidaPalpacion" autocomplete="off" required readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Ultima Palpación</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechUltimPalpacion" autocomplete="off" required readonly>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Hallazgos Palpación</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="hallazgosPalpacion" autocomplete="off">
                </div>
              </div>
			  
			   <div class="form-group">
                <label class="col-sm-2 control-label">* Estado</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="estadoPalpacion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Estructuras Ovaricas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="estrucOvaricasPalpacion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Rechequeo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cCRechequeoPalpacion" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observPalpacion" autocomplete="off">
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

    $query = mysqli_query($mysqli, "SELECT rp.IdPalpacion,rp.DiasLechePalpacion,rp.FechUltimServicPalpacion,rp.DiasServidaPalpacion,rp.FechUltimPalpacion,rp.HallazgosPalpacion,rp.EstadoPalpacion,rp.EstrucOvaricasPalpacion,rp.CCRechequeoPalpacion,rp.ObservPalpacion FROM registrospalpaciones rp LEFT JOIN perfiles p ON en.PerfilEncargado=p.IdPerfil WHERE rp.IdPalpacion='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Palpacion
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=palpalcion"> Palpacion </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/palpacion/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Id Palpacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idPalpacion" value="<?php echo $data['IdPalpacion']; ?>" readonly required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Dias en Leche</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="diasLechePalpacion" autocomplete="off" value="<?php echo $data['DiasLechePalpacion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Ultimo Servicio</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechUltimServicPalpacion" autocomplete="off" value="<?php echo $data['FechUltimServicPalpacion']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Dias Servida</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="diasServidaPalpacion" autocomplete="off" value="<?php echo $data['DiasServidaPalpacion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Ultima Palpación</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechUltimPalpacion" autocomplete="off" value="<?php echo $data['FechUltimPalpacion']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Hallazgos</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="hallazgosPalpacion" autocomplete="off" value="<?php echo $data['HallazgosPalpacion']; ?>">
                </div>
              </div>
			  
			   <div class="form-group">
                <label class="col-sm-2 control-label">Estado Palpacion</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="estadoPalpacion" autocomplete="off" value="<?php echo $data['EstadoPalpacion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Estructuras Ovaricas</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="estrucOvaricasPalpacion" autocomplete="off" value="<?php echo $data['EstrucOvaricasPalpacion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Rechequeo</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cCRechequeoPalpacion" autocomplete="off" value="<?php echo $data['CCRechequeoPalpacion']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Observaciones</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="observPalpacion" autocomplete="off" value="<?php echo $data['ObservPalpacion']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=palpacion" class="btn btn-default btn-reset">Cancelar</a>
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