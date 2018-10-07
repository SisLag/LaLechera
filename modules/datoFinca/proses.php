
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}


elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
				$municipioFinca = mysqli_real_escape_string($mysqli, trim($_POST['nombreFinca']));
				$municipioFinca = mysqli_real_escape_string($mysqli, trim($_POST['municipioFinca']));
				$veredaFinca = mysqli_real_escape_string($mysqli, trim($_POST['veredaFinca']));
				$barrioFinca = mysqli_real_escape_string($mysqli, trim($_POST['barrioFinca']));
				$nombrePropietFinca = mysqli_real_escape_string($mysqli, trim($_POST['nombrePropietFinca']));
				$telFinca1 = mysqli_real_escape_string($mysqli, trim($_POST['telFinca1']));
				$nombreAdminFinca = mysqli_real_escape_string($mysqli, trim($_POST['nombreAdminFinca']));
				$telFinca12 = mysqli_real_escape_string($mysqli, trim($_POST['telFinca12']));
				$areaTotalFinca = mysqli_real_escape_string($mysqli, trim($_POST['areaTotalFinca']));
				$areaPastosFinca = mysqli_real_escape_string($mysqli, trim($_POST['areaPastosFinca']));
				$areaLecheriaFinca = mysqli_real_escape_string($mysqli, trim($_POST['areaLecheriaFinca']));
				$areaLevanteFinca = mysqli_real_escape_string($mysqli, trim($_POST['areaLevanteFinca']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE datosfincas SET  MunicipioFinca = '$municipioFinca',
                                                                    VeredaFinca = '$veredaFinca',
                                                                    BarrioFinca = '$barrioFinca',
																	NombrePropietFinca = '$nombrePropietFinca',
                                                                    TelFinca1 = '$telFinca1',
																	NombreAdminFinca = '$nombreAdminFinca',
                                                                    TelFinca12 = '$telFinca12',
																	AreaTotalFinca = '$areaTotalFinca',
                                                                    AreaPastosFinca = '$areaPastosFinca',
																	AreaLecheriaFinca = '$areaLecheriaFinca',
                                                                    AreaLevanteFinca = '$areaLevanteFinca'
                                                              WHERE NombreFinca = '$nombreFinca'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=datoFinca&alert=1");
                } 
        }
    }		
?>