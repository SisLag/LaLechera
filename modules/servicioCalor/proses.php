
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idSCalores = mysqli_real_escape_string($mysqli, trim($_POST['idSCalores']));
            $vacaSCalores = mysqli_real_escape_string($mysqli, trim($_POST['vacaSCalores']));
            $fechSCalores = mysqli_real_escape_string($mysqli, trim($_POST['fechSCalores']));
			$toroSCalores = mysqli_real_escape_string($mysqli, trim($_POST['toroSCalores']));
			$modoInseminacion = mysqli_real_escape_string($mysqli, trim($_POST['modoInseminacion']));
			$nroSCalores = mysqli_real_escape_string($mysqli, trim($_POST['nroSCalores']));
			$observSCalores = mysqli_real_escape_string($mysqli, trim($_POST['observSCalores']));

            $numeroDocumento = $_SESSION['numeroDocumento'];

  
            $query = mysqli_query($mysqli, "INSERT INTO servicioscalores(IdSCalores,VacaSCalores,FechSCalores,ToroSCalores,ModoInseminacion,NroSCalores,InseminSCalores,ObservSCalores) 
                                            VALUES('$idSCalores','$vacaSCalores','$fechSCalores','$toroSCalores','$modoInseminacion','$nroSCalores','$numeroDocumento','$observSCalores')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=servicioCalor&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idSCalores'])) {
        
                $idSCalores = mysqli_real_escape_string($mysqli, trim($_POST['idSCalores']));
				$modoInseminacion = mysqli_real_escape_string($mysqli, trim($_POST['modoInseminacion']));
				$observSCalores = mysqli_real_escape_string($mysqli, trim($_POST['observSCalores']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE servicioscalores SET  ModoInseminacion = '$modoInseminacion',
                                                                    ObservSCalores = '$observSCalores'
                                                              WHERE IdSCalores = '$idSCalores'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=servicioCalor&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idSCalores = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM servicioscalores WHERE IdSCalores='$idSCalores'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=servicioCalor&alert=3");
            }
        }
    }       
}       
?>