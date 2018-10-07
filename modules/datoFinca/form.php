
<?php 

$query = mysqli_query($mysqli, "SELECT df.NombreFinca,df.MunicipioFinca,df.VeredaFinca,df.BarrioFinca,df.NombrePropietFinca,df.TelFinca1,df.NombreAdminFinca,
          df.TelFinca12,df.AreaTotalFinca,df.AreaPastosFinca,df.AreaLecheriaFinca,df.AreaLevanteFinca,m.NombreMunicipio,m.IdMunicipio,v.NombreVereda,v.IdVereda,b.NombreBarrio,b.IdBarrio FROM datosfincas df LEFT JOIN municipios m ON df.MunicipioFinca=m.IdMunicipio
                                             LEFT JOIN veredas v ON df.VeredaFinca=v.IdVereda
                                             LEFT JOIN barrios b ON df.BarrioFinca=b.IdBarrio")
  or die('error ' . mysqli_error($mysqli));

$data_id = mysqli_fetch_assoc($query);

?>         


   <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Modificar Datos Finca
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=datoFinca"> Datos Finca </a></li>
      <li class="active"> Modificar </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/datoFinca/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
              <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreFinca" autocomplete="off" value="<?php echo $data_id['NombreFinca']; ?>" required readonly>
                </div>
              </div>

               <div class="form-group">  
               <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Municipio</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="municipioFinca" data-placeholder="-- Seleccionar Permisos --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data_id['IdMunicipio']; ?>"><?php echo $data_id['NombreMunicipio']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdMunicipio, NombreMunicipio FROM municipios ORDER BY IdMunicipio ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[MunicipioFinca]\"> $data_obat[IdMunicipio] | $data_obat[NombreMunicipio] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			   <div class="form-group">  
         <h2 class="col-sm-2 control-label">*</h2> <label class="col-sm-2 control-label">Vereda</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="veredaFinca" data-placeholder="-- Seleccionar Permisos --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data_id['IdVereda']; ?>"><?php echo $data_id['NombreVereda']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdVereda, NombreVereda FROM veredas ORDER BY IdVereda ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[VeredaFinca]\"> $data_obat[IdVereda] | $data_obat[NombreVereda] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">  
        <h2 class="col-sm-2 control-label"> </h2><label class="col-sm-2 control-label">Barrio</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="barrioFinca" data-placeholder="-- Seleccionar Permisos --" onchange="tampil_obat(this)" autocomplete="off" required>
                    <option value="<?php echo $data_id['IdBarrio']; ?>"><?php echo $data_id['NombreBarrio']; ?></option>
                    <?php
                    $query_obat = mysqli_query($mysqli, "SELECT IdBarrio, NombreBarrio FROM barrios ORDER BY IdBarrio ASC")
                      or die('error ' . mysqli_error($mysqli));
                    while ($data_obat = mysqli_fetch_assoc($query_obat)) {
                      echo "<option value=\"$data_obat[BarrioFinca]\"> $data_obat[IdBarrio] | $data_obat[NombreBarrio] </option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Nombre Propietario</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombrePropietFinca" autocomplete="off" value="<?php echo $data_id['NombrePropietFinca']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label"> </h2><label class="col-sm-2 control-label">Telefono Propietario</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telFinca1" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_id['TelFinca1']; ?>">
                </div>
              </div>
            
			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Nombre Administrador</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombreAdminFinca" autocomplete="off" value="<?php echo $data_id['NombreAdminFinca']; ?>">
                </div>
              </div>
			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label"> </h2><label class="col-sm-2 control-label">Telefono Administrador</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telFinca2" autocomplete="off" maxlength="13" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data_id['TelFinca12']; ?>">
                </div>
				
              </div>	  
			  			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Area Pastos</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="areaPastosFinca" autocomplete="off" value="<?php echo $data_id['AreaPastosFinca']; ?>">
                </div>
				
              </div>
			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Area Lecheria</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="areaLecheriaFinca" autocomplete="off" value="<?php echo $data_id['AreaLecheriaFinca']; ?>">
                </div>
				
              </div>
			  
			  <div class="form-group">
        <h2 class="col-sm-2 control-label">*</h2><label class="col-sm-2 control-label">Area Levante</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="areaLevanteFinca" autocomplete="off" value="<?php echo $data_id['AreaLevanteFinca']; ?>">
                </div>
				
              </div>
            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-success btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=datoFinca" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->