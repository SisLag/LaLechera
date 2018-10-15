
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idPTernera = mysqli_real_escape_string($mysqli, trim($_POST['idPTernera']));
            $fechPTernera = mysqli_real_escape_string($mysqli, trim($_POST['fechPTernera']));
            $animPTernera = mysqli_real_escape_string($mysqli, trim($_POST['animPTernera']));
			$pesoPTernera = mysqli_real_escape_string($mysqli, trim($_POST['pesoPTernera']));
			$alzadaPTernera = mysqli_real_escape_string($mysqli, trim($_POST['alzadaPTernera']));
			$medPTernera = mysqli_real_escape_string($mysqli, trim($_POST['medPTernera']));
			$cantMedPTernera = mysqli_real_escape_string($mysqli, trim($_POST['cantMedPTernera']));
			$observPTernera = mysqli_real_escape_string($mysqli, trim($_POST['observPTernera']));

            $created_user = $_SESSION['numeroDocumento']; 

            $query = mysqli_query($mysqli, "INSERT INTO pesajesterneras(IdPTernera,FechPTernera,AnimPTernera,PesoPTernera,AlzadaPTernera,MedPTernera,CantMedPTernera,ObservPTernera) 
                                            VALUES('$idPTernera','$fechPTernera','$animPTernera','$pesoPTernera','$alzadaPTernera','$medPTernera','$cantMedPTernera','$observPTernera')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=pesajeTernera&alert=1");
            } 
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idPTernera'])) {
        
                $idPTernera = mysqli_real_escape_string($mysqli, trim($_POST['idPTernera']));
				$pesoPTernera = mysqli_real_escape_string($mysqli, trim($_POST['pesoPTernera']));
				$alzadaPTernera = mysqli_real_escape_string($mysqli, trim($_POST['alzadaPTernera']));
				$medPTernera = mysqli_real_escape_string($mysqli, trim($_POST['medPTernera']));
				$cantMedPTernera = mysqli_real_escape_string($mysqli, trim($_POST['cantMedPTernera']));
				$observPTernera = mysqli_real_escape_string($mysqli, trim($_POST['observPTernera']));

                $updated_user = $_SESSION['numeroEncargado'];

                $query = mysqli_query($mysqli, "UPDATE pesajesterneras SET  PesoPTernera = '$pesoPTernera',
                                                                    AlzadaPTernera = '$alzadaPTernera',
                                                                    MedPTernera = '$medPTernera',
																	CantMedPTernera = '$cantMedPTernera',
																	ObservPTernera = '$observPTernera'
                                                              WHERE IdPTernera = '$idPTernera'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=pesajeTernera&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idPTernera = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM pesajesterneras WHERE IdPTernera='$idPTernera'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=pesajeTernera&alert=3");
            }
        }
    }       
}       
?>