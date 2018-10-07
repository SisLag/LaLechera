
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idParto = mysqli_real_escape_string($mysqli, trim($_POST['idParto']));
            $fechParto = mysqli_real_escape_string($mysqli, trim($_POST['fechParto']));
            $vacaParto = mysqli_real_escape_string($mysqli, trim($_POST['vacaParto']));
			$toroParto = mysqli_real_escape_string($mysqli, trim($_POST['toroParto']));
			$abortoParto = mysqli_real_escape_string($mysqli, trim($_POST['abortoParto']));
			$nombreCriaParto = mysqli_real_escape_string($mysqli, trim($_POST['nombreCriaParto']));
			$sexoCriaParto = mysqli_real_escape_string($mysqli, trim($_POST['sexoCriaParto']));
			$observParto = mysqli_real_escape_string($mysqli, trim($_POST['observParto']));

            $created_user = $_SESSION['numeroDocumeno'];

  
            $query = mysqli_query($mysqli, "INSERT INTO partos(IdParto,FechParto,VacaParto,ToroParto,AbortoParto,NombreCriaParto,SexoCriaParto,ObservParto) 
                                            VALUES('$idParto','$fechParto','$vacaParto','$toroParto','$abortoParto','$nombreCriaParto','$sexoCriaParto','$observParto')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=parto&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idParto'])) {
        
                $idParto = mysqli_real_escape_string($mysqli, trim($_POST['idParto']));
				$abortoParto = mysqli_real_escape_string($mysqli, trim($_POST['abortoParto']));
				$nombreCriaParto = mysqli_real_escape_string($mysqli, trim($_POST['nombreCriaParto']));
				$sexoCriaParto = mysqli_real_escape_string($mysqli, trim($_POST['sexoCriaParto']));
				$observParto = mysqli_real_escape_string($mysqli, trim($_POST['observParto']));

                $updated_user = $_SESSION['numeroDocumeno'];

                $query = mysqli_query($mysqli, "UPDATE partos SET AbortoParto = '$abortoParto',
                                                                    NombreCriaParto = '$nombreCriaParto',
                                                                    SexoCriaParto = '$sexoCriaParto',
																	ObservParto = '$observParto'
                                                              WHERE IdParto = '$idParto'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=parto&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idParto = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM partos WHERE IdParto='$idParto'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=parto&alert=3");
            }
        }
    }       
}       
?>