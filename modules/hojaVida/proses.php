
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $nroPotreroHV = mysqli_real_escape_string($mysqli, trim($_POST['nroPotreroHV']));
            $loteHV = mysqli_real_escape_string($mysqli, trim($_POST['loteHV']));
            $areaHV = mysqli_real_escape_string($mysqli, trim($_POST['areaHV']));
			$fechEntradaGanadoHV = mysqli_real_escape_string($mysqli, trim($_POST['fechEntradaGanadoHV']));
            $fechSalidaGanadoHV = mysqli_real_escape_string($mysqli, trim($_POST['fechSalidaGanadoHV']));
            $nroAnimHV = mysqli_real_escape_string($mysqli, trim($_POST['nroAnimHV']));
			$diasOcupPotreroHV = mysqli_real_escape_string($mysqli, trim($_POST['diasOcupPotreroHV']));
            $diasDesocupPotreroHV = mysqli_real_escape_string($mysqli, trim($_POST['diasDesocupPotreroHV']));
            $fechAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['fechAbonoHV']));
			$prodAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['prodAbonoHV']));
            $cantAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['cantAbonoHV']));
            $tiempoCarenAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['tiempoCarenAbonoHV']));

            $created_user = $_SESSION['numeroDocumento'];

            $query = mysqli_query($mysqli, "SELECT NroPotreroHV FROM hojasvida WHERE NroPotreroHV=$nroPotreroHV")
			or die('error: ' . mysqli_error($mysqli));
		  $data = mysqli_fetch_assoc($query);

			if($data['NroPotreroHV'] == $nroPotreroHV){
				header("location: ../../main.php?module=hojaVida&alert=4");
            }else{   
            $query = mysqli_query($mysqli, "INSERT INTO hojasvida(NroPotreroHV,LoteHV,AreaHV,FechEntradaGanadoHV,FechSalidaGanadoHV,NroAnimHV,DiasOcupPotreroHV,DiasDesocupPotreroHV,FechAbonoHV,ProdAbonoHV,CantAbonoHV,TiempoCarenAbonoHV) 
                                            VALUES('$nroPotreroHV','$loteHV','$areaHV','$fechEntradaGanadoHV','$fechSalidaGanadoHV','$nroAnimHV','$diasOcupPotreroHV','$diasDesocupPotreroHV','$fechAbonoHV','$prodAbonoHV','$cantAbonoHV','$tiempoCarenAbonoHV')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=hojaVida&alert=1");
            }   
        }
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['nroPotreroHV'])) {
        
                $nroPotreroHV = mysqli_real_escape_string($mysqli, trim($_POST['nroPotreroHV']));
				$loteHV = mysqli_real_escape_string($mysqli, trim($_POST['loteHV']));
				$areaHV = mysqli_real_escape_string($mysqli, trim($_POST['areaHV']));
				$fechSalidaGanadoHV = mysqli_real_escape_string($mysqli, trim($_POST['fechSalidaGanadoHV']));
				$fechAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['fechAbonoHV']));
				$prodAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['prodAbonoHV']));
				$cantAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['cantAbonoHV']));
				$tiempoCarenAbonoHV = mysqli_real_escape_string($mysqli, trim($_POST['tiempoCarenAbonoHV']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE hojasvida SET  loteHV = '$loteHV',
                                                                    areaHV = '$areaHV',
                                                                    fechSalidaGanadoHV = '$fechSalidaGanadoHV',
																	fechAbonoHV = '$fechAbonoHV',
																	prodAbonoHV = '$prodAbonoHV',
																	cantAbonoHV = '$cantAbonoHV',
																	tiempoCarenAbonoHV = '$tiempoCarenAbonoHV'
                                                              WHERE NroPotreroHV = '$nroPotreroHV'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=hojaVida&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $NroPotreroHV = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM hojasvida WHERE NroPotreroHV='$NroPotreroHV'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=hojaVida&alert=3");
            }
        }
    }       
}       
?>