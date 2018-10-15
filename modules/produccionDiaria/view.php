<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Producción Diaria

    <a class="btn btn-success btn-social pull-right" href="?module=form_produccionDiaria&form=add" title="agregar" data-toggle="tooltip">
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
    } elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Dato Guarda Correctamen
            </div>";
    } elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
             Dato Modificado Correctamente
            </div>";
    } elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Dato Eliminado Correctamente.
            </div>";
    }elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
            Elregistro ya existe
            </div>";
    }
    ?>

      <div class="box box-success">
        <div class="box-body2">
		<a class="btn btn-success glyphicon pull-left" href="?module=printProduccionDiaria" title="Imprimir" data-toggle="tooltip">
      <i class="glyphicon fa fa-print"></i>
    </a>
    <br/>
    <br/>
	<br/>
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
      
            <thead>
              <tr>
			    <th class="center">Nro</th>
                <th class="center">Id Produccion</th>
                <th class="center">Fecha Produccion</th>
                <th class="center">Planta Produccion</th>
				<th class="center">Cria Produccion</th>
				<th class="center">Otros Produccion</th>
				<th class="center">Total Dia</th>
				<th class="center">Nro Vacas Ordeño</th>
				<th class="center">Promedio Lts</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $no = 1;
            $query = mysqli_query($mysqli, "SELECT IdPDiaria,FechProdDiaria,PlantaProdDiaria,CriaProdDiaria,OtrosProdDiaria,TotalDiaProdDiaria,NroVacasOrdenoProdDiaria,PromLtsProdDiaria FROM produccionesdiarias ORDER BY IdPDiaria DESC")
              or die('error: ' . mysqli_error($mysqli));

            while ($data = mysqli_fetch_assoc($query)) {

              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='80' class='center'>$data[IdPDiaria]</td>
                      <td width='80'>$data[FechProdDiaria]</td>
                      <td width='80' align='right'>$data[PlantaProdDiaria]</td>
					  <td width='80' align='right'>$data[CriaProdDiaria]</td>
					  <td width='80' align='right'>$data[OtrosProdDiaria]</td>
					  <td width='80' align='right'>$data[TotalDiaProdDiaria]</td>
					  <td width='80' align='right'>$data[NroVacasOrdenoProdDiaria]</td>
					  <td width='80' align='right'>$data[PromLtsProdDiaria]</td>
                      <td class='center' width='80'>
                        <div>
                          <a data-toggle='tooltip' data-placement='top' title='modificar' style='margin-right:5px' class='btn btn-success btn-sm' href='?module=form_produccionDiaria&form=edit&id=$data[IdPDiaria]'>
                              <i style='color:#fff' class='glyphicon glyphicon-edit'></i>
                          </a>";
              ?>
                          <a data-toggle="tooltip" data-placement="top" title="Eliminar" class="btn btn-danger btn-sm" href="modules/produccionDiaria/proses.php?act=delete&id=<?php echo $data['IdPDiaria']; ?>" onclick="return confirm('estas seguro de eliminar <?php echo $data['IdPDiaria']; ?>?');">
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