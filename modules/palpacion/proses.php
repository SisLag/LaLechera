
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['idPalpacion']));
            $fechPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['fechPalpacion']));
            $vacaPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['vacaPalpacion']));
			$fechUltimPartoPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['fechUltimPartoPalpacion']));
            $diasLechePalpacion = mysqli_real_escape_string($mysqli, trim($_POST['diasLechePalpacion']));
            $fechUltimServicPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['fechUltimServicPalpacion']));
			$diasServidaPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['diasServidaPalpacion']));
            $fechUltimPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['fechUltimPalpacion']));
			$hallazgosPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['hallazgosPalpacion']));
            $estadoPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['estadoPalpacion']));
            $estrucOvaricasPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['estrucOvaricasPalpacion']));
			$cCRechequeoPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['cCRechequeoPalpacion']));
            $observPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['observPalpacion']));

            $created_user = $_SESSION['numeroDocumento'];
  
            $query = mysqli_query($mysqli, "INSERT INTO registrospalpaciones(IdPalpacion,FechPalpacion,VacaPalpacion,FechUltimPartoPalpacion,DiasLechePalpacion,FechUltimServicPalpacion,DiasServidaPalpacion,FechUltimPalpacion,HallazgosPalpacion,EstadoPalpacion,EstrucOvaricasPalpacion,CCRechequeoPalpacion,ObservPalpacion) 
                                            VALUES('$idPalpacion','$fechPalpacion','$vacaPalpacion','$fechUltimPartoPalpacion','$diasLechePalpacion','$fechUltimServicPalpacion','$diasServidaPalpacion','$fechUltimPalpacion','$hallazgosPalpacion','$estadoPalpacion','$estrucOvaricasPalpacion','$cCRechequeoPalpacion','$observPalpacion')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=palpacion&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idPalpacion'])) {
        
                $idPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['idPalpacion']));
            $diasLechePalpacion = mysqli_real_escape_string($mysqli, trim($_POST['diasLechePalpacion']));
            $fechUltimServicPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['fechUltimServicPalpacion']));
			$diasServidaPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['diasServidaPalpacion']));
            $fechUltimPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['fechUltimPalpacion']));
			$hallazgosPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['hallazgosPalpacion']));
            $estadoPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['estadoPalpacion']));
            $estrucOvaricasPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['estrucOvaricasPalpacion']));
			$cCRechequeoPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['cCRechequeoPalpacion']));
            $observPalpacion = mysqli_real_escape_string($mysqli, trim($_POST['observPalpacion']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE registrospalpaciones SET  DiasLechePalpacion = '$diasLechePalpacion',
                                                                    FechUltimServicPalpacion = '$fechUltimServicPalpacion',
                                                                    DiasServidaPalpacion = '$diasServidaPalpacion',
																	FechUltimPalpacion = '$fechUltimPalpacion',
																	HallazgosPalpacion = '$hallazgosPalpacion',
																	EstadoPalpacion = '$estadoPalpacion',
																	EstrucOvaricasPalpacion = '$estrucOvaricasPalpacion',
																	CCRechequeoPalpacion = '$cCRechequeoPalpacion',
																	ObservPalpacion = '$observPalpacion'
                                                              WHERE IdPalpacion = '$idPalpacion'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=palpacion&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idPalpacion = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM registrospalpaciones WHERE IdPalpacion='$idPalpacion'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=palpacion&alert=3");
            }
        }
    }       
}       
?>