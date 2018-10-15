
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['idCuarentena']));
            $animCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['animCuarentena']));
            $fechIngresoCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['fechIngresoCuarentena']));
			$fechSalidaCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['fechSalidaCuarentena']));
            $numAnimalCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['numAnimalCuarentena']));
            $motivoIngresoCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['motivoIngresoCuarentena']));
			$diagPresuntCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['diagPresuntCuarentena']));
            $desinfCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['desinfCuarentena']));
            $prodDesinfecCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['prodDesinfecCuarentena']));			
            $encargadoCuarenten = $_SESSION['numeroDocumento'];

            $query = mysqli_query($mysqli, "SELECT IdCuarentena FROM cuarentenas WHERE IdCuarentena=$idCuarentena")
			or die('error: ' . mysqli_error($mysqli));
		  $data = mysqli_fetch_assoc($query);

			if($data['IdCuarentena'] == $idCuarentena){
				header("location: ../../main.php?module=cuarentena&alert=4");
            }else{              
            $query = mysqli_query($mysqli, "INSERT INTO cuarentenas(IdCuarentena,AnimCuarentena,FechIngresoCuarentena,FechSalidaCuarentena,NumAnimalCuarentena,MotivoIngresoCuarentena,DiagPresuntCuarentena,DesinfCuarentena,ProdDesinfecCuarentena,EncargadoCuarenten) 
                                            VALUES('$idCuarentena','$animCuarentena','$fechIngresoCuarentena','$fechSalidaCuarentena','$numAnimalCuarentena','$motivoIngresoCuarentena','$diagPresuntCuarentena','$desinfCuarentena','$prodDesinfecCuarentena','$encargadoCuarenten')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=cuarentena&alert=1");
            }  
        } 
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idCuarentena'])) {
        
                $idCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['idCuarentena']));
				$fechSalidaCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['fechSalidaCuarentena']));
				$motivoIngresoCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['motivoIngresoCuarentena']));
				$diagPresuntCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['diagPresuntCuarentena']));
				$desinfCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['desinfCuarentena']));
				$prodDesinfecCuarentena = mysqli_real_escape_string($mysqli, trim($_POST['prodDesinfecCuarentena']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE cuarentenas SET  fechSalidaCuarentena = '$fechSalidaCuarentena',
                                                                    motivoIngresoCuarentena = '$motivoIngresoCuarentena',
                                                                    diagPresuntCuarentena = '$diagPresuntCuarentena',
																	desinfCuarentena = '$desinfCuarentena',
                                                                    prodDesinfecCuarentena = '$prodDesinfecCuarentena'
                                                              WHERE IdCuarentena = '$idCuarentena'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=cuarentena&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idCuarentena = $_GET['id'];
      
            $query = mysqli_query($mysqli, "DELETE FROM cuarentenas WHERE IdCuarentena='$idCuarentena'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=cuarentena&alert=3");
            }
        }
    }       
}       
?>