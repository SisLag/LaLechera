
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idPDiaria = mysqli_real_escape_string($mysqli, trim($_POST['idPDiaria']));
            $fechProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['fechProdDiaria']));
            $plantaProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['plantaProdDiaria']));
			$criaProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['criaProdDiaria']));
			$otrosProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['otrosProdDiaria']));
			$totalDiaProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['totalDiaProdDiaria']));
			$nroVacasOrdenoProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['nroVacasOrdenoProdDiaria']));
			$promLtsProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['promLtsProdDiaria']));
			$totalConcentAmProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['totalConcentAmProdDiaria']));
			$totalConcentPmProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['totalConcentPmProdDiaria']));
			$promConcentProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['promConcentProdDiaria']));
			$relacLecheConcentProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['relacLecheConcentProdDiaria']));

            $created_user = $_SESSION['numeroDocumento'];

  
            $query = mysqli_query($mysqli, "INSERT INTO produccionesdiarias(IdPDiaria,FechProdDiaria,PlantaProdDiaria,CriaProdDiaria,OtrosProdDiaria,TotalDiaProdDiaria,NroVacasOrdenoProdDiaria,PromLtsProdDiaria,TotalConcentAmProdDiaria,TotalConcentPmProdDiaria,PromConcentProdDiaria,RelacLecheConcentProdDiaria) 
                                            VALUES('$idPDiaria','$fechProdDiaria','$plantaProdDiaria','$criaProdDiaria','$otrosProdDiaria','$totalDiaProdDiaria','$nroVacasOrdenoProdDiaria','$promLtsProdDiaria','$totalConcentAmProdDiaria','$totalConcentPmProdDiaria','$promConcentProdDiaria','$relacLecheConcentProdDiaria')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=produccionDiaria&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idPDiaria'])) {
        
                $idPDiaria = mysqli_real_escape_string($mysqli, trim($_POST['idPDiaria']));
				$promLtsProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['promLtsProdDiaria']));
				$totalConcentAmProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['totalConcentAmProdDiaria']));
				$totalConcentPmProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['totalConcentPmProdDiaria']));
				$promConcentProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['promConcentProdDiaria']));
				$relacLecheConcentProdDiaria = mysqli_real_escape_string($mysqli, trim($_POST['relacLecheConcentProdDiaria']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE produccionesdiarias SET  PromLtsProdDiaria = '$promLtsProdDiaria',
                                                                    TotalConcentAmProdDiaria = '$totalConcentAmProdDiaria',
                                                                    TotalConcentPmProdDiaria = '$totalConcentPmProdDiaria',
																	PromConcentProdDiaria = '$promConcentProdDiaria',
																	RelacLecheConcentProdDiaria = '$relacLecheConcentProdDiaria'
                                                              WHERE IdPDiaria = '$idPDiaria'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=produccionDiaria&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idPDiaria = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM produccionesdiarias WHERE IdPDiaria='$idPDiaria'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=produccionDiaria&alert=3");
            }
        }
    }       
}       
?>