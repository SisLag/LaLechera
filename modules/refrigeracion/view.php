<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Refrigeración

    <a class="btn btn-success btn-social pull-right" href="?module=form_refrigeracion&form=add" title="agregar" data-toggle="tooltip">
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
            Dato Eliminado Correctamente.
            </div>";
    }
    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            El registro ya existe
            </div>";
    }
    ?>

      <div class="box box-success">
        <div class="box-body2">
		<a class="btn btn-success glyphicon pull-left" href="?module=printRefrigeracion" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Nro</th>
                <th class="center">Id Refrigeracion</th>
                <th class="center">Fecha Refrigeracion</th>
                <th class="center">Temp Am Refrigeracion</th>
				<th class="center">Hora Pm Refrigeracion</th>
				<th class="center">Temp Pm Refrigeracion</th>
				<th class="center">Encargado Refrigeracion</th>			
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT IdRefrigeracion,FechRefrigeracion,TempAmRefrigeracion,HoraPmRefrigeracion,TempPmRefrigeracion,EncargadoRefrigeracion FROM refrigeraciones ORDER BY IdRefrigeracion DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[IdRefrigeracion]</td>
                      <td width='180'>$data[FechRefrigeracion]</td>
                      <td width='230' align='right'>$data[TempAmRefrigeracion]</td>
					  <td width='280' align='right'>$data[HoraPmRefrigeracion]</td>
					  <td width='330' align='right'>$data[TempPmRefrigeracion]</td>
					  <td width='380' align='right'>$data[EncargadoRefrigeracion]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_refrigeracion&form=edit&id=$data[IdRefrigeracion]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/refrigeracion/proses.php?act=delete&id=<?php echo $data['IdRefrigeracion'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'IdRefrigeracion']; ?>?');">
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