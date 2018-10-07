
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $idTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['idTratamiento']));
            $nombreTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['nombreTratamiento']));
			$enfermedadTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['enfermedadTratamiento']));
			$fechTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['fechTratamiento']));
			$tiempoRetTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['tiempoRetTratamiento']));
			$medTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['medTratamiento']));
			$labTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['labTratamiento']));
			$loteTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['loteTratamiento']));
			$dosisTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['dosisTratamiento']));
			$viaAplicTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['viaAplicTratamiento']));
			$encargadoTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['encargadoTratamiento']));
			$observTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['observTratamiento']));
			

            $created_user = $_SESSION['numeroDocumento'];

  
            $query = mysqli_query($mysqli, "INSERT INTO tratamientos(IdTratamiento,NombreTratamiento,EnfermedadTratamiento,FechTratamiento,TiempoRetTratamiento,MedTratamiento,LabTratamiento,LoteTratamiento,DosisTratamiento,ViaAplicTratamiento,EncargadoTratamiento,ObservTratamiento) 
                                            VALUES('$idTratamiento','$nombreTratamiento','$enfermedadTratamiento','$fechTratamiento','$tiempoRetTratamiento','$medTratamiento','$labTratamiento','$loteTratamiento','$dosisTratamiento','$viaAplicTratamiento','$encargadoTratamiento','$observTratamiento')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=tratamiento&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['idTratamiento'])) {
        
                $idTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['idTratamiento']));
				$nombreTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['nombreTratamiento']));
				$enfermedadTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['enfermedadTratamiento']));
				$tiempoRetTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['tiempoRetTratamiento']));
				$labTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['labTratamiento']));
				$viaAplicTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['viaAplicTratamiento']));
				$observTratamiento = mysqli_real_escape_string($mysqli, trim($_POST['observTratamiento']));

                $updated_user = $_SESSION['numeroDocumento'];

                $query = mysqli_query($mysqli, "UPDATE tratamientos SET  NombreTratamiento = '$nombreTratamiento',
                                                                    EnfermedadTratamiento = '$enfermedadTratamiento',
                                                                    TiempoRetTratamiento = '$tiempoRetTratamiento',
																	LabTratamiento = '$labTratamiento',
                                                                    ViaAplicTratamiento = '$viaAplicTratamiento',
                                                                    ObservTratamiento = '$observTratamiento'
                                                              WHERE IdTratamiento = '$idTratamiento'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=tratamiento&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $idTratamiento = $_GET['id'];
            //Tratamiento-Secado
        /////////////////////////////////////////////////////////////
        $query = mysqli_query($mysqli, "SELECT tr.IdTratamiento,sc.TratamVacaSecado FROM tratamientos tr INNER JOIN secados sc ON tr.IdTratamiento=sc.TratamVacaSecado where sc.TratamVacaSecado = '$idTratamiento'")
        or die('error ' . mysqli_error($mysqli));

    $TratamVacaSecado = mysqli_fetch_assoc($query);
////////////////////////////////////////////////////////////

}if ($vacaSCalores['VacaSCalores'] == $chapetaAnimal) {
    header("location: ../../main.php?module=registroAnimal&alert=4");
}else{
  
            $query = mysqli_query($mysqli, "DELETE FROM tratamientos WHERE IdTratamiento='$idTratamiento'")
                                            or die('error '.mysqli_error($mysqli));

                                        


            if ($query) {
     
                header("location: ../../main.php?module=tratamiento&alert=3");
            }}
        }
          
}       
?>