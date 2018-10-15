
<?php
session_start();

require_once "../../config/database.php";


if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {

	if ($_GET['act']=='insert') {
		if (isset($_POST['Guardar'])) {
			$numeroDocumento = mysqli_real_escape_string($mysqli, trim($_POST['numeroDocumento']));
			$nombreEncargado = mysqli_real_escape_string($mysqli, trim($_POST['nombreEncargado']));
			$apellido1Encargado = mysqli_real_escape_string($mysqli, trim($_POST['apellido1Encargado']));
			$apellido2Encargado = mysqli_real_escape_string($mysqli, trim($_POST['apellido2Encargado']));
			$usuarioEncargado = mysqli_real_escape_string($mysqli, trim($_POST['usuarioEncargado']));
			$claveEncargado  = md5(mysqli_real_escape_string($mysqli, trim($_POST['claveEncargado'])));
			$perfilEncargado = mysqli_real_escape_string($mysqli, trim($_POST['perfilEncargado']));
			
			$query = mysqli_query($mysqli, "SELECT NumeroDocumento FROM encargados WHERE NumeroDocumento=$numeroDocumento")
			or die('error: ' . mysqli_error($mysqli));
		  $data = mysqli_fetch_assoc($query);

			if($data['NumeroDocumento'] == $numeroDocumento){
				header("location: ../../main.php?module=encargado&alert=12");
			}

			$query = mysqli_query($mysqli, "SELECT UsuarioEncargado FROM encargados WHERE UsuarioEncargado='$usuarioEncargado'")
			or die('error: ' . mysqli_error($mysqli));
		  $data = mysqli_fetch_assoc($query);
			if($data['UsuarioEncargado'] == $usuarioEncargado){
				header("location: ../../main.php?module=encargado&alert=12");
			}
			else{
            $query = mysqli_query($mysqli, "INSERT INTO encargados(NumeroDocumento,NombreEncargado,Apellido1Encargado,Apellido2Encargado,UsuarioEncargado,ClaveEncargado,PerfilEncargado)
                                            VALUES('$numeroDocumento','$nombreEncargado','$apellido1Encargado','$apellido2Encargado','$usuarioEncargado','$claveEncargado','$perfilEncargado')")
                                            or die('error: '.mysqli_error($mysqli));    

          
            if ($query) {
                header("location: ../../main.php?module=encargado&alert=1");
			}
		}
		}	
	}
	
	elseif ($_GET['act']=='update') {
		if (isset($_POST['Guardar'])) {
			if (isset($_POST['numeroDocumento'])) {
				$numeroDocumento            = mysqli_real_escape_string($mysqli, trim($_POST['numeroDocumento']));
				$nombreEncargado           = mysqli_real_escape_string($mysqli, trim($_POST['nombreEncargado']));
				$apellido1Encargado           = mysqli_real_escape_string($mysqli, trim($_POST['apellido1Encargado']));
				$apellido2Encargado          = mysqli_real_escape_string($mysqli, trim($_POST['apellido2Encargado']));
				$correo              = mysqli_real_escape_string($mysqli, trim($_POST['correo']));
				$numeroContacto            = mysqli_real_escape_string($mysqli, trim($_POST['numeroContacto']));
				$perfilEncargado          = mysqli_real_escape_string($mysqli, trim($_POST['perfilEncargado']));
				
				$name_file          = $_FILES['foto']['name'];
				$ukuran_file        = $_FILES['foto']['size'];
				$tipe_file          = $_FILES['foto']['type'];
				$tmp_file           = $_FILES['foto']['tmp_name'];
				
		
				$allowed_extensions = array('jpg','jpeg','png');
				
			
				$path_file          = "../../images/user/".$name_file;
		
				$file               = explode(".", $name_file);
				$extension          = array_pop($file);

				if (empty($_POST['claveEncargado']) && empty($_FILES['foto']['name'])) {
					
                    $query = mysqli_query($mysqli, "UPDATE encargados SET NombreEncargado 	= '$nombreEncargado',
                    													Apellido1Encargado       = '$apellido1Encargado',
                    													Apellido2Encargado     = '$apellido2Encargado',
																		Correo     = '$correo',
																		NumeroContacto     = '$numeroContacto',
                    													PerfilEncargado   = '$perfilEncargado'
                                                                  WHERE NumeroDocumento 	= '$numeroDocumento'")
                                                    or die('error: '.mysqli_error($mysqli));

                
                    if ($query) {
                  
                        header("location: ../../main.php?module=encargado&alert=2");
                    }
				}
		
				elseif (!empty($_POST['claveEncargado']) && empty($_FILES['foto']['name'])) {
					
                    $query = mysqli_query($mysqli, "UPDATE encargados SET NombreEncargado 	= '$nombreEncargado',
                    													Apellido1Encargado 	= '$apellido1Encargado',
																		Apellido2Encargado     = '$apellido2Encargado',
                    													Correo       = '$correo',
                    													NumeroContacto     = '$numeroContacto',
                    													PerfilEncargado   = '$perfilEncargado'
                                                                  WHERE NumeroDocumento 	= '$numeroDocumento'")
                                                    or die('error : '.mysqli_error($mysqli));

             
                    if ($query) {
                    
                        header("location: ../../main.php?module=encargado&alert=2");
                    }
				}
				
				elseif (empty($_POST['claveEncargado']) && !empty($_FILES['foto']['name'])) {
			
					if (in_array($extension, $allowed_extensions)) {
	                
	                    if($ukuran_file <= 1000000) { 
	                        
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
                        		
			                    $query = mysqli_query($mysqli, "UPDATE encargados SET NombreEncargado 	= '$nombreEncargado',
                    													Apellido1Encargado 	= '$apellido1Encargado',
																		Apellido2Encargado     = '$apellido2Encargado',
                    													Correo       = '$correo',
                    													NumeroContacto     = '$numeroContacto',
																		Foto 		= '$name_file',
                    													PerfilEncargado   = '$perfilEncargado'
			                                                                  WHERE NumeroDocumento 	= '$numeroDocumento'")
			                                                    or die('error : '.mysqli_error($mysqli));

			                    if ($query) {
			                    
			                        header("location: ../../main.php?module=encargado&alert=2");
			                    }
                        	} else {
	                           
	                            header("location: ../../main.php?module=encargado&alert=5");
	                        }
	                    } else {
	                       
	                        header("location: ../../main.php?module=encargado&alert=6");
	                    }
	                } else {
	                   
	                    header("location: ../../main.php?module=encargado&alert=7");
	                } 
				}
				
				else {
					
					if (in_array($extension, $allowed_extensions)) {
	                   
	                    if($ukuran_file <= 1000000) { 
	                       
	                        if(move_uploaded_file($tmp_file, $path_file)) { 
                        		
			                    $query = mysqli_query($mysqli, "UPDATE encargados SET NombreEncargado 	= '$nombreEncargado',
                    													Apellido1Encargado 	= '$apellido1Encargado',
																		Apellido2Encargado     = '$apellido2Encargado',
                    													Correo       = '$correo',
                    													NumeroContacto     = '$numeroContacto',
																		Foto 		= '$name_file',
                    													PerfilEncargado   = '$perfilEncargado'
			                                                                  WHERE NumeroDocumento 	= '$numeroDocumento'")
			                                                    or die('error: '.mysqli_error($mysqli));

			                    
			                    if ($query) {
			                       
			                        header("location: ../../main.php?module=encargado&alert=2");
			                    }
                        	} else {
	                            
	                            header("location: ../../main.php?module=encargado&alert=5");
	                        }
	                    } else {
	                       
	                        header("location: ../../main.php?module=encargado&alert=6");
	                    }
	                } else {
	                
	                    header("location: ../../main.php?module=encargado&alert=7");
	                } 
				}
			}
		}
	}


	elseif ($_GET['act']=='on') {
		if (isset($_GET['id'])) {
			
			$numeroDocumento = $_GET['id'];
			$status  = "activo";

		
            $query = mysqli_query($mysqli, "UPDATE encargados SET status  = '$status'
                                                          WHERE NumeroDocumento = '$numeroDocumento'")
                                            or die('error: '.mysqli_error($mysqli));

  
            if ($query) {
               
                header("location: ../../main.php?module=encargado&alert=3");
            }
		}
	}


	elseif ($_GET['act']=='off') {
		if (isset($_GET['id'])) {
			
			$numeroDocumento = $_GET['id'];
			$status  = "bloqueado";

		
            $query = mysqli_query($mysqli, "UPDATE encargados SET status  = '$status'
                                                          WHERE NumeroDocumento = '$numeroDocumento'")
                                            or die('Error : '.mysqli_error($mysqli));

        
            if ($query) {
              
                header("location: ../../main.php?module=encargado&alert=4");
            }
		}
	}		

	
	
	elseif ($_GET['act']=='delete') {
					  
        if (isset($_GET['id'])) {
			$numeroDocumento = $_GET['id'];
			//Usuario-Producto
			/////////////////////////////////////////////////////////////
			$query = mysqli_query($mysqli, "SELECT en.NumeroDocumento,rp.EncargadoProd FROM encargados en INNER JOIN registrosproductos rp ON en.NumeroDocumento=rp.EncargadoProd where rp.EncargadoProd = $numeroDocumento")
                                            or die('error '.mysqli_error($mysqli));

			  $encargadoProd = mysqli_fetch_assoc($query);   
			/////////////////////////////////////////////////////////////
			//Usuario-Alimento
			/////////////////////////////////////////////////////////////
			$query = mysqli_query($mysqli, "SELECT en.NumeroDocumento,ra.EncargadoAlimento FROM encargados en INNER JOIN registrosalimentos ra ON en.NumeroDocumento=ra.EncargadoAlimento where ra.EncargadoAlimento = $numeroDocumento")
                                            or die('error '.mysqli_error($mysqli));

			  $encargadoAlimento = mysqli_fetch_assoc($query);   
			/////////////////////////////////////////////////////////////
			//Usuario-Servicio y Calor
			/////////////////////////////////////////////////////////////
			$query = mysqli_query($mysqli, "SELECT en.NumeroDocumento,sc.InseminSCalores FROM encargados en INNER JOIN servicioscalores sc ON en.NumeroDocumento=sc.InseminSCalores where sc.InseminSCalores = $numeroDocumento")
                                            or die('error '.mysqli_error($mysqli));

			  $inseminSCalores = mysqli_fetch_assoc($query);   
			/////////////////////////////////////////////////////////////
			//Usuario-Tratamiento
			/////////////////////////////////////////////////////////////
			$query = mysqli_query($mysqli, "SELECT en.NumeroDocumento,tr.EncargadoTratamiento FROM encargados en INNER JOIN tratamientos tr ON en.NumeroDocumento=tr.EncargadoTratamiento where tr.EncargadoTratamiento = $numeroDocumento")
                                            or die('error '.mysqli_error($mysqli));

			  $encargadoTratamiento = mysqli_fetch_assoc($query);   
			/////////////////////////////////////////////////////////////
			//Usuario-Refrigeracion
			/////////////////////////////////////////////////////////////
			$query = mysqli_query($mysqli, "SELECT en.NumeroDocumento,rf.EncargadoRefrigeracion FROM encargados en INNER JOIN refrigeraciones rf ON en.NumeroDocumento=rf.EncargadoRefrigeracion where rf.EncargadoRefrigeracion = $numeroDocumento")
                                            or die('error '.mysqli_error($mysqli));

			  $encargadoRefrigeracion = mysqli_fetch_assoc($query);   
			/////////////////////////////////////////////////////////////
			
			if ($numeroDocumento == '1111111111'){
				header("location: ../../main.php?module=encargado&alert=9");
			}   
			   
          
			elseif( $encargadoProd['EncargadoProd']==$numeroDocumento){
				header("location: ../../main.php?module=encargado&alert=11");
			}  
			elseif( $inseminSCalores['InseminSCalores']==$numeroDocumento){
				header("location: ../../main.php?module=encargado&alert=11");
			}  
			elseif( $encargadoTratamiento['EncargadoTratamiento']==$numeroDocumento){
				header("location: ../../main.php?module=encargado&alert=11");
			}
			elseif( $encargadoRefrigeracion['EncargadoRefrigeracion']==$numeroDocumento){
				header("location: ../../main.php?module=encargado&alert=11");
			}elseif( $encargadoAlimento['EncargadoAlimento']==$numeroDocumento){
				header("location: ../../main.php?module=encargado&alert=11");
			}    
            else {
				
				$query = mysqli_query($mysqli, "DELETE FROM encargados WHERE NumeroDocumento='$numeroDocumento'")
                                            or die('error '.mysqli_error($mysqli));


            if ($query) {
     
                header("location: ../../main.php?module=encargado&alert=8");
            }
			}
        }
    } 
}		
?>