
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idRaza = mysqli_real_escape_string($mysqli, trim($_POST['idRaza']));
            $nombreRaza = mysqli_real_escape_string($mysqli, trim($_POST['nombreRaza']));
            $descripcionRaza = mysqli_real_escape_string($mysqli, trim($_POST['descripcionRaza']));

            $created_user = $_SESSION['numeroDocumento'];
  
            $query = mysqli_query($mysqli, "INSERT INTO razas(IdRaza,NombreRaza,DescripcionRaza,created_user,updated_user) 
                                            VALUES('$idRaza','$nombreRaza','$descripcionRaza','$created_user','$created_user')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=razas&alert=1");
            }  
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idRaza'])) {
        
                $idRaza  = mysqli_real_escape_string($mysqli, trim($_POST['idRaza']));
                $nombreRaza  = mysqli_real_escape_string($mysqli, trim($_POST['nombreRaza']));
                $descripcionRaza  = mysqli_real_escape_string($mysqli, trim($_POST['descripcionRaza']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE razas SET  NombreRaza = '$nombreRaza',
                                                                    DescripcionRaza = '$descripcionRaza',
                                                                    updated_user = '$updated_user'
                                                              WHERE IdRaza = '$idRaza'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=razas&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idRaza = $_GET['id'];
            //Raza-Animal
            /////////////////////////////////////////////////////////////
            $query = mysqli_query($mysqli, "SELECT ra.IdRaza,a.RazaAnimal FROM razas ra INNER JOIN registrosanimeles a ON ra.IdRaza=a.RazaAnimal where ra.IdRaza = '$idRaza'")
            or die('error ' . mysqli_error($mysqli));

        $data_id = mysqli_fetch_assoc($query);
        ////////////////////////////////////////////////////////////
        if ($data_id['RazaAnimal'] == $idRaza) {
            header("location: ../../main.php?module=razas&alert=4");
        }else{
      
            $query = mysqli_query($mysqli, "DELETE FROM razas WHERE IdRaza='$idRaza'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=razas&alert=3");
            }
        }
        }
    }       
}       
?>