 <?php 

if ($_GET['form'] == 'add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Medicamento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=medicamento"> Medicamento </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/medicamento/proses.php?act=insert" method="POST">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">* Id RegIca</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idRegIcaMedicamento" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">* Nombre Medicamento</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreMedicamento" autocomplete="off" required>
                </div>
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">* Tipo</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="tipoMedicamento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdMedicamento, NombreMedicamento FROM tiposmedicamentos ORDER BY IdMedicamento ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[IdMedicamento]\"> $data_obat[IdMedicamento] | $data_obat[NombreMedicamento] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>	

			<div class="form-group">  
                <label class="col-sm-2 control-label">* Unidad de Medida</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="unidadMedicamento" data-placeholder="-- Seleccionar Uno --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value=""></option>
                    <option value="cm">cm</option>
					<option value="dosis">dosis</option>
					<option value="gramo">gramo</option>
                  </select>
                </div>
              </div>

			<div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descMedicamento" autocomplete="off" >
                </div>
              </div>			  
              
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=medicamento" class="btn btn-default btn-reset">Cancelar</a>
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

    $query = mysqli_query($mysqli, "SELECT IdRegIcaMedicamento,NombreMedicamento,DescMedicamento FROM registrosmedicamentos WHERE IdRegIcaMedicamento='$_GET[id]'")
      or die('error: ' . mysqli_error($mysqli));
    $data = mysqli_fetch_assoc($query);
  }
  ?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Medicamento
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=medicamento"> Medicamento </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/medicamento/proses.php?act=update" method="POST">
            <div class="box-body">
              
               <div class="form-group">
                <label class="col-sm-2 control-label">Id Registro Ica</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="idRegIcaMedicamento" autocomplete="off" value="<?php echo $data['IdRegIcaMedicamento']; ?>" required readonly>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreMedicamento" autocomplete="off" value="<?php echo $data['NombreMedicamento']; ?>" required>
                </div>
              </div>			  

			<div class="form-group">
                <label class="col-sm-2 control-label">Descripción</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="descMedicamento" autocomplete="off" value="<?php echo $data['DescMedicamento']; ?>" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=medicamento" class="btn btn-default btn-reset">Cancelar</a>
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