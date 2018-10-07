
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['idProdVaca']));
            $vacaProd = mysqli_real_escape_string($mysqli, trim($_POST['vacaProd']));
            $fechProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['fechProdVaca']));
            $ltsAmProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['ltsAmProdVaca']));
            $ltspmProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['ltspmProdVaca']));
			$totalLtsProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['totalLtsProdVaca']));
            $concentrProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['concentrProdVaca']));
            $condiccCorpVacaProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['condiccCorpVacaProdVaca']));
			$observProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['observProdVaca']));

            $created_user = $_SESSION['numeroDocumento'];

  
            $query = mysqli_query($mysqli, "INSERT INTO produccionesvacas(IdProdVaca,VacaProd,FechProdVaca,LtsAmProdVaca,LtspmProdVaca,TotalLtsProdVaca,ConcentrProdVaca,CondiccCorpVacaProdVaca,ObservProdVaca) 
                                            VALUES('$IdProdVaca','$vacaProd','$fechProdVaca','$ltsAmProdVaca','$ltspmProdVaca','$totalLtsProdVaca','$concentrProdVaca','$condiccCorpVacaProdVaca','$observProdVaca')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=produccionDiaria&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['IdProdVaca'])) {
        
                $idProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['IdProdVaca']));
				$ltsAmProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['ltsAmProdVaca']));
				$ltspmProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['ltspmProdVaca']));
				$totalLtsProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['totalLtsProdVaca']));
				$concentrProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['concentrProdVaca']));
				$condiccCorpVacaProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['condiccCorpVacaProdVaca']));
				$observProdVaca = mysqli_real_escape_string($mysqli, trim($_POST['observProdVaca']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE produccionesvacas SET  LtsAmProdVaca = '$ltsAmProdVaca',
                                                                    LtsAmProdVaca = '$ltsAmProdVaca',
                                                                    LtspmProdVaca = '$ltspmProdVaca',
																	TotalLtsProdVaca = '$totalLtsProdVaca',
																	ConcentrProdVaca = '$concentrProdVaca',
																	CondiccCorpVacaProdVaca = '$condiccCorpVacaProdVaca',
																	ObservProdVaca = '$observProdVaca'
                                                              WHERE IdProdVaca = '$idProdVaca'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=producionVaca&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idRaza = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM produccionesvacas WHERE IdProdVaca='$idProdVaca'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=produccionVaca&alert=3");
            }
        }
    }       
}       
?>