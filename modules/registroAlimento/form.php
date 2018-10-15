 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Registro Alimento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=registroAlimento"> Registro Alimento </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/registroAlimento/proses.php?act=insert" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">* Registro Ica</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="regIcaAlimento" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreAlimento" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Tipo Alimento</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tipoAlimento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
					<?php
    $query_obat = mysqli_query($mysqli, "SELECT IdTAlimento, NombreTAlimento FROM tiposalimentos ORDER BY IdTAlimento ASC")
      or die('error ' . mysqli_error($mysqli));
    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
      echo "<option value=\"$data_obat[IdTAlimento]\"> $data_obat[IdTAlimento] | $data_obat[NombreTAlimento] </option>";
    }
    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Unidad</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="unidadAlimento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <option value="CM">cm</option>
                  </select>
                </div>
              </div>
			  			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Número Lote</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroLoteAlimento" autocomplete="off">
                </div>
              </div>
			  			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Encargado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="encargadoAlimento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descAlimento" autocomplete="off">
                </div>
              </div>			  
              

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=registroAlimento" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT RegIcaAlimento,NombreAlimento,DescAlimento FROM registrosAlimentos WHERE RegIcaAlimento='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Alimento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=alimento"> Alimento </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/registroAlimento/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Registro Ica</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="regIcaAlimento" value="<?php echo $data['RegIcaAlimento']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreAlimento" autocomplete="off" value="<?php echo $data['NombreAlimento']; ?>" required>
                </div>
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descAlimento" autocomplete="off" value="<?php echo $data['DescAlimento']; ?>">
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=registroAlimento" class="btn btn-default btn-reset">Cancelar</a>
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