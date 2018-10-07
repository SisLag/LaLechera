$(document).ready(function(){

  $("#btnInicio").click(function(){
    removeFrame();
    $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='bienvenido.php'></iframe>");
  });

  $("#btnAdministracion").click(function(){
    removeFrame();
    $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='1.Administracion/MenuAdministracion.php'></iframe>");
  });

  $("#btnServicios").click(function(){
    removeFrame();
    $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='2.Servicios/MenuServicios.php'></iframe>");
  });

  $("#btnMovimientos").click(function(){
    removeFrame();
    $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='3.Movimientos/MenuMovimientos.php'></iframe>");
  });

  $("#btnReportes").click(function(){
    removeFrame();
    $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='4.Reportes/MenuReportes.php'></iframe>");
  });

  $("#btnAyuda").click(function(){
    removeFrame();
    $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='5.Ayuda/MenuAyuda.php'></iframe>");
  });


  $("#customframe").append("<iframe style='height: 500px; width: 1100px' src='bienvenido.php'></iframe>");

  function removeFrame(){
    $("#customframe iframe").remove();
  }
});
