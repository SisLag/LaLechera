
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])) {
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
} else {
    if ($_GET['act'] == 'insert') {
        if (isset($_POST['Guardar'])) {

            $chapetaAnimal = mysqli_real_escape_string($mysqli, trim($_POST['chapetaAnimal']));
            $nombreAnimal = mysqli_real_escape_string($mysqli, trim($_POST['nombreAnimal']));
            $fechNacimAnimal = mysqli_real_escape_string($mysqli, trim($_POST['fechNacimAnimal']));
            $madreAnimal = mysqli_real_escape_string($mysqli, trim($_POST['madreAnimal']));
            $padreAnimal = mysqli_real_escape_string($mysqli, trim($_POST['padreAnimal']));
            $razaAnimal = mysqli_real_escape_string($mysqli, trim($_POST['razaAnimal']));
            $servicioAnimal = mysqli_real_escape_string($mysqli, trim($_POST['servicioAnimal']));
            $tipoAnimal = mysqli_real_escape_string($mysqli, trim($_POST['tipoAnimal']));
            $observAnimal = mysqli_real_escape_string($mysqli, trim($_POST['observAnimal']));


            $created_user = $_SESSION['numeroDocumento'];

            if ($tipoAnimal == "1") {
                mysqli_query($mysqli, "INSERT INTO registrosanimmadres(IdVacaMadre,NombreVacaMadre) 
                                            VALUES('$chapetaAnimal','$nombreAnimal')")
                    or die('error ' . mysqli_error($mysqli));

            } else if ($tipoAnimal == "3") {
                mysqli_query($mysqli, "INSERT INTO registrosanimpadres(IdToroPadre,NombreToroPadre) 
                                            VALUES('$chapetaAnimal','$nombreAnimal')")
                    or die('error ' . mysqli_error($mysqli));
            }


            $query = mysqli_query($mysqli, "INSERT INTO registrosanimeles(ChapetaAnimal,NombreAnimal,FechNacimAnimal,MadreAnimal,PadreAnimal,RazaAnimal,ServicioAnimal,TipoAnimal,ObservAnimal) 
                                            VALUES('$chapetaAnimal','$nombreAnimal','$fechNacimAnimal','$madreAnimal','$padreAnimal','$razaAnimal','$servicioAnimal','$tipoAnimal','$observAnimal')")
                or die('error ' . mysqli_error($mysqli));


            if ($query) {

                header("location: ../../main.php?module=registroAnimal&alert=1");
            }

        }
    } elseif ($_GET['act'] == 'update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['chapetaAnimal'])) {

                $chapetaAnimal = mysqli_real_escape_string($mysqli, trim($_POST['chapetaAnimal']));
                $nombreAnimal = mysqli_real_escape_string($mysqli, trim($_POST['nombreAnimal']));
                $madreAnimal = mysqli_real_escape_string($mysqli, trim($_POST['madreAnimal']));
                $padreAnimal = mysqli_real_escape_string($mysqli, trim($_POST['padreAnimal']));
                $servicioAnimal = mysqli_real_escape_string($mysqli, trim($_POST['servicioAnimal']));
                $observAnimal = mysqli_real_escape_string($mysqli, trim($_POST['observAnimal']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE registrosanimeles SET  NombreAnimal = '$nombreAnimal',
                                                                    MadreAnimal = '$madreAnimal',
                                                                    PadreAnimal = '$padreAnimal',
																	ServicioAnimal = '$servicioAnimal',
																	observAnimal = '$observAnimal'
                                                              WHERE ChapetaAnimal = '$chapetaAnimal'")
                    or die('error: ' . mysqli_error($mysqli));


                if ($query) {

                    header("location: ../../main.php?module=registroAnimal&alert=2");
                }
            }
        }
    } elseif ($_GET['act'] == 'delete') {
        if (isset($_GET['id'])) {
            $chapetaAnimal = $_GET['id'];             
            
            //Animal-Cuarentena
            /////////////////////////////////////////////////////////////
            $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,cu.AnimCuarentena FROM registrosanimeles ra INNER JOIN cuarentenas cu ON ra.ChapetaAnimal=cu.AnimCuarentena where cu.AnimCuarentena = '$chapetaAnimal'")
                or die('error ' . mysqli_error($mysqli));

            $animalCuarentena = mysqli_fetch_assoc($query);
        ////////////////////////////////////////////////////////////
        //Animal-Servicio y Calor
        /////////////////////////////////////////////////////////////
            $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,sc.VacaSCalores FROM registrosanimeles ra INNER JOIN servicioscalores sc ON ra.ChapetaAnimal=sc.VacaSCalores where sc.VacaSCalores = '$chapetaAnimal'")
                or die('error ' . mysqli_error($mysqli));

            $vacaSCalores = mysqli_fetch_assoc($query);
    ////////////////////////////////////////////////////////////
    //Animal-Secado
        /////////////////////////////////////////////////////////////
            $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,s.VacaSecado FROM registrosanimeles ra INNER JOIN secados s ON ra.ChapetaAnimal=s.VacaSecado where s.VacaSecado = '$chapetaAnimal'")
                or die('error ' . mysqli_error($mysqli));

            $vacaSecado = mysqli_fetch_assoc($query);
    ////////////////////////////////////////////////////////////
    //Animal-Parto
        /////////////////////////////////////////////////////////////
            $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,p.VacaParto FROM registrosanimeles ra INNER JOIN partos p ON ra.ChapetaAnimal=p.VacaParto where p.VacaParto = '$chapetaAnimal'")
                or die('error ' . mysqli_error($mysqli));

            $vacaParto = mysqli_fetch_assoc($query);
    ////////////////////////////////////////////////////////////
     //Animal-Palpaciones
        /////////////////////////////////////////////////////////////
        $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,rp.VacaPalpacion FROM registrosanimeles ra INNER JOIN registrospalpaciones rp ON ra.ChapetaAnimal=rp.VacaPalpacion where rp.VacaPalpacion = '$chapetaAnimal'")
        or die('error ' . mysqli_error($mysqli));

    $vacaPalpacion = mysqli_fetch_assoc($query);
////////////////////////////////////////////////////////////
//Animal-Palpaciones
        /////////////////////////////////////////////////////////////
        $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,pt.AnimPTernera FROM registrosanimeles ra INNER JOIN pesajesterneras pt ON ra.ChapetaAnimal=pt.AnimPTernera where pt.AnimPTernera = '$chapetaAnimal'")
        or die('error ' . mysqli_error($mysqli));

    $animPTernera = mysqli_fetch_assoc($query);
////////////////////////////////////////////////////////////
//Animal-RegistroMadres
        /////////////////////////////////////////////////////////////
        $query = mysqli_query($mysqli, "SELECT ra.ChapetaAnimal,ram.IdVacaMadre FROM registrosanimeles ra INNER JOIN registrosanimmadres ram ON ra.ChapetaAnimal=ram.IdVacaMadre where ram.IdVacaMadre = '$chapetaAnimal'")
        or die('error ' . mysqli_error($mysqli));

    $animMadre = mysqli_fetch_assoc($query);
////////////////////////////////////////////////////////////

            if ($animalCuarentena['AnimCuarentena'] == $chapetaAnimal) {
                header("location: ../../main.php?module=registroAnimal&alert=4");
            } elseif ($vacaSCalores['VacaSCalores'] == $chapetaAnimal) {
                header("location: ../../main.php?module=registroAnimal&alert=4");
            } elseif ($vacaSecado['VacaSecado'] == $chapetaAnimal) {
                header("location: ../../main.php?module=registroAnimal&alert=4");
            } elseif ($vacaParto['VacaParto'] == $chapetaAnimal) {
                header("location: ../../main.php?module=registroAnimal&alert=4");
            } elseif ($vacaPalpacion['VacaPalpacion'] == $chapetaAnimal) {
                header("location: ../../main.php?module=registroAnimal&alert=4");
            }elseif ($animPTernera['AnimPTernera'] == $chapetaAnimal) {
                header("location: ../../main.php?module=registroAnimal&alert=4");
            }else {

                $query = mysqli_query($mysqli, "DELETE FROM registrosanimeles WHERE ChapetaAnimal='$chapetaAnimal'")
                    or die('error ' . mysqli_error($mysqli));

                    if ($animMadre['IdVacaMadre'] == $chapetaAnimal) {
                        mysqli_query($mysqli, "DELETE FROM registrosanimmadres WHERE IdVacaMadre='$chapetaAnimal'")
                        or die('error ' . mysqli_error($mysqli));
                    }
                    else if ($tipoAnimal == "3") {
                    mysqli_query($mysqli, "DELETE FROM registrosanimpadres WHERE IdToroPadre='$chapetaAnimal'")
                        or die('error ' . mysqli_error($mysqli));
                }


                if ($query) {

                    header("location: ../../main.php?module=registroAnimal&alert=3");
                }
            }
        }
    }
}
?>