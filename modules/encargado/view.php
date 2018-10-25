<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Gestión de Encargado
    <a class="btn btn-success btn-social pull-right" href="?module=form_encargado&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>
</section>

<!-- Main content -->
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
              Dato Guarda Correctamen
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
           Dato Modificado Correctamente
            </div>";
    }	

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El Usuario ha sido activado correctamente.
            </div>";
    }
 
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             El Usuario se bloqueó con éxito.
            </div>";
    }
   
    elseif ($_GET['alert'] == 5) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
             Asegúrese de que el archivo que se sube es correcto.
            </div>";
    }

    elseif ($_GET['alert'] == 6) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
            Asegúrese de que la imagen no es más de 1 MB.
            </div>";
    }
 
    elseif ($_GET['alert'] == 7) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-times-circle'></i> Error!</h4>
             Asegúrese de que el tipo de archivo subido sea  *.JPG, *.JPEG, *.PNG.
            </div>";
    }
	
	elseif ($_GET['alert'] == 8) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Dato Eliminado Correctamente.
            </div>";
    }
	
	elseif ($_GET['alert'] == 9) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            No se Puede Eliminar el usuario Administrador.
            </div>";
    }
	
	elseif ($_GET['alert'] == 10) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El usuario ya se encuentra registrado.
            </div>";
    }
    elseif ($_GET['alert'] == 11) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            No se puede eliminar el registro ya que esta registrado en otra tabla.
            </div>";
    }
    elseif ($_GET['alert'] == 12) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El usuario ya existe.
            </div>";
    }
    ?>
	
	<script>
		window.onload=function()
		{
			var elemento=document.getElementById("canvas");
			elemento.onmouseover = function(e) {
 
				// El contenido de esta funcion se ejecutara cuanso el mouse
				// pase por encima del elemento
 
				document.getElementById("Eliminar").style.display = 'block';
			};
			elemento.onmouseout = function(e) {
 
				// El contenido de esta funcion se ejecutara cuanso el mouse
				// salga del elemento
 
				document.getElementById("Eliminar").style.display = 'block';
			};
		}
		</script>
	
      <div class="box box-success">
        <div class="box-body2">
		<div class="canvas">
		<a class="btn btn-success glyphicon pull-left" href="?module=printEncargado" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
     <br/>
     <br/>
	 <br/>
          <table id="dataTables" class="table table-bordered table-striped table-hover">
       
            <thead>
              <tr>
                <th class="center">Numero</th>
				<th class="center">Foto</th>
                <th class="center">Numero Documento</th>
                <th class="center">Nombre Encargado</th>
                <th class="center">Apellido Paterno</th>
				<th class="center">Apellido Materno</>
                <th class="center">Usuario</th>
				<th class="center">Permisos</th>
				<th class="center">Estado</th>
              </tr>
            </thead>


                        <tbody>
            <?php  
            $no = 1;
      
            $query = mysqli_query($mysqli, "SELECT n.NumeroDocumento, n.NombreEncargado, n.Apellido1Encargado, n.Apellido2Encargado, n.UsuarioEncargado, n.PerfilEncargado, n.status, n.Foto, pe.NombrePerfil FROM encargados n LEFT JOIN perfiles pe ON n.PerfilEncargado=pe.IdPerfil ORDER BY numeroDocumento ASC")
                                            or die('error: '.mysqli_error($mysqli));


            while ($data = mysqli_fetch_assoc($query)) { 
  
              echo "<tr>
                      <td width='50' class='center'>$no</td>";

                      if ($data['Foto']=="") { ?>
                        <td class='center'><img class='img-user' src='images/user/user-default.png' width='45'></td>
                      <?php
                      } else { ?>
                        <td class='center'><img class='img-user' src='images/user/<?php echo $data['Foto']; ?>' width='45'></td>
                      <?php
                      }

              echo "  <td>$data[NumeroDocumento]</td>
                      <td>$data[NombreEncargado]</td>
                      <td>$data[Apellido1Encargado]</td>
					  <td>$data[Apellido2Encargado]</td>
					  <td>$data[UsuarioEncargado]</td>
					  <td>$data[NombrePerfil]</td>
                      <td class='center'>$data[status]</td>

                      <td class='center' width='150'>
                          <div>";

                          if ($data['status']=='activo') { ?>
                            <a data-toggle="tooltip" data-placement="top" title="Bloqueado" style="margin-right:5px" class="btn btn-warning btn-sm" href="modules/encargado/proses.php?act=off&id=<?php echo $data['NumeroDocumento'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-off"></i>
                            </a>
            <?php
                          } 
                          else { ?>
                            <a data-toggle="tooltip" data-placement="top" title="activo" style="margin-right:5px" class="btn btn-success btn-sm" href="modules/encargado/proses.php?act=on&id=<?php echo $data['NumeroDocumento'];?>">
                                <i style="color:#fff" class="glyphicon glyphicon-ok"></i>
                            </a>
            <?php
                          }

              echo "      <a data-toggle='tooltip' data-placement='top' title='Modificar' class='btn btn-success btn-sm' href='?module=form_encargado&form=edit&id=$data[NumeroDocumento]'>
                                <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                            </a>
							
							
                          </div>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" id='oculto' title="Eliminar" class="btn btn-danger btn-sm" href="modules/encargado/proses.php?act=delete&id=<?php echo $data['NumeroDocumento'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'NombreEncargado']; ?>?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>					  
            <?php
              echo "    					  
						  
                      </td>					  
					  
                    </tr>";
					
					
              $no++;
            }
            ?>
			
			
            </tbody>
          </table>
		  </div><!-- /.canvas -->
        </div><!-- /.box-body -->
      </div><!-- /.box -->
	   
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content