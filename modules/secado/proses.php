
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idSecado = mysqli_real_escape_string($mysqli, trim($_POST['idSecado']));
            $vacaSecado = mysqli_real_escape_string($mysqli, trim($_POST['vacaSecado']));
            $fechSecado = mysqli_real_escape_string($mysqli, trim($_POST['fechSecado']));
			$realSecado = mysqli_real_escape_string($mysqli, trim($_POST['realSecado']));
			$tratamVacaSecado = mysqli_real_escape_string($mysqli, trim($_POST['tratamVacaSecado']));
			$vermiSecado = mysqli_real_escape_string($mysqli, trim($_POST['vermiSecado']));
			$otrasPracTSecado = mysqli_real_escape_string($mysqli, trim($_POST['otrasPracTSecado']));

            $created_user = $_SESSION['numeroDocumento'];

  
            $query = mysqli_query($mysqli, "INSERT INTO secados(IdSecado,VacaSecado,FechSecado,RealSecado,TratamVacaSecado,VermiSecado,OtrasPracTSecado) 
                                            VALUES('$idSecado','$vacaSecado','$fechSecado','$realSecado','$tratamVacaSecado','$vermiSecado','$otrasPracTSecado')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=secado&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idSecado'])) {
        
                $idSecado = mysqli_real_escape_string($mysqli, trim($_POST['idSecado']));
				$realSecado = mysqli_real_escape_string($mysqli, trim($_POST['realSecado']));
				$tratamVacaSecado = mysqli_real_escape_string($mysqli, trim($_POST['tratamVacaSecado']));
				$otrasPracTSecado = mysqli_real_escape_string($mysqli, trim($_POST['otrasPracTSecado']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE secados SET  RealSecado = '$realSecado',
                                                                    TratamVacaSecado = '$tratamVacaSecado',
                                                                    OtrasPracTSecado = '$otrasPracTSecado'
                                                              WHERE IdSecado = '$idSecado'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=secado&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idSecado = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM secados WHERE IdSecado='$idSecado'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=secado&alert=3");
            }
        }
    }       
}       
?>