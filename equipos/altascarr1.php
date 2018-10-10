
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
<h1><center><font color='white'>ENTRADA DE DATOS DE EQUIPOS</font></h1>

<p><center>Codigo del equipo: 
<input name="equipo" type="text" size="5"/> </p>

<p>Nombre del equipo : 
  <input name="nombre" type="text" size="15" />
</p>

 <p>Codigo de carrera:
<select name=equi id=equi>
<?php
	$result=mysql_query("select * from equipos",$conexion);
	$i=2;
	while ($fila=mysql_fetch_row($result))
	{
		echo "<option value=".$fila[$i].">".$fila[$i]."</option>\n";
	}
?>
</select></p> 


<input type="submit" name="insertar" value="Insertar circuito" />
<input type="reset" name="cancelar" value="Cancelar entrada" /> 
<p>
</form>
</body>
</html>

<?
mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
?>