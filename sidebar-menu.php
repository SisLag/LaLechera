<?php 
//en esta sesion se agregan los permisos de usuario.
if ($_SESSION['perfilEncargado']=='1') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=encargado"><i class="fa fa-circle-o"></i>Gestionar Usuarios</a></li>
				<li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
        		<li><a href="?module=datoFinca"><i class="fa fa-circle-o"></i>Datos Finca</a></li>
				
      		</ul>			
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=encargado"><i class="fa fa-circle-o"></i>Gestionar Usuarios</a></li>
				<li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
        		<li><a href="?module=datoFinca"><i class="fa fa-circle-o"></i>Datos Finca</a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=encargado"><i class="fa fa-circle-o"></i>Gestionar Usuarios</a></li>
				<li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
        		<li><a href="?module=datoFinca"><i class="fa fa-circle-o"></i>Datos Finca</a></li>
      		</ul>
    	</li>
    <?php
	}
	
	
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Animal</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=registroAnimal"><i class="fa fa-circle-o"></i>Registro de Animal</a></li>
        		<li><a href="?module=servicioCalor"><i class="fa fa-circle-o"></i>Servicios y calores</a></li>
				<li class="active"><a href="?module=secado"><i class="fa fa-circle-o"></i>Secado</a></li>
        		<li><a href="?module=parto"><i class="fa fa-circle-o"></i>Partos</a></li>
				<li><a href="?module=tratamiento"><i class="fa fa-circle-o"></i>Tratamientos</a></li>
				<li><a href="?module=razas"><i class="fa fa-circle-o"></i>Razas y Etapas</a></li>
				<li><a href="?module=palpacion"><i class="fa fa-circle-o"></i>Palpacion</a></li>
				<li><a href="?module=pesajeTernera"><i class="fa fa-circle-o"></i>Pesaje Ternera</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Potrero</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=hojaVida"><i class="fa fa-circle-o"></i>Hoja de Vida</a></li>
        		<li><a href="?module=cuarentena"><i class="fa fa-circle-o"></i>Cuarentena</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Leche</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=produccionDiaria"><i class="fa fa-circle-o"></i>Producción Diaria de Leche</a></li>
        		<li><a href="?module=produccionVaca"><i class="fa fa-circle-o"></i>Producción de Leche por Vaca</a></li>
				<li class="active"><a href="?module=refrigeracion"><i class="fa fa-circle-o"></i>Refrigeración</a></li>
      		</ul>
			</ul>
      		</ul>			
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Animal</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=registroAnimal"><i class="fa fa-circle-o"></i>Registro de Animal</a></li>
        		<li><a href="?module=servicioCalor"><i class="fa fa-circle-o"></i>Servicios y calores</a></li>
				<li class="active"><a href="?module=secado"><i class="fa fa-circle-o"></i>Secado</a></li>
        		<li><a href="?module=parto"><i class="fa fa-circle-o"></i>Partos</a></li>
				<li><a href="?module=tratamiento"><i class="fa fa-circle-o"></i>Tratamientos</a></li>
				<li><a href="?module=razas"><i class="fa fa-circle-o"></i>Razas y Etapas</a></li>
				<li><a href="?module=palpacion"><i class="fa fa-circle-o"></i>Palpacion</a></li>
				<li><a href="?module=pesajeTernera"><i class="fa fa-circle-o"></i>Pesaje Ternera</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Potrero</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=hojaVida"><i class="fa fa-circle-o"></i>Hoja de Vida</a></li>
        		<li><a href="?module=cuarentena"><i class="fa fa-circle-o"></i>Cuarentena</a></li>
      		</ul>
			</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Leche</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=produccionDiaria"><i class="fa fa-circle-o"></i>Producción Diaria de Leche</a></li>
        		<li><a href="?module=produccionVaca"><i class="fa fa-circle-o"></i>Producción de Leche por Vaca</a></li>
				<li class="active"><a href="?module=refrigeracion"><i class="fa fa-circle-o"></i>Refrigeración</a></li>
      		</ul>
			</ul>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Animal</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=registroAnimal"><i class="fa fa-circle-o"></i>Registro de Animal</a></li>
        		<li><a href="?module=servicioCalor"><i class="fa fa-circle-o"></i>Servicios y calores</a></li>
				<li class="active"><a href="?module=secado"><i class="fa fa-circle-o"></i>Secado</a></li>
        		<li><a href="?module=parto"><i class="fa fa-circle-o"></i>Partos</a></li>
				<li><a href="?module=tratamiento"><i class="fa fa-circle-o"></i>Tratamientos</a></li>
				<li><a href="?module=razas"><i class="fa fa-circle-o"></i>Razas y Etapas</a></li>
				<li><a href="?module=palpacion"><i class="fa fa-circle-o"></i>Palpacion</a></li>
				<li><a href="?module=pesajeTernera"><i class="fa fa-circle-o"></i>Pesaje Ternera</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Potrero</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=hojaVida"><i class="fa fa-circle-o"></i>Hoja de Vida</a></li>
        		<li><a href="?module=cuarentena"><i class="fa fa-circle-o"></i>Cuarentena</a></li>
      		</ul>
			
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Leche</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=produccionDiaria"><i class="fa fa-circle-o"></i>Producción Diaria de Leche</a></li>
        		<li><a href="?module=produccionVaca"><i class="fa fa-circle-o"></i>Producción de Leche por Vaca</a></li>
				<li class="active"><a href="?module=refrigeracion"><i class="fa fa-circle-o"></i>Refrigeración</a></li>
      		</ul>
			</ul>
      		</ul>
    	</li>
    <?php
	}
	
	
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Movimientos</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=movimientoGanado"><i class="fa fa-circle-o"></i>Entradas y Salidas de Ganado</a></li>
        		<li><a href="?module=medicamento"><i class="fa fa-circle-o"></i>Registro de Medicamentos</a></li>
				<li class="active"><a href="?module=producto"><i class="fa fa-circle-o"></i>Registro de Productos</a></li>
        		<li><a href="?module=registroAlimento"><i class="fa fa-circle-o"></i>Registro de Alimentos</a></li>
				<ul>
			</ul>
      		</ul>			
    	</li>
    <?php
	}
	
	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Movimientos</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=movimientoGanado"><i class="fa fa-circle-o"></i>Entradas y Salidas de Ganado</a></li>
        		<li><a href="?module=medicamento"><i class="fa fa-circle-o"></i>Registro de Medicamentos</a></li>
				<li class="active"><a href="?module=producto"><i class="fa fa-circle-o"></i>Registro de Productos</a></li>
        		<li><a href="?module=registroAlimento"><i class="fa fa-circle-o"></i>Registro de Alimentos</a></li>
				<ul>
			</ul>
      		</ul>	
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Movimientos</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=movimientoGanado"><i class="fa fa-circle-o"></i>Entradas y Salidas de Ganado</a></li>
        		<li><a href="?module=medicamento"><i class="fa fa-circle-o"></i>Registro de Medicamentos</a></li>
				<li class="active"><a href="?module=producto"><i class="fa fa-circle-o"></i>Registro de Productos</a></li>
        		<li><a href="?module=registroAlimento"><i class="fa fa-circle-o"></i>Registro de Alimentos</a></li>
				<ul>
			</ul>
      		</ul>	
    	</li>
    <?php
	}
  
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
        		<li><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de medicamentos</a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Reportes</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=stock_inventory"><i class="fa fa-circle-o"></i> Stock de Medicamentos </a></li>
        		<li class="active"><a href="?module=stock_report"><i class="fa fa-circle-o"></i> Registro de medicamentos </a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=inventario_medicamentos"><i class="fa fa-circle-o"></i> Inventario de Medicamentos</a></li>
        		<li><a href="?module=inventario_alimentos"><i class="fa fa-circle-o"></i> Inventario de Alimentos </a></li>
				<li><a href="?module=inventario_productos"><i class="fa fa-circle-o"></i> Inventario de Productos </a></li>
      		</ul>
    	</li>
    <?php
	}
	
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=inventario_medicamentos"><i class="fa fa-circle-o"></i> Inventario de Medicamentos</a></li>
        		<li><a href="?module=inventario_alimentos"><i class="fa fa-circle-o"></i> Inventario de Alimentos </a></li>
				<li><a href="?module=inventario_productos"><i class="fa fa-circle-o"></i> Inventario de Productos </a></li>
      		</ul>
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Inventario</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=inventario_medicamentos"><i class="fa fa-circle-o"></i> Inventario de Medicamentos</a></li>
        		<li><a href="?module=inventario_alimentos"><i class="fa fa-circle-o"></i> Inventario de Alimentos </a></li>
				<li><a href="?module=inventario_productos"><i class="fa fa-circle-o"></i> Inventario de Productos </a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
			<a href="?module=reportes">
				<i class="fa fa-file-text"></i> Reportes
			</a>
    	</li>
    
	<?php
	}
	?>
	</ul>
<?php
}

elseif ($_SESSION['perfilEncargado']=='2') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

	if ($_GET["module"]=="start") { 
		$active_home="active";
	} else {
		$active_home="";
	}
	?>
		<li class="<?php echo $active_home;?>">
			<a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
	  	</li>
	<?php
	
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
        		<li><a href="?module=datoFinca"><i class="fa fa-circle-o"></i>Datos Finca</a></li>
				
      		</ul>			
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
        		<li><a href="?module=datoFinca"><i class="fa fa-circle-o"></i>Datos Finca</a></li>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Administración</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<li class="active"><a href="?module=password"><i class="fa fa-circle-o"></i>Cambiar Contraseña</a></li>
        		<li><a href="?module=datoFinca"><i class="fa fa-circle-o"></i>Datos Finca</a></li>
      		</ul>
    	</li>
    <?php
	}
	
	
	if ($_GET["module"]=="stock_inventory") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Animal</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=registroAnimal"><i class="fa fa-circle-o"></i>Registro de Animal</a></li>
        		<li><a href="?module=servicioCalor"><i class="fa fa-circle-o"></i>Servicios y calores</a></li>
				<li class="active"><a href="?module=secado"><i class="fa fa-circle-o"></i>Secado</a></li>
        		<li><a href="?module=parto"><i class="fa fa-circle-o"></i>Partos</a></li>
				<li><a href="?module=tratamiento"><i class="fa fa-circle-o"></i>Tratamientos</a></li>
				<li><a href="?module=razas"><i class="fa fa-circle-o"></i>Razas y Etapas</a></li>
				<li><a href="?module=palpacion"><i class="fa fa-circle-o"></i>Palpacion</a></li>
				<li><a href="?module=pesajeTernera"><i class="fa fa-circle-o"></i>Pesaje Ternera</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Potrero</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=hojaVida"><i class="fa fa-circle-o"></i>Hoja de Vida</a></li>
        		<li><a href="?module=cuarentena"><i class="fa fa-circle-o"></i>Cuarentena</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Leche</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=produccionDiaria"><i class="fa fa-circle-o"></i>Producción Diaria de Leche</a></li>
        		<li><a href="?module=produccionVaca"><i class="fa fa-circle-o"></i>Producción de Leche por Vaca</a></li>
				<li class="active"><a href="?module=refrigeracion"><i class="fa fa-circle-o"></i>Refrigeración</a></li>
      		</ul>
			</ul>
      		</ul>			
    	</li>
    <?php
	}

	elseif ($_GET["module"]=="stock_report") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Animal</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=registroAnimal"><i class="fa fa-circle-o"></i>Registro de Animal</a></li>
        		<li><a href="?module=servicioCalor"><i class="fa fa-circle-o"></i>Servicios y calores</a></li>
				<li class="active"><a href="?module=secado"><i class="fa fa-circle-o"></i>Secado</a></li>
        		<li><a href="?module=parto"><i class="fa fa-circle-o"></i>Partos</a></li>
				<li><a href="?module=tratamiento"><i class="fa fa-circle-o"></i>Tratamientos</a></li>
				<li><a href="?module=razas"><i class="fa fa-circle-o"></i>Razas y Etapas</a></li>
				<li><a href="?module=palpacion"><i class="fa fa-circle-o"></i>Palpacion</a></li>
				<li><a href="?module=pesajeTernera"><i class="fa fa-circle-o"></i>Pesaje Ternera</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Potrero</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=hojaVida"><i class="fa fa-circle-o"></i>Hoja de Vida</a></li>
        		<li><a href="?module=cuarentena"><i class="fa fa-circle-o"></i>Cuarentena</a></li>
      		</ul>
			</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Leche</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=produccionDiaria"><i class="fa fa-circle-o"></i>Producción Diaria de Leche</a></li>
        		<li><a href="?module=produccionVaca"><i class="fa fa-circle-o"></i>Producción de Leche por Vaca</a></li>
				<li class="active"><a href="?module=refrigeracion"><i class="fa fa-circle-o"></i>Refrigeración</a></li>
      		</ul>
			</ul>
      		</ul>
    	</li>
    <?php
	}

	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Servicios</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
				<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Animal</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=registroAnimal"><i class="fa fa-circle-o"></i>Registro de Animal</a></li>
        		<li><a href="?module=servicioCalor"><i class="fa fa-circle-o"></i>Servicios y calores</a></li>
				<li class="active"><a href="?module=secado"><i class="fa fa-circle-o"></i>Secado</a></li>
        		<li><a href="?module=parto"><i class="fa fa-circle-o"></i>Partos</a></li>
				<li><a href="?module=tratamiento"><i class="fa fa-circle-o"></i>Tratamientos</a></li>
				<li><a href="?module=razas"><i class="fa fa-circle-o"></i>Razas y Etapas</a></li>
				<li><a href="?module=palpacion"><i class="fa fa-circle-o"></i>Palpacion</a></li>
				<li><a href="?module=pesajeTernera"><i class="fa fa-circle-o"></i>Pesaje Ternera</a></li>
      		</ul>
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Potrero</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=hojaVida"><i class="fa fa-circle-o"></i>Hoja de Vida</a></li>
        		<li><a href="?module=cuarentena"><i class="fa fa-circle-o"></i>Cuarentena</a></li>
      		</ul>
			
			</ul>
			
			<ul>
				<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Gestionar Leche</span> <i class="fa fa-angle-double-down pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=produccionDiaria"><i class="fa fa-circle-o"></i>Producción Diaria de Leche</a></li>
        		<li><a href="?module=produccionVaca"><i class="fa fa-circle-o"></i>Producción de Leche por Vaca</a></li>
				<li class="active"><a href="?module=refrigeracion"><i class="fa fa-circle-o"></i>Refrigeración</a></li>
      		</ul>
			</ul>
      		</ul>
    	</li>
    <?php
	}	
	  
	
	?>
	</ul>
<?php
}
if ($_SESSION['perfilEncargado']=='3') { ?>

    <ul class="sidebar-menu">
        <li class="header">MENU</li>

	<?php 

  if ($_GET["module"]=="start") { ?>
    <li class="active">
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  else { ?>
    <li>
      <a href="?module=start"><i class="fa fa-home"></i> Inicio </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="servicioCalor" || $_GET["module"]=="form_servicioCalor") { ?>
    <li class="active">
      <a href="?module=servicioCalor"><i class="fa fa-folder"></i> Datos de servicio Calor </a>
      </li>
  <?php
  }
  else { ?>
    <li>
      <a href="?module=servicioCalor"><i class="fa fa-folder"></i> Datos de servicio Calor </a>
      </li>
  <?php
  }
	?>
	</ul>
<?php
}
?>