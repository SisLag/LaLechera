 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Hoja de Vida
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=hojaVida"> Hoja de Vida </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/hojaVida/proses.php?act=insert" method="POST">
            <div class="box-body">
              <?php 

              $query_id = mysqli_query($mysqli, "SELECT RIGHT(NroPotreroHV,2) as NroPotreroHV FROM hojasvida
                                                ORDER BY NroPotreroHV DESC LIMIT 1")
                or die('error ' . mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {

                $data_id = mysqli_fetch_assoc($query_id);
                $nroPotreroHV = $data_id['NroPotreroHV'] + 1;
              } else {
                $nroPotreroHV = 1;
              }


              $buat_id = str_pad($nroPotreroHV, 2, "0", STR_PAD_LEFT);
              $nroPotreroHV = "$buat_id";
              ?>
			  
			  <?php
    date_default_timezone_set('America/Bogota');
    $ahora = time();
    $formateado = date('Y-m-d', $ahora);
			  //'Y-m-d H:i:s'
    ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Número Potrero</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="NroPotreroHV" value="<?php echo $nroPotreroHV; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Lote</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="loteHV" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Area</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="areaHV" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Entrada Ganado</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechEntradaGanadoHV" autocomplete="off" value="<?php echo $formateado; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Salida Ganado</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechSalidaGanadoHV" autocomplete="off">
                </div>
              </div>	
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Dias Ocupación Potrero</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="diasOcupPotreroHV" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Dias Desocupación Potrero</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="diasDesocupPotreroHV" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Fecha Abono</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechAbonoHV" autocomplete="off" value="<?php echo $formateado; ?>">
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* AnimPTernera</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="medPTernera" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">* Cantidad Abono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cantAbonoHV" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Tiempo Carencia Abono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tiempoCarenAbonoHV" autocomplete="off">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Número Animales</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroAnimHV" autocomplete="off" readonly required>
                </div>
              </div>
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=hojaVida" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT NroPotreroHV,LoteHV,AreaHV,FechSalidaGanadoHV,FechAbonoHV,ProdAbonoHV,CantAbonoHV,TiempoCarenAbonoHV FROM hojasVida WHERE NroPotreroHV='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Hoja De Vida
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=hojaVida"> Hoja Vida </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/hojaVida/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Número Potrero</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroPotreroHV" value="<?php echo $data['NroPotreroHV']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Lote</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="loteHV" autocomplete="off" value="<?php echo $data['LoteHV']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="areaHV" autocomplete="off" value="<?php echo $data['AreaHV']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Fechs Salida Ganado</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechSalidaGanadoHV" autocomplete="off" value="<?php echo $data['FechSalidaGanadoHV']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Fecha Abono</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control" name="fechAbonoHV" autocomplete="off" value="<?php echo $data['FechAbonoHV']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Producto Abono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="prodAbonoHV" autocomplete="off" value="<?php echo $data['ProdAbonoHV']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Cantidad Abono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="cantAbonoHV" autocomplete="off" value="<?php echo $data['CantAbonoHV']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Tiempo Carencia Abono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tiempoCarenAbonoHV" autocomplete="off" value="<?php echo $data['TiempoCarenAbonoHV']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=hojaVida" class="btn btn-default btn-reset">Cancelar</a>
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