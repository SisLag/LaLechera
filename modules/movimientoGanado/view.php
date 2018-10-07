<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Movimiento de Ganado

    <a class="btn btn-success btn-social pull-right" href="?module=form_movimientoGanado&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Entradas/Salidas
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
             Dato Modificado Correctamente
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
		<a class="btn btn-success glyphicon pull-left" href="?module=printMovimientoGanado" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Numero</th>
                <th class="center">Id Movimiento</th>
                <th class="center">Fecha Movimiento</th>
                <th class="center">Animal</th>
				<th class="center">Transaccion</th>
				<th class="center">Valor</th>
				<th class="center">Guia Movilizacion</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT IdMovGanado,FechMovGanado,AnimMovGanado,TransMonvGanado,ValorMGanado,GuiaMovilizMovGanado FROM movimientosganados ORDER BY IdMovGanado DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[IdMovGanado]</td>
                      <td width='80'>$data[FechMovGanado]</td>
                      <td width='80' align='right'>$data[AnimMovGanado]</td>
					  <td width='80' align='right'>$data[TransMonvGanado]</td>
					  <td width='80' align='right'>$data[ValorMGanado]</td>
					  <td width='80' align='right'>$data[GuiaMovilizMovGanado]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_movimientoGanado&form=edit&id=$data[IdMovGanado]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/movimientoGanado/proses.php?act=delete&id=<?php echo $data['IdMovGanado'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'IdMovGanado']; ?>?');">
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