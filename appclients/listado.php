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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
 
<link rel="stylesheet" type="text/css" href="css/estilo.css" >
<script src="js/jquery-1.3.1.min.js" type="text/javascript"></script>
<script src="js/jquery.uitablefilter.js" type="text/javascript"></script>
<script language="javascript">
		$(function() {
		  theTable = $("#latabla");
		  $("#busquedas").keyup(function() {
			$.uiTableFilter(theTable, this.value);
		  });
		});
		</script>
</head>
<body  >
 
 <div id="banner"><?php include("menu.php"); ?></div>
 <center>
 <div id="fondo">


<div id="recargado"> 

<h2><?php e( 'Listado de Cliente')?></h2>
 
 
 
<?php
   
$consulta=mysql_query("SELECT * FROM clientes ");
 
	?> <div id="busqueda">
 	<?php e( 'Buscar')?>: <input type="text" id="busquedas" name="busquedas" value="" />
		</div>
 <br>
  <table border="1"  id="latabla" class="estilotabla">	
  
  <th>#</th>
  <th ><?php e( 'Tipo de ID') ?>: </th>
	 	<th  ><?php e( 'Numero ID') ?> </th>
	 	<th  ><?php e( 'Nombre Completo') ?></th>
  <th  ><?php e( 'Fecha de Nac.') ?>  </th>
  <th  > <?php e( 'Sexo') ?></th>
 <th  > <?php e( 'Pais') ?> </th> 
 <th ><?php e( 'Depto./estado') ?> </th> 
  <th > <?php e( ' Cuidad') ?> </th>  
  <th> </th><tr>
		
  <?php 
  $num=1;
  while ( $comprueba= mysql_fetch_array($consulta)) { 
  $pais=$comprueba['pais'];
  $estado=$comprueba['estado'];
  $con_pais=mysql_query("SELECT * FROM lista_paises where id= '$pais' ");
  $comp_pais= mysql_fetch_array($con_pais);
  $con_estado=mysql_query("SELECT * FROM lista_estados where id= '$estado' ");
  $comp_estado= mysql_fetch_array($con_estado);
  ?>
  
  <th><?php echo  $num ;?> </th>
 	<td><?php echo  $comprueba['tipo_id'] ;?> </td> 
     <td> <?php echo  $comprueba['num_id'] ;?></td> 
     <td> <?php echo  $comprueba['nombre'] ;?> </td> 
 	 <td><?php echo  $comprueba['fecha_nac'] ;?>  </td> 
 	 <td  >  <?php echo  $comprueba['sexo'] ;?> </td> 
	<td  ><?php echo  $comp_pais['opcion'] ;?></td> 
    <td  ><?php echo  $comp_estado['opcion'] ;?> </td> 
	<td><?php echo  $comprueba['ciudad'] ;?> </td>  
      <td>
      <a href="editar.php?edit=<?php echo  $comprueba['num_id'] ;?>" class="button left " title="<?php e( 'Modificar Cliente') ?>"  >
      <img src="iconos/editar.png" width="17" border="0"></a>
      <a href="eliminar.php?del=<?php echo  $comprueba['num_id'] ;?>" class="button left " title="<?php e( 'Eliminar Cliente') ?>"  >
      <img src="iconos/minus32.png" width="17"></a>
      </td><tr>
	 <?php 
	 $num=$num+1;;
	 }
	 ?>
   </table> 
 
 <br>
				
  
			</div>
		</div>
 
</center>
 
</body>
</html>