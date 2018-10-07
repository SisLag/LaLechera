<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Datos de Secado

    <a class="btn btn-success btn-social pull-right" href="?module=form_secado&form=add" title="agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Secado
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
            Lista Desplegable sin Valores
            </div>";
    }
    ?>

      <div class="box box-success">
        <div class="box-body2">
		<a class="btn btn-success glyphicon pull-left" href="?module=printSecado" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Nro</th>
                <th class="center">Id Secado</th>
                <th class="center">Vaca Secado</th>
                <th class="center">Fecha Secado</th>
				<th class="center">Real Secado</th>
				<th class="center">Tratamiento Secado</th>
				<th class="center">Vermifugo</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT sc.IdSecado,sc.VacaSecado,sc.FechSecado,sc.RealSecado,sc.TratamVacaSecado,sc.VermiSecado, tr.NombreTratamiento, rp.NombreProd FROM secados sc LEFT JOIN tratamientos tr ON sc.TratamVacaSecado=tr.IdTratamiento
                                                                                                                                                                                  LEFT JOIN registrosproductos rp ON sc.VermiSecado=rp.RegIcaProd ORDER BY IdSecado DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[IdSecado]</td>
                      <td width='80'>$data[VacaSecado]</td>
                      <td width='80' align='right'>$data[FechSecado]</td>
					  <td width='80' align='right'>$data[RealSecado]</td>
					  <td width='80' align='right'>$data[NombreTratamiento]</td>
					  <td width='80' align='right'>$data[NombreProd]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_secado&form=edit&id=$data[IdSecado]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/secado/proses.php?act=delete&id=<?php echo $data['IdSecado'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'IdSecado']; ?>?');">
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