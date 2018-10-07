
<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Registro Animal

    <a class="btn btn-success btn-social pull-right" href="?module=form_registroAnimal&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Agregar
    </a>
  </h1>

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
            Dato Guarda Correctamen
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Dato Modificado Correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Dato Eliminado Correctamente
            </div>";
    }

    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-danger alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            No se puede eliminar el registro ya que esta registrado en otra tabla.
            </div>";
    }
    ?>

      <div class="box box-success">
        <div class="box-body2">
		<a class="btn btn-success glyphicon pull-left" href="?module=printRegistroAnimal" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Nro</th>
                <th class="center">Chapeta Animal</th>
                <th class="center">Nombre Animal</th>
                <th class="center">Fecha Nacimiento Animal</th>
				<th class="center">Raza Animal</th>
				<th class="center">Tipo Animal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,ra.NombreAnimal,ra.FechNacimAnimal,r.NombreRaza,ta.NombreTipoAnimal FROM  registrosanimeles ra LEFT JOIN razas r ON ra.RazaAnimal=r.IdRaza
                                            LEFT JOIN tiposanimales ta ON ra.TipoAnimal=ta.IdTipoAnimal ORDER BY ChapetaAnimal ASC")
                                            or die('error: '.mysqli_error($mysqli));
                                                                            
            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[ChapetaAnimal]</td>
                      <td width='80'>$data[NombreAnimal]</td>
                      <td width='80' align='right'>$data[FechNacimAnimal]</td>
					  <td width='80' align='right'>$data[NombreRaza]</td>
					  <td width='80' align='right'>$data[NombreTipoAnimal]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_registroAnimal&form=edit&id=$data[ChapetaAnimal]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/registroAnimal/proses.php?act=delete&id=<?php echo $data['ChapetaAnimal'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'NombreAnimal']; ?>?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content