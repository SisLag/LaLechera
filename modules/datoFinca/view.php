<?php  
          
          $query = mysqli_query($mysqli, "SELECT df.NombreFinca,df.MunicipioFinca,df.VeredaFinca,df.BarrioFinca,df.NombrePropietFinca,df.TelFinca1,df.NombreAdminFinca,
          df.TelFinca12,df.AreaTotalFinca,df.AreaPastosFinca,df.AreaLecheriaFinca,df.AreaLevanteFinca,m.NombreMunicipio,v.NombreVereda,b.NombreBarrio FROM datosfincas df LEFT JOIN municipios m ON df.MunicipioFinca=m.IdMunicipio
                                             LEFT JOIN veredas v ON df.VeredaFinca=v.IdVereda
                                             LEFT JOIN barrios b ON df.BarrioFinca=b.IdBarrio")
                                            or die('error '.mysqli_error($mysqli));

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


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
  
    if (empty($_GET['alert'])) {
      echo "";
    } 
 
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Dato Modificado Correctamente
            </div>";
    }
    ?>

      <div class="box box-success">  	
        <!-- form start -->
        <form role="form" class="form-horizontal" method="POST" action="?module=form_datoFinca" enctype="multipart/form-data">
          <div class="box-body3">
    <br/>
    <br/>
		  <div class="form-group">
                <label class="col-sm-2 control-label">Nombre:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['NombreFinca']; ?></label> 
              </div>

               <div class="form-group">  
                <label class="col-sm-2 control-label">Municipio:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['NombreMunicipio']; ?></label> 
              </div>
			  
			   <div class="form-group">  
                <label class="col-sm-2 control-label">Vereda:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['NombreVereda']; ?></label> 
              </div>
			  
			  <div class="form-group">  
                <label class="col-sm-2 control-label">Barrio:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['NombreBarrio']; ?></label> 
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Propietario:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['NombrePropietFinca']; ?></label> 
               </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Telefono Propietario:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['TelFinca1']; ?></label> 
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Nombre Administrador:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['NombreAdminFinca']; ?></label> 
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Telefono Administrador:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['TelFinca12']; ?></label> 
              </div>	  
			  			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area Pastos:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['AreaPastosFinca']; ?></label> 
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area Lecheria:</label>
                <label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['AreaLecheriaFinca']; ?></label> 
              </div>
			  
			  <div class="form-group">
                <label class="col-sm-2 control-label">Area Levante:</label>
				<label style="text-align:left" class="col-sm-8 control-label"><?php echo $data_id['AreaLevanteFinca']; ?></label>              				
              </div>
          </div><!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-submit" name="Modificar" value="Modificar">
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content