<?php
@session_start();
 if(isset($_SESSION["usuario"])){}
	 else{
		 echo '<script type="text/javascript">
  window.location="login.php";
</script> ';}
		 include('config.php');
?>

 
<html>
<head>
<title><?php echo $nombre_app; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" > 
<link rel="stylesheet" type="text/css" href="css/estilo.css" > 
<script type='text/javascript' src='js/jquery.js'></script>
 <script type="text/javascript" src="js/jquery.maskedinput-1.3.js"></script>
 <script type="text/javascript" src="js/select_dependientes.js"></script>
      <script type="text/javascript">
	  jQuery(function($){
   $("#date").mask("99/99/9999");
   $("#phone").mask("(999) 999-9999");
   $("#tin").mask("99-9999999");
   $("#ssn").mask("999-99-9999");
});
 
</script>
 
 <?php
include('funciones.php');
?>

</head>
<body  onLoad="inicio()" >
  
 <div id="banner"><?php include("menu.php"); ?></div>
 <center>
 <div id="fondo"> 
<div id="recargado"> 



<?php
 //Comprueba si se ha echo post a Editar
if(isset($_POST['num_id'])){
	 
	//Condiciones para los combos
	if ( empty($_POST['sexo'])){$sexo=$_POST['sexox'];}else{$sexo=$_POST['sexo'];}
	if ( $_POST['paises']==0  ){$pais=$_POST['cod_pais'];}else{$pais=$_POST['paises'];}
	if ( $_POST['estados']==0 ){$estado=$_POST['cod_estado'];}else{$estado=$_POST['estados'];}
 	
    if(mysql_query("UPDATE clientes SET avatar='$_POST[avatar]', tipo_id='$_POST[tipo_id]', num_id='$_POST[num_id]', nombre='$_POST[nombre]', fecha_nac='$_POST[fecha_nac]', sexo='$sexo', pais='$pais', estado='$estado', ciudad='$_POST[ciudad]' where num_id='$_POST[num_id]'")){
       
        e('Actualizado Exitosamente!');    
        
    } 
}

else {
	
	
$editar= $_GET['edit'];
$consulta=mysql_query("SELECT * FROM clientes WHERE num_id='$editar'");
$comprueba= mysql_fetch_array($consulta);
 $pais=$comprueba['pais'];
  $estado=$comprueba['estado'];
  $con_pais=mysql_query("SELECT * FROM lista_paises where id= '$pais' ");
  $comp_pais= mysql_fetch_array($con_pais);
  $con_estado=mysql_query("SELECT * FROM lista_estados where id= '$estado' ");
  $comp_estado= mysql_fetch_array($con_estado);
  
  function generaPaises()
{ 
 
	$consulta=mysql_query("SELECT id, opcion FROM lista_paises");
	  
	echo "<select name='paises' id='paises' onChange='cargaContenido(this.id)'>";
	
	echo " <option value='0'>";
	  echo "Seccionar";
	 echo "</option>";
	while($registro=mysql_fetch_row($consulta))
	{
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}
	 
	echo "</select>";
}
  
?>
<script type="text/javascript">
document.getElementById('paises').selectedIndex=<?php echo $comp_pais['opcion']; ?>;
</script>
 
<h2><?php e( 'Actualizacion de Datos')?></h2>
<p id="textos">
<form name="datos" method="post">
<table>
<th></th><th align="left"><img src="<?php echo $comprueba['avatar']; ?>" name="imgavatar" id="imgavatar" width="100"></th><tr>
<th align="right"><?php e( 'Avatar') ?>:</th><th align="left"> 
<select name="avatar" id="avatar" onChange="cambiar()">
<option value="<?php echo $comprueba['avatar']; ?>"><?php e( 'Defecto')?></option>
  <option value="avatars/1.png"> <?php e( 'Dise&ntilde;ador') ?></option>
  <option  value="avatars/2.png"> <?php e( 'Estudiante Chica') ?></option>
  <option   value="avatars/3.png"> <?php e( 'Estudiante Chico') ?></option>
   <option   value="avatars/4.png"><?php e( 'Se&ntilde;ora') ?> </option>
      <option   value="avatars/5.png"><?php e( 'Doctora') ?></option>
         <option   value="avatars/6.png"> <?php e( 'Chica') ?></option>
            <option   value="avatars/7.png"> <?php e( 'Soldado') ?></option>
               <option   value="avatars/8.png"> <?php e( 'Anonimo') ?></option>
                  <option   value="avatars/9.png"> <?php e( 'Mujer Policia') ?></option>
                     <option   value="avatars/10.png"><?php e( 'Se&ntilde;or') ?> </option>

</select></th><tr>  
 <th align="right"><?php e( 'Tipo de Identificaci&oacute;n') ?>: </th><th align="left"> 
 <input type="text" id="tipo_id" value="<?php echo $comprueba['tipo_id']; ?>" name="tipo_id"/></th><tr>
 	<th align="right"><?php e( 'Numero de Identificaci&oacute;n') ?>: </th><th align="left">
    <input type="text" id="num_id" name="num_id" value="<?php echo $comprueba['num_id']; ?>"/ readonly></th><tr>
 	<th align="right"><?php e( 'Nombre Completo') ?>:</th><th align="left"> 
        <input type="text" id="nombre" name="nombre" value="<?php echo $comprueba['nombre']; ?>"/></th><tr>
 	<th align="right"><?php e( 'Fecha de Nacimiento') ?>:  </th><th align="left">
    <input type="text" id="date" value="<?php echo $comprueba['fecha_nac']; ?>" name="fecha_nac"/> </th><tr>
 <th align="right"> <?php e( 'Sexo') ?>:</th>
 <th align="left"> 
 
 
 <input type="text" id="sexox" name="sexox"  value="<?php echo $comprueba['sexo']; ?>"  readonly  >    
  <a href="#" onClick="activar1()" ><img src="iconos/editar.png" width="14" border="0" id="img1"></a>  
  
  <select id="sexo"  name="sexo"    >
   <option  ></option>
  <option value="<?php e( 'Masculino')?>"><?php e( 'Masculino') ?></option>
   <option value="<?php e( 'Femenino')?>"> <?php e( 'Femenino') ?> </option>
   </select>  </th><tr>
   <th align="right"> <?php e( 'Pais') ?>: </th>
   <th align="left">
   <label>
 
 
   <input type="text" id="paisx" name="paisx"  value="<?php echo $comp_pais['opcion']; ?>"/ readonly >
    <input type="hidden" id="cod_pais" name="cod_pais"  value="<?php echo $comp_pais['id']; ?>"/  >
   </label>
   <label><a href="#" onClick="activar2()" ><img src="iconos/editar.png" width="14" id="img2"></a> </label> 
   
   
   <label><?php generaPaises(); ?>  </label>
   </th><tr>
   <th align="right"><?php e( 'Departamento/estado') ?>: </th>
   <th align="left">
   <label>
  
  
   <input type="text" id="estadox" name="estadox" value="<?php echo $comp_estado['opcion']; ?>" readonly > 
    <input type="hidden" id="cod_estado" name="cod_estado"  value="<?php echo $comp_estado['id']; ?>"/  >
   </label>
   <label></label> 
  
  
  <label> <select  name="estados" id="estados" >
  <option value="0">Seccionar</option></select> </label>
 
   </th><tr>
 <th align="right"> <?php e( ' Ciudad') ?> </th>
 <th align="left" ><input type="text" id="ciudad" name="ciudad" value="<?php echo $comprueba['ciudad']; ?>"/></th><tr>
<th></th>
<th   > 
<br />
 


<a href="#" onClick="document.datos.submit()" class="button left big"  title="<?php e( 'Actualizar') ?>"  >
<img src="iconos/update.png" border="0" width="35"><br /><?php e( 'Actualizar') ?></a>
<a href="index.php"   class="button left big"  title="<?php e( 'Cancelar') ?>"  >
<img src="iconos/cerrar.png" border="0" width="35"><br /><?php e( 'Cancelar') ?></a>
</th>
    
   </table>

</form>


</p>
 <?php } ?>
 </div>
 
</div>
 
</center>
 
</body>
</html>
   
 
  