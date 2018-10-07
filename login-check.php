 .
<?php

require_once "config/database.php";

$usuarioEncargado = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['usuarioEncargado'])))));
$claveEncargado = md5(mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['claveEncargado']))))));

if (!ctype_alnum($usuarioEncargado) OR !ctype_alnum($claveEncargado)) {
	header("Location: index.php?alert=1");
}
else {

	$query = mysqli_query($mysqli, "SELECT * FROM encargados WHERE UsuarioEncargado='$usuarioEncargado' AND ClaveEncargado='$claveEncargado' AND status='activo'")
									or die('error'.mysqli_error($mysqli));
	$rows  = mysqli_num_rows($query);

	if ($rows > 0) {
		$data  = mysqli_fetch_assoc($query);

		session_start();
		$_SESSION['numeroDocumento']   = $data['NumeroDocumento'];
		$_SESSION['usuarioEncargado']  = $data['UsuarioEncargado'];
		$_SESSION['claveEncargado']  = $data['ClaveEncargado'];
		$_SESSION['nombreEncargado'] = $data['NombreEncargado'];
		$_SESSION['perfilEncargado'] = $data['PerfilEncargado'];
	
		header("Location: main.php?module=start");
	}


	else {
		header("Location: index.php?alert=1");
	}
}
?>