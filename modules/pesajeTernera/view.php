<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Pesaje Cria

    <a class="btn btn-success btn-social pull-right" href="?module=form_pesajeTernera&form=add" title="agregar" data-toggle="tooltip">
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
             Dato Modificado Correctamente
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Dato Eliminado Correctamente.
            </div>";
    }
    ?>

      <div class="box box-success">
        <div class="box-body2">
		<a class="btn btn-success glyphicon pull-left" href="?module=printPesajeTernera" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Nro</th>
                <th class="center">Id Pesaje</th>
                <th class="center">Fecha Pesaje</th>
                <th class="center">Cria</th>
				<th class="center">Peso</th>
				<th class="center">Alzada</th>
				<th class="center">Producto</th>
				<th class="center">Cantidad Producto </th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php  
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT pt.IdPTernera,pt.FechPTernera,pt.AnimPTernera,pt.PesoPTernera,pt.AlzadaPTernera,pt.MedPTernera,pt.CantMedPTernera,rm.NombreMedicamento FROM pesajesterneras pt LEFT JOIN registrosmedicamentos rm ON pt.MedPTernera=rm.IdRegIcaMedicamento ORDER BY pt.IdPTernera DESC")
                                            or die('error: '.mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) { 
           
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[IdPTernera]</td>
                      <td width='80'>$data[FechPTernera]</td>
                      <td width='80' align='right'>$data[AnimPTernera]</td>
					  <td width='80' align='right'>$data[PesoPTernera]</td>
					  <td width='80' align='right'>$data[AlzadaPTernera]</td>
					  <td width='80' align='right'>$data[NombreMedicamento]</td>
					  <td width='80' align='right'>$data[CantMedPTernera]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_pesajeTernera&form=edit&id=$data[IdPTernera]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
            ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/pesajeTernera/proses.php?act=delete&id=<?php echo $data['IdPTernera'];?>" onclick="return confirm('estas seguro de eliminar <?php echo $data[ 'IdPTernera']; ?>?');">
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