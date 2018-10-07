<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['usuarioEncargado']) && empty($_SESSION['claveEncargado'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}
	elseif ($_GET['module'] == 'reportes') {
		include "modules/reportes/view.php";
	}
	elseif ($_GET['module'] == 'perfil') {
		include "modules/perfil/view.php";
	}
	elseif ($_GET['module'] == 'form_perfil') {
		include "modules/perfil/form.php";
	}
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}
	elseif ($_GET['module'] == 'encargado') {
		include "modules/encargado/view.php";
	}
	elseif ($_GET['module'] == 'form_encargado') {
		include "modules/encargado/form.php";
	}
	elseif ($_GET['module'] == 'razas') {
		include "modules/razas/view.php";
	}
	elseif ($_GET['module'] == 'form_razas') {
		include "modules/razas/form.php";
	}
	elseif ($_GET['module'] == 'cuarentena') {
		include "modules/cuarentena/view.php";
	}
	elseif ($_GET['module'] == 'form_cuarentena') {
		include "modules/cuarentena/form.php";
	}
	elseif ($_GET['module'] == 'datoFinca') {
		include "modules/datoFinca/view.php";
	}
	elseif ($_GET['module'] == 'form_datoFinca') {
		include "modules/datoFinca/form.php";
	}
	elseif ($_GET['module'] == 'etapa') {
		include "modules/etapa/view.php";
	}
	elseif ($_GET['module'] == 'form_etapa') {
		include "modules/etapa/form.php";
	}
	elseif ($_GET['module'] == 'hojaVida') {
		include "modules/hojaVida/view.php";
	}
	elseif ($_GET['module'] == 'form_hojaVida') {
		include "modules/hojaVida/form.php";
	}
	elseif ($_GET['module'] == 'medicamento') {
		include "modules/medicamento/view.php";
	}
	elseif ($_GET['module'] == 'form_medicamento') {
		include "modules/medicamento/form.php";
	}
	elseif ($_GET['module'] == 'movimientoGanado') {
		include "modules/movimientoGanado/view.php";
	}
	elseif ($_GET['module'] == 'form_movimientoGanado') {
		include "modules/movimientoGanado/form.php";
	}
	elseif ($_GET['module'] == 'palpacion') {
		include "modules/palpacion/view.php";
	}
	elseif ($_GET['module'] == 'form_palpacion') {
		include "modules/palpacion/form.php";
	}
	elseif ($_GET['module'] == 'parto') {
		include "modules/parto/view.php";
	}
	elseif ($_GET['module'] == 'form_parto') {
		include "modules/parto/form.php";
	}
	elseif ($_GET['module'] == 'permisos') {
		include "modules/permisos/view.php";
	}
	elseif ($_GET['module'] == 'form_permisos') {
		include "modules/permisos/form.php";
	}
	elseif ($_GET['module'] == 'pesajeTernera') {
		include "modules/pesajeTernera/view.php";
	}
	elseif ($_GET['module'] == 'form_pesajeTernera') {
		include "modules/pesajeTernera/form.php";
	}
	elseif ($_GET['module'] == 'produccionDiaria') {
		include "modules/produccionDiaria/view.php";
	}
	elseif ($_GET['module'] == 'form_produccionDiaria') {
		include "modules/produccionDiaria/form.php";
	}
	elseif ($_GET['module'] == 'produccionVaca') {
		include "modules/produccionVaca/view.php";
	}
	elseif ($_GET['module'] == 'form_produccionVaca') {
		include "modules/produccionVaca/form.php";
	}
	elseif ($_GET['module'] == 'producto') {
		include "modules/producto/view.php";
	}
	elseif ($_GET['module'] == 'form_producto') {
		include "modules/producto/form.php";
	}
	elseif ($_GET['module'] == 'refrigeracion') {
		include "modules/refrigeracion/view.php";
	}
	elseif ($_GET['module'] == 'form_refrigeracion') {
		include "modules/refrigeracion/form.php";
	}
	elseif ($_GET['module'] == 'registroAlimento') {
		include "modules/registroAlimento/view.php";
	}
	elseif ($_GET['module'] == 'form_registroAlimento') {
		include "modules/registroAlimento/form.php";
	}
	elseif ($_GET['module'] == 'registroAnimal') {
		include "modules/registroAnimal/view.php";
	}
	elseif ($_GET['module'] == 'form_registroAnimal') {
		include "modules/registroAnimal/form.php";
	}
	elseif ($_GET['module'] == 'secado') {
		include "modules/secado/view.php";
	}
	elseif ($_GET['module'] == 'form_secado') {
		include "modules/secado/form.php";
	}
	elseif ($_GET['module'] == 'servicioCalor') {
		include "modules/servicioCalor/view.php";
	}
	elseif ($_GET['module'] == 'form_servicioCalor') {
		include "modules/servicioCalor/form.php";
	}
	elseif ($_GET['module'] == 'tratamiento') {
		include "modules/tratamiento/view.php";
	}
	elseif ($_GET['module'] == 'form_tratamiento') {
		include "modules/tratamiento/form.php";
	}
	
	elseif ($_GET['module'] == 'inventario_medicamentos') {
		include "modules/inventario_medicamentos/view.php";
	}

	elseif ($_GET['module'] == 'form_inventario_medicamentos') {
		include "modules/inventario_medicamentos/form.php";
	}
	elseif ($_GET['module'] == 'inventario_alimentos') {
		include "modules/inventario_alimentos/view.php";
	}

	elseif ($_GET['module'] == 'form_inventario_alimentos') {
		include "modules/inventario_alimentos/form.php";
	}
	elseif ($_GET['module'] == 'inventario_productos') {
		include "modules/inventario_productos/view.php";
	}

	elseif ($_GET['module'] == 'form_inventario_productos') {
		include "modules/inventario_productos/form.php";
	}
	elseif ($_GET['module'] == 'printEncargado') {
		include "modules/imprimibles/viewEncargado.php";
	}
	elseif ($_GET['module'] == 'printCuarentena') {
		include "modules/imprimibles/viewCuarentena.php";
	}
	elseif ($_GET['module'] == 'printDatoFinca') {
		include "modules/imprimibles/viewDatoFinca.php";
	}
	elseif ($_GET['module'] == 'printHojaVida') {
		include "modules/imprimibles/viewHojaVida.php";
	}
	elseif ($_GET['module'] == 'printMedicamento') {
		include "modules/imprimibles/viewMedicamento.php";
	}
	elseif ($_GET['module'] == 'printMovimientoGanado') {
		include "modules/imprimibles/viewMovimientoGanado.php";
	}
	elseif ($_GET['module'] == 'printPalpacion') {
		include "modules/imprimibles/viewPalpacion.php";
	}
	elseif ($_GET['module'] == 'printParto') {
		include "modules/imprimibles/viewParto.php";
	}
	elseif ($_GET['module'] == 'printPerfil') {
		include "modules/imprimibles/viewPerfil.php";
	}
	elseif ($_GET['module'] == 'printPesajeTernera') {
		include "modules/imprimibles/viewPesajeTernera.php";
	}
	elseif ($_GET['module'] == 'printProduccionDiaria') {
		include "modules/imprimibles/viewProduccionDiaria.php";
	}
	elseif ($_GET['module'] == 'printProduccionVaca') {
		include "modules/imprimibles/viewProduccionVaca.php";
	}
	elseif ($_GET['module'] == 'printProducto') {
		include "modules/imprimibles/viewProducto.php";
	}
	elseif ($_GET['module'] == 'printRazas') {
		include "modules/imprimibles/viewRazas.php";
	}
	elseif ($_GET['module'] == 'printRefrigeracion') {
		include "modules/imprimibles/viewRefrigeracion.php";
	}
	elseif ($_GET['module'] == 'printRegistroAlimento') {
		include "modules/imprimibles/viewRegistroAlimento.php";
	}
	elseif ($_GET['module'] == 'printRegistroAnimal') {
		include "modules/imprimibles/viewRegistroAnimal.php";
	}
	elseif ($_GET['module'] == 'printSecado') {
		include "modules/imprimibles/viewSecado.php";
	}
	elseif ($_GET['module'] == 'printServicioCalor') {
		include "modules/imprimibles/viewServicioCalor.php";
	}
	elseif ($_GET['module'] == 'printTratamiento') {
		include "modules/imprimibles/viewTratamiento.php";
	}
}
?>