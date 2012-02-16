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
<link type='text/css' href='css/osx.css' rel='stylesheet' media='screen' />
<script type='text/javascript' src='js/jquery.js'></script>
 
 

</head>
<body  >
<a href="#" class='osx' id="mensaje"></a>
 <div id="banner"><?php include("menu.php"); ?></div>
 <center>
 <div id="fondo">
    
 

<div id="recargado"> 
<?php 
if(!isset($_POST['eliminar_cliente'])){
	?>
<h2><?php e( 'Esta a punto de eliminar este cliente')?>.</h2>
<p id="textos">
 
<?php
 
 
    
$busqueda=$_GET['del'];
$consulta=mysql_query("SELECT * FROM clientes WHERE num_id='$busqueda'");
 $comprueba= mysql_fetch_array($consulta) ;
  $pais=$comprueba['pais'];
  $estado=$comprueba['estado'];
  $con_pais=mysql_query("SELECT * FROM lista_paises where id= '$pais' ");
  $comp_pais= mysql_fetch_array($con_pais);
  $con_estado=mysql_query("SELECT * FROM lista_estados where id= '$estado' ");
  $comp_estado= mysql_fetch_array($con_estado);
 
 
    
 ?>
</p> 
 
             <center>  
             <form method="post"  name="eliminar">  
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
	 <th align="right"> <?php e( ' Cuidad') ?> </th><th  ><?php echo  $comprueba['ciudad'] ;?> </th> <tr> <th></th>
     <th  >
     <br>
 <input type="hidden" name="eliminar_cliente" id="eliminar_cliente" value="<?php echo  $comprueba['num_id'] ;?>">
<a href="#" class="button left big" title="<?php e( 'Eliminar Cliente') ?>"  onClick="document.eliminar.submit()" >
<img src="iconos/minus32.png" border="0" width="35"><br /><?php e( 'Eliminar') ?></a>
 <a href="index.php"  class="button left big  "    ><img src="iconos/cerrar.png" border="0" width="35"><br /><?php e( 'Cerrar') ?></a>  </th>
   </table>  
   </form>
   </center> 
				 
			</div>
            <?php
}
else
{
	$eliminar=$_POST['eliminar_cliente'];
	if(mysql_query("DELETE FROM clientes WHERE num_id = '$eliminar'")){
        echo "<h2>";
 e( 'Eliminado con exito!!');
 echo ".</h2><br>";
  e( 'Este proceso ya no sera recuperado');
 echo "<br>";
    }else{
                echo "<h2>";
 e( 'No se Pudo Eliminar!!');
 echo ".</h2><br>";
  
 echo "<br>";
		echo mysql_error();
    }


}
?>

		</div> 
</center> 
 
 
</body>
</html>
 
 
 