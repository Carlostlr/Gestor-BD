<?php
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);
?>
<html>
<body background="../operaciones.jpg">
<br/>
<form action="altascarr.php" method="post" target=inferior />
<h1><center><font color='white'>ENTRADA DE DATOS DE CIRCUITOS</font></h1>

<p><center>Codigo de circuito: 
<input name="circuito" type="text" size="5"/> </p>

<p>Km : 
  <input name="km" type="text" size="15" />
</p>
<p>Ciudad:
 <input name="ciudad" type="text" size="15"/> </p> 
 
 <p>Direccion:
 <input name="direccion" type="text" size="15"/> </p> 


<input type="submit" name="insertar" value="Insertar circuito" />
<input type="reset" name="cancelar" value="Cancelar entrada" /> 
<p>
</form>
</body>
</html>

<?
mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
?>