
<?php  

require_once "config/database.php";


$query = mysqli_query($mysqli, "SELECT en.NumeroDocumento, en.NombreEncargado, en.Foto, en.PerfilEncargado, pe.NombrePerfil FROM encargados en LEFT JOIN perfiles pe ON en.PerfilEncargado=pe.IdPerfil  WHERE en.NumeroDocumento='$_SESSION[numeroDocumento]'")
                                or die('error: '.mysqli_error($mysqli));


$data = mysqli_fetch_assoc($query);
?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 
  <?php  
  if ($data['Foto']=="") { ?>
    <img src="images/user/user-default.png" class="user-image" alt="User Image"/>
  <?php
  }
  else { ?>
    <img src="images/user/<?php echo $data['Foto']; ?>" class="user-image" alt="User Image"/>
  <?php
  }
  ?>

    <span class="hidden-xs"><?php echo $data['NombreEncargado']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">

    <li class="user-header">

      <?php  
      if ($data['Foto']=="") { ?>
        <img src="images/user/user-default.png" class="img-circle" alt="User Image"/>
      <?php
      }
      else { ?>
        <img src="images/user/<?php echo $data['Foto']; ?>" class="img-circle" alt="User Image"/>
      <?php
      }
      ?>

      <p>
        <?php echo $data['NombreEncargado']; ?>
        <small><?php echo $data['NombrePerfil']; ?></small>
      </p>
    </li>
    
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=perfil" class="btn btn-default btn-flat">Perfil</a>
      </div>

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Salir</a>
      </div>
    </li>
  </ul>
</li>