<?php
session_start();
ob_start();


require_once "../../config/database.php";

include "../../config/fungsi_tanggal.php";

include "../../config/fungsi_rupiah.php";



$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    
    $query = mysqli_query($mysqli, "SELECT cu.IdCuarentena,cu.AnimCuarentena,cu.FechIngresoCuarentena,cu.FechSalidaCuarentena,cu.MotivoIngresoCuarentena,cu.DiagPresuntCuarentena,cu.DesinfCuarentena,cu.ProdDesinfecCuarentena, rp.NombreProd FROM cuarentenas cu
                                     INNER JOIN registrosproductos rp ON cu.ProdDesinfecCuarentena=rp.RegIcaProd
                                      WHERE cu.FechIngresoCuarentena BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY cu.IdCuarentena ASC") 
                                    or die('error '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>REPORTE DE CUARENTENA</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
    </head>
    <body>
        <div id="title">
           DATOS DE REGISTROS DE CUARENTENA
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Fecha <?php echo ($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Desde <?php echo ($tgl1); ?> Hasta <?php echo ($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
        <hr><br>
        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                        <th height="20" align="center" valign="middle"><small>Nro</small></th>
                        <th height="20" align="center" valign="middle"><small>IdCuarentena</small></th>
                        <th height="20" align="center" valign="middle"><small>AnimCuarentena</small></th>
                        <th height="20" align="center" valign="middle"><small>FechIngresoCuarentena</small></th>
                        <th height="20" align="center" valign="middle"><small>FechSalidaCuarentena</small></th>
                        <th height="20" align="center" valign="middle"><small>DesinfCuarentena</small></th>
                        <th height="20" align="center" valign="middle"><small>ProdDesinfecCuarentena</small></th>
                        <th height="20" align="center" valign="middle"><small>NombreProd</small></th>
                        <th height="20" align="center" valign="middle"><small>DiagPresuntCuarentena</small></th>
                        </tr>
                </thead>
                <tbody>
<?php
    
    if($count != 0) {
   
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal       = $data['FechIngresoCuarentena'];
            $exp           = explode('-',$tanggal);
            $fecha = $exp[2]."-".$exp[1]."-".$exp[0];

            echo "  <tr>
            <td width='40' height='10' align='center' valign='middle'>$no</td>
            <td width='87' height='10' align='center' valign='middle'>$data[IdCuarentena]</td>
            <td width='87' height='10' align='center' valign='middle'>$data[AnimCuarentena]</td>
            <td width='87' height='10' align='center' valign='middle'>$data[FechIngresoCuarentena]</td>
            <td width='87' height='10' align='center' valign='middle'>$data[FechSalidaCuarentena]</td>
            <td style='padding-right:10px;' width='87' height='13' align='center' valign='middle'>$data[DesinfCuarentena]</td>
            <td width='87' height='10' align='center' valign='middle'>$data[ProdDesinfecCuarentena]</td>
            <td width='87' height='10' align='center' valign='middle'>$data[NombreProd]</td> 
            <td style='padding-left:5px;' width='223' height='13' valign='middle'>$data[DiagPresuntCuarentena]</td>           
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>

        </div>
    </body>
</html>
<?php
$filename="RegCuarentena.pdf"; 
$content = ob_get_clean();
$content = '<page style="font-family: freeserif">'.($content).'</page>';

require_once('../../assets/plugins/html2pdf_v4.03/html2pdf.class.php');
try
{
    $html2pdf = new HTML2PDF('L','A4','en', false, 'ISO-8859-15',array(15, 15, 15, 15));
    $html2pdf->setDefaultFont('Arial');
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
    $html2pdf->Output($filename);
}
catch(HTML2PDF_exception $e) { echo $e; }
?>