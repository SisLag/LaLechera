

<?php
session_start();

require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
            
            $codigo_inv = mysqli_real_escape_string($mysqli, trim($_POST['codigo_inv']));
            
			$fecha         = mysqli_real_escape_string($mysqli, trim($_POST['fecha_a']));
            $exp             = explode('-',$fecha);
            $fecha_a   = $exp[2]."-".$exp[1]."-".$exp[0];
            
            $codigo       = mysqli_real_escape_string($mysqli, trim($_POST['codigo']));
            $num   = mysqli_real_escape_string($mysqli, trim($_POST['num']));
            $total_stock      = mysqli_real_escape_string($mysqli, trim($_POST['total_stock']));
            $tipo_transaccion= mysqli_real_escape_string($mysqli, trim($_POST['transaccion']));
            $created_user    = $_SESSION['numeroDocumento'];

          
            $query = mysqli_query($mysqli, "INSERT INTO inventario_alimentos(codigo_inv,fecha,codigo,numero,tipo_transaccion) 
                                            VALUES('$codigo_inv','$fecha_a','$codigo','$num','$tipo_transaccion')")
                                            or die('Error: '.mysqli_error($mysqli));    

           
            if ($query) {
                
                $query1 = mysqli_query($mysqli, "UPDATE registrosalimentos SET stock = '$total_stock'
                                                              WHERE RegIcaAlimento   = '$codigo'")
                                                or die('Error: '.mysqli_error($mysqli));

               
                if ($query1) {                       
                    
                    header("location: ../../main.php?module=inventario_alimentos&alert=1");
                }
            }   
        }   
    }
}       
?>