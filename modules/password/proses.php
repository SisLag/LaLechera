
<?php
session_start();

require_once "../../config/database.php";


if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else {
    if (isset($_POST['Guardar'])) {
        if (isset($_SESSION['numeroDocumento'])) {

            $old_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
            $new_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
            $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));


            $numeroDocumento = $_SESSION['numeroDocumento'];


            $sql = mysqli_query($mysqli, "SELECT ClaveEncargado FROM encargados WHERE NumeroDocumento=$numeroDocumento")
                or die('error: ' . mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($sql);


            if ($old_pass != $data['ClaveEncargado']) {
                header("Location: ../../main.php?module=password&alert=1");
            } else {


                if ($new_pass != $retype_pass) {
                    header("Location: ../../main.php?module=password&alert=2");
                } else {

                    $query = mysqli_query($mysqli, "UPDATE encargados SET ClaveEncargado = '$new_pass'
                                                                  WHERE ClaveEncargado  = '$old_pass'")
                        or die('error : ' . mysqli_error($mysqli));


                    if ($query) {

                        header("location: ../../main.php?module=password&alert=3");
                    }
                }
            }
        }
    }
}
?>