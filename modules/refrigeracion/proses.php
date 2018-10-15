
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['idRefrigeracion']));
            $fechRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['fechRefrigeracion']));
            $horaAmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['horaAmRefrigeracion']));
			$tempAmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['tempAmRefrigeracion']));
			$horaPmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['horaPmRefrigeracion']));
			$tempPmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['tempPmRefrigeracion']));

            $created_user = $_SESSION['numeroDocumento'];

            $query = mysqli_query($mysqli, "SELECT IdRefrigeracion,FROM refrigeraciones where IdRefrigeracion = $idRefrigeracion")
			or die('error: ' . mysqli_error($mysqli));
		  $data = mysqli_fetch_assoc($query);

			if($data['IdRefrigeracion']==$idRefrigeracion){
				header("location: ../../main.php?module=refrigeracion&alert=4");
            }else{  
            $query = mysqli_query($mysqli, "INSERT INTO refrigeraciones(IdRefrigeracion,FechRefrigeracion,HoraAmRefrigeracion,TempAmRefrigeracion,HoraPmRefrigeracion,TempPmRefrigeracion,EncargadoRefrigeracion) 
                                            VALUES('$idRefrigeracion','$fechRefrigeracion','$horaAmRefrigeracion','$tempAmRefrigeracion','$horaPmRefrigeracion','$tempPmRefrigeracion','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=refrigeracion&alert=1");
            }   
        }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idRefrigeracion'])) {
        
                $idRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['idRefrigeracion']));
				$horaAmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['horaAmRefrigeracion']));
				$tempAmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['tempAmRefrigeracion']));
				$horaPmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['horaPmRefrigeracion']));
				$tempPmRefrigeracion = mysqli_real_escape_string($mysqli, trim($_POST['tempPmRefrigeracion']));

                $updated_user = $_SESSION['numeroDucumento'];

                $query = mysqli_query($mysqli, "UPDATE refrigeraciones SET  horaAmRefrigeracion = '$horaAmRefrigeracion',
                                                                    tempAmRefrigeracion = '$tempAmRefrigeracion',
                                                                    HoraPmRefrigeracion = '$horaPmRefrigeracion',
																	TempPmRefrigeracion = '$tempPmRefrigeracion'
                                                              WHERE IdRefrigeracion = '$idRefrigeracion'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=refrigeracion&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idRefrigeracion = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM refrigeraciones WHERE IdRefrigeracion='$idRefrigeracion'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=refrigeracion&alert=3");
            }
        }
    }       
}       
?>