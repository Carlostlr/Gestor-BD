<?php
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);
?>
<html>
<body background="../operaciones.jpg">
<form action="altascarr.php" method="post" target=inferior />
<br/>
<h1><center><font color='white'>ENTRADA DE DATOS DE PAISES</font></h1>

<p><center>Codigo del pais: 
<input name="pais" type="text" size="5"/> </p>

<p>Nombre del pais : 
  <input name="nombre" type="text" size="15" />
</p>

<p>Transitabilidad : 
  <input name="trans" type="text" size="15" />
</p>

 <p>Codigo de circuito:
<select name=circu id=circu>
<?php
	$result=mysql_query("select * from paises",$conexion);
	$i=3;
	while ($fila=mysql_fetch_row($result))
	{
		echo "<option value=".$fila[$i].">".$fila[$i]."</option>\n";
	}
?>
</select></p> 


<input type="submit" name="insertar" value="Insertar pais" />
<input type="reset" name="cancelar" value="Cancelar entrada" /> 
<p>
</form>
</body>
</html>

<?
mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
?>