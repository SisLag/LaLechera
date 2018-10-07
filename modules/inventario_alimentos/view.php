

<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Registro de alimentos

    <a class="btn btn-success btn-social pull-right" href="?module=form_inventario_alimentos&form=add" title="Agregar" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Entradas / Salidas
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
    ?>

      <div class="box box-success">
        <div class="box-body2">
         
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
           
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Codigo de Transación</th>
                <th class="center">Fecha</th>
                <th class="center">Codigo</th>
                <th class="center">Alimento</th>
				<th class="center">Tipo</th>
                <th class="center">Cant.</th>
                <th class="center">Unidad</th>
              </tr>
            </thead>
         
            <tbody>
            <?php  
            $no = 1;
           
            $query = mysqli_query($mysqli, "SELECT a.tipo_transaccion, a.codigo_inv,a.fecha,a.codigo,a.numero,b.RegIcaAlimento,b.NombreAlimento,b.UnidadAlimento
                                            FROM inventario_alimentos as a INNER JOIN registrosalimentos as b ON a.codigo=b.RegIcaAlimento ORDER BY codigo_inv DESC")
                                            or die('error '.mysqli_error($mysqli));

           
            while ($data = mysqli_fetch_assoc($query)) { 
              $fecha         = $data['fecha'];
              $exp             = explode('-',$fecha);
              $fecha2   = $exp[2]."-".$exp[1]."-".$exp[0];

             
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[codigo_inv]</td>
                      <td width='80' class='center'>$fecha</td>
                      <td width='80' class='center'>$data[codigo]</td>
                      <td width='200'>$data[NombreAlimento]</td>
					  <td width='80' class='center'>$data[tipo_transaccion]</td>
                      <td width='100' align='right'>$data[numero]</td>
                      <td width='80' class='center'>$data[UnidadAlimento]</td>
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