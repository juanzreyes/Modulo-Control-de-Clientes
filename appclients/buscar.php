<?php
@session_start();
 if(isset($_SESSION["usuario"])){}
	 else{
		 echo '<script type="text/javascript">
  window.location="login.php";
</script> ';}
		 include('config.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title><?php echo $nombre_app; ?></title>

 
<link rel="stylesheet" type="text/css" href="css/estilo.css" >
<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery.autocomplete.js'></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
<script type="text/javascript">
  $().ready(function() {
    $("#course").autocomplete("auto_list.php", {
      width: 260,
      matchContains: true,
      selectFirst: false
    });
  });
</script>

</head>
<body  >
<a href="#" class='osx' id="mensaje"></a>
 <div id="banner"><?php include("menu.php"); ?></div>
 <center>
 <div id="fondo">
    
 

<div id="recargado"> 
<h2><?php e( 'Busqueda de Cliente')?></h2>
<p id="textos">
<form name="datos" method="post">
<table> 
 <th align="right"><?php e( 'Nombre Cliente') ?>: </th><th> <input type="text" name="course" id="course" /></th> 
 <tr>
 <th></th> 
<th >
<br />
<a href="#" onclick="document.datos.submit()" class="button left big"  title="<?php e( 'Buscar') ?>"  > <?php e( 'Buscar') ?></a></th>
    
   </table> 
</form> 
<?php
 
if(isset($_POST['course'])){
    
$busqueda=$_POST['course'];
$consulta=mysql_query("SELECT * FROM clientes WHERE nombre='$busqueda'");
if($comprueba= mysql_fetch_array($consulta)){
  $pais=$comprueba['pais'];
  $estado=$comprueba['estado'];
  $con_pais=mysql_query("SELECT * FROM lista_paises where id= '$pais' ");
  $comp_pais= mysql_fetch_array($con_pais);
  $con_estado=mysql_query("SELECT * FROM lista_estados where id= '$estado' ");
  $comp_estado= mysql_fetch_array($con_estado);
	?> 
    <body onLoad="$('#mensaje').trigger('click');">
	<?php
}
else
{
	echo "<center><br>Cliente no Encontrado</br></center>";
	
	} 
    }
 ?>
</p> 
 </div>
 <br> 
</div>
 <div id="osx-modal-content">
			<div id="osx-modal-title"><?php e( 'Control de Clientes by Juanz') ?></div>
			<div class="close"><a href="#" class="simplemodal-close">x</a></div>
			<div id="osx-modal-data">
				<h2><?php e( 'Cliente Consultado!') ?>  </h2>
             <center>   
     <table>
	<th></th>
	<th><img src="<?php echo  $comprueba['avatar'] ;?>" width="128" height="128"></th><tr>
  	<th  align="right" ><?php e( 'Tipo de Identificaci&oacute;n') ?>: </th>
 	<th><?php echo  $comprueba['tipo_id'] ;?> </th><tr>
 	<th align="right"><?php e( 'Numero de Identificaci&oacute;n') ?>: </th>
    <th> <?php echo  $comprueba['num_id'] ;?></th><tr>
 	<th align="right"><?php e( 'Nombre Completo') ?>:</th>
    <th> <?php echo  $comprueba['nombre'] ;?> </th><tr>
 	<th align="right"><?php e( 'Fecha de Nacimiento') ?>:  </th>
    <th><?php echo  $comprueba['fecha_nac'] ;?>  </th><tr>
 	<th align="right"> <?php e( 'Sexo') ?>:</th>
    <th  >  <?php echo  $comprueba['sexo'] ;?> </th><tr>
	<th align="right"> <?php e( 'Pais') ?>: </th> <th  ><?php echo  $comp_pais['opcion'];?></th><tr>
    <th align="right"><?php e( 'Departamento/estado') ?>: </th> <th  ><?php echo  $comp_estado['opcion'] ;?> </th><tr>
	 <th align="right"> <?php e( ' Cuidad') ?> </th><th  ><?php echo  $comprueba['ciudad'] ;?> </th> <tr> 
     <th colspan="2">
     <br>
<a href="editar.php?edit=<?php echo  $comprueba['num_id'] ;?>" class="button left big" title="<?php e( 'Modificar Cliente') ?>"  >
<img src="iconos/editar.png" border="0" width="35"><br /><?php e( 'Editar') ?></a> 
<a href="eliminar.php?del=<?php echo  $comprueba['num_id'] ;?>" class="button left big" title="<?php e( 'Eliminar Cliente') ?>"  >
<img src="iconos/eliminar.png" border="0" width="35"><br /><?php e( 'Eliminar') ?></a>
 <a href="#"  class="button left big simplemodal-close"    ><img src="iconos/cerrar.png" border="0" width="35"><br /><?php e( 'Cerrar') ?></a>  </th>
   </table>  </center> 
				<p>  <span>(<?php e( 'Para Cerrar Puede presione ESC') ?>)</span></p>
			</div>
		</div> 
</center> 
<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
<script type='text/javascript' src='js/osx.js'></script>
</body>
</html>