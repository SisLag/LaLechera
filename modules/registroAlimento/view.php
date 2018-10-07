	<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Alimento

    <a class="btn btn-success btn-social pull-right" href="?module=form_registroAlimento&form=add" title="agregar" data-toggle="tooltip">
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
    ?>

      <div class="box box-success">
        <div class="box-body2">
		<a class="btn btn-success glyphicon pull-left" href="?module=printRegistroAlimento" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Nro</th>
                <th class="center">Registro Ica</th>
                <th class="center">Nombre Aliment</th>
                <th class="center">Tipo Alimento</th>
				<th class="center">Unidad Alimento</th>
				<th class="center">Stock</th>
				<th class="center">Encargado Alimento</th>				
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT RegIcaAlimento,NombreAlimento,TipoAlimento,UnidadAlimento,stock,EncargadoAlimento FROM registrosalimentos ORDER BY RegIcaAlimento DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[RegIcaAlimento]</td>
                      <td width='180'>$data[NombreAlimento]</td>
                      <td width='230' align='right'>$data[TipoAlimento]</td>
					  <td width='280' align='right'>$data[UnidadAlimento]</td>
					  <td width='280' align='right'>$data[stock]</td>
					  <td width='330' align='right'>$data[EncargadoAlimento]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_registroAlimento&form=edit&id=$data[RegIcaAlimento]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/registroAlimento/proses.php?act=delete&id=<?php echo $data['RegIcaAlimento'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'NombreAlimento']; ?>?');">
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