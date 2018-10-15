
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['Guardar'])) {

            $regIcaAlimento = mysqli_real_escape_string($mysqli, trim($_POST['regIcaAlimento']));
            $nombreAlimento = mysqli_real_escape_string($mysqli, trim($_POST['nombreAlimento']));
            $tipoAlimento = mysqli_real_escape_string($mysqli, trim($_POST['tipoAlimento']));
            $unidadAlimento = mysqli_real_escape_string($mysqli, trim($_POST['unidadAlimento']));
            $nroLoteAlimento = mysqli_real_escape_string($mysqli, trim($_POST['nroLoteAlimento']));
            $encargadoAlimento = mysqli_real_escape_string($mysqli, trim($_POST['encargadoAlimento']));
            $descAlimento = mysqli_real_escape_string($mysqli, trim($_POST['descAlimento']));

            $created_user = $_SESSION['numeroDocumento'];

            $query = mysqli_query($mysqli, "SELECT RegIcaAlimento FROM registrosalimentos WHERE RegIcaAlimento='$regIcaAlimento'")
                or die('error: ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);

            if ($data['RegIcaAlimento'] == $regIcaAlimento) {
                header("location: ../../main.php?module=registroAlimento&alert=4");
            }
            $query = mysqli_query($mysqli, "SELECT NombreAlimento FROM registrosalimentos WHERE NombreAlimento='$nombreAlimento'")
                or die('error: ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($query);
            if ($data['NombreAlimento'] == $nombreAlimento) {
                header("location: ../../main.php?module=registroAlimento&alert=4");
            } else {

                $query = mysqli_query($mysqli, "INSERT INTO registrosalimentos(RegIcaAlimento,NombreAlimento,TipoAlimento,UnidadAlimento,NroLoteAlimento,EncargadoAlimento,DescAlimento) 
                                            VALUES('$regIcaAlimento','$nombreAlimento','$tipoAlimento','$unidadAlimento','$nroLoteAlimento','$encargadoAlimento','$descAlimento')")
                    or die('error ' . mysqli_error($mysqli));


                if ($query) {

                    header("location: ../../main.php?module=registroAlimento&alert=1");
                }
            }
        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['regIcaAlimento'])) {

                $regIcaAlimento = mysqli_real_escape_string($mysqli, trim($_POST['regIcaAlimento']));
                $nombreAlimento = mysqli_real_escape_string($mysqli, trim($_POST['nombreAlimento']));
                $descAlimento = mysqli_real_escape_string($mysqli, trim($_POST['descAlimento']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE registrosalimentos SET  NombreAlimento = '$nombreAlimento',
                                                                    DescAlimento = '$descAlimento'
                                                              WHERE RegIcaAlimento = '$regIcaAlimento'")
                    or die('error: ' . mysqli_error($mysqli));


                if ($query) {

                    header("location: ../../main.php?module=registroAlimento&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $regIcaAlimento = $_GET['id'];

            $query = mysqli_query($mysqli, "DELETE FROM registrosalimentos WHERE RegIcaAlimento='$regIcaAlimento'")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../../main.php?module=registroAlimento&alert=3");
            }
        }
    }
}
?>