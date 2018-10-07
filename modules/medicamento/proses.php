
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['Guardar'])) {

            $idRegIcaMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['idRegIcaMedicamento']));
            $nombreMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['nombreMedicamento']));
            $tipoMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['tipoMedicamento']));
            $unidadMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['unidadMedicamento']));
            $descMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['descMedicamento']));

            $created_user = $_SESSION['numeroDocumento'];


            $query = mysqli_query($mysqli, "INSERT INTO registrosmedicamentos(IdRegIcaMedicamento,NombreMedicamento,TipoMedicamento,unidadMedicamento,descMedicamento) 
                                            VALUES('$idRegIcaMedicamento','$nombreMedicamento','$tipoMedicamento','$unidadMedicamento','$descMedicamento')")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../../main.php?module=medicamento&alert=1");
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idRegIcaMedicamento'])) {

                $idRegIcaMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['idRegIcaMedicamento']));
                $nombreMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['nombreMedicamento']));
                $descMedicamento = mysqli_real_escape_string($mysqli, trim($_POST['descMedicamento']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE razas SET  nombreMedicamento = '$nombreMedicamento',
                                                                    descMedicamento = '$descMedicamento'
                                                              WHERE idRegIcaMedicamento = '$idRegIcaMedicamento'")
                    or die('error: ' . mysqli_error($mysqli));


                if ($query) {

                    header("location: ../../main.php?module=medicamento&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $idRegIcaMedicamento = $_GET['id'];
             
            
           //Medicamento-PesajeTernera
			/////////////////////////////////////////////////////////////
			$query = mysqli_query($mysqli, "SELECT rm.IdRegIcaMedicamento,pt.MedPTernera FROM registrosmedicamentos rm INNER JOIN pesajesterneras pt ON rm.IdRegIcaMedicamento=pt.MedPTernera")
            or die('error '.mysqli_error($mysqli));

            $medicamentoPTernera = mysqli_fetch_assoc($query);   
            /////////////////////////////////////////////////////////////

            if( $medicamentoPTernera['MedPTernera']==$idRegIcaMedicamento){
				header("location: ../../main.php?module=medicamento&alert=4");
			} 

            $query = mysqli_query($mysqli, "DELETE FROM registrosmedicamentos WHERE IdRegIcaMedicamento='$idRegIcaMedicamento'")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../../main.php?module=medicamento&alert=3");
            }
        }
    }
}
?>