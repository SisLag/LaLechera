 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Producto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=producto"> Producto </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/producto/proses.php?act=insert" method="POST">
            <div class="box-body">
              

              <div class="form-group">
                <label class="col-sm-2 control-label">* Registro Ica</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="regIcaProd" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreProd" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Tipo Producto</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tipoProd" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
					<?php
    $query_obat = mysqli_query($mysqli, "SELECT IdTProducto, NombreTProducto FROM tiposproductos ORDER BY IdTProducto ASC")
      or die('error ' . mysqli_error($mysqli));
    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
      echo "<option value=\"$data_obat[IdTProducto]\"> $data_obat[IdTProducto] | $data_obat[NombreTProducto] </option>";
    }
    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Unidad</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="unidadProd" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <option value="CM">cm</option>
                  </select>
                </div>
              </div>
			  			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">* Número Lote</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nroLoteProd" autocomplete="off">
                </div>
              </div>
			  			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Encargado</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="encargadoProd" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
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
                  <input type="text" class="form-control" name="descProd" autocomplete="off">
                </div>
              </div>	

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=producto" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT RegIcaProd,>NombreProd,DescProd FROM registrosproductos WHERE RegIcaProd='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Producto
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=producto"> Producto </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/producto/proses.php?act=update" method="POST">
            <div class="box-body">
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Registro Ica</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="regIcaProd" value="<?php echo $data['RegIcaProd']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreProd" autocomplete="off" value="<?php echo $data['NombreProd']; ?>" required>
                </div>
              </div>
			  			  			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descProd" autocomplete="off" value="<?php echo $data['DescProd']; ?>" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=producto" class="btn btn-default btn-reset">Cancelar</a>
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