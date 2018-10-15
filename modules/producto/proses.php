
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['Guardar'])) {
     
            $regIcaProd = mysqli_real_escape_string($mysqli, trim($_POST['regIcaProd']));
            $nombreProd = mysqli_real_escape_string($mysqli, trim($_POST['nombreProd']));
            $tipoProd = mysqli_real_escape_string($mysqli, trim($_POST['tipoProd']));
			$unidadProd = mysqli_real_escape_string($mysqli, trim($_POST['unidadProd']));
			$nroLoteProd = mysqli_real_escape_string($mysqli, trim($_POST['nroLoteProd']));
			$encargadoProd = mysqli_real_escape_string($mysqli, trim($_POST['encargadoProd']));
			$descProd = mysqli_real_escape_string($mysqli, trim($_POST['descProd']));

            $created_user = $_SESSION['numeroDocumento'];

            $query = mysqli_query($mysqli, "SELECT RegIcaProd FROM registrosproductos WHERE RegIcaProd='$regIcaProd'")
			or die('error: ' . mysqli_error($mysqli));
		  $data = mysqli_fetch_assoc($query);

			if($data['RegIcaProd'] == $regIcaProd){
                header("location: ../../main.php?module=producto&alert=5");                   
            }
            $query = mysqli_query($mysqli, "SELECT NombreProd FROM registrosproductos WHERE NombreProd='$nombreProd'")
                or die('error: ' . mysqli_error($mysqli));
              $data = mysqli_fetch_assoc($query); 
            if($data['NombreProd'] == $nombreProd){
				header("location: ../../main.php?module=producto&alert=5");
			}else{  
            $query = mysqli_query($mysqli, "INSERT INTO registrosproductos(RegIcaProd,NombreProd,TipoProd,UnidadProd,NroLoteProd,EncargadoProd,DescProd) 
                                            VALUES('$regIcaProd','$nombreProd','$tipoProd','$unidadProd','$nroLoteProd','$encargadoProd','$descProd')")
                                            or die('error '.mysqli_error($mysqli));    

        
            if ($query) {
         
                header("location: ../../main.php?module=producto&alert=1");
            } 
        }  
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['Guardar'])) {
            if (isset($_POST['regIcaProd'])) {
        
                $regIcaProd = mysqli_real_escape_string($mysqli, trim($_POST['regIcaProd']));
				$nombreProd = mysqli_real_escape_string($mysqli, trim($_POST['nombreProd']));
				$descProd = mysqli_real_escape_string($mysqli, trim($_POST['descProd']));

                $updated_user = $_SESSION['id_user'];

                $query = mysqli_query($mysqli, "UPDATE registrosproductos SET  nombreProd = '$nombreProd',
                                                                    DescProd = '$descProd'
                                                              WHERE RegIcaProd = '$regIcaProd'")
                                                or die('error: '.mysqli_error($mysqli));

    
                if ($query) {
                  
                    header("location: ../../main.php?module=producto&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $regIcaProd = $_GET['id'];

            //Producto-Secado
        /////////////////////////////////////////////////////////////
        $query = mysqli_query($mysqli, "SELECT rp.RegIcaProd,sc.VermiSecado FROM registrosproductos rp INNER JOIN secados sc ON rp.RegIcaProd=sc.VermiSecado where sc.VermiSecado = '$regIcaProd'")
        or die('error ' . mysqli_error($mysqli));

    $VermiSecado = mysqli_fetch_assoc($query);
////////////////////////////////////////////////////////////

}if ($VermiSecado['VermiSecado'] == $regIcaProd) {
    header("location: ../../main.php?module=registroAnimal&alert=4");
}
      
            $query = mysqli_query($mysqli, "DELETE FROM registrosproductos WHERE RegIcaProd='$regIcaProd'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=producto&alert=3");
            }
        }  
}       
?>