
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['idMovGanado']));
            $fechMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['fechMovGanado']));
            $animMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['animMovGanado']));
			$transMonvGanado = mysqli_real_escape_string($mysqli, trim($_POST['transMonvGanado']));
            $valorMGanado = mysqli_real_escape_string($mysqli, trim($_POST['valorMGanado']));
			$observMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['observMovGanado']));
			$guiaMovilizMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['guiaMovilizMovGanado']));

            $created_user = $_SESSION['numeroDocumento'];

  
            $query = mysqli_query($mysqli, "INSERT INTO movimientosganados(IdMovGanado,FechMovGanado,AnimMovGanado,TransMonvGanado,ValorMGanado,ObservMovGanado,GuiaMovilizMovGanado) 
                                            VALUES('$idMovGanado','$fechMovGanado','$animMovGanado','$transMonvGanado','$valorMGanado','$observMovGanado','$guiaMovilizMovGanado')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=movimientoGanado&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idMovGanado'])) {
        
                $idMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['idMovGanado']));   
			$observMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['observMovGanado']));			
			$guiaMovilizMovGanado = mysqli_real_escape_string($mysqli, trim($_POST['guiaMovilizMovGanado']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE movimientosganados SET  ObservMovGanado = '$observMovGanado',
                                                                    GuiaMovilizMovGanado = '$guiaMovilizMovGanado',
                                                              WHERE IdMovGanado = '$idMovGanado'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=movimientoGanado&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idRaza = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM movimientosganados WHERE IdMovGanado='$idMovGanado'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=movimientoGanado&alert=3");
            }
        }
    }       
}       
?>