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
<h1><center><font color='white'>ENTRADA DE DATOS DE PERSONAL</font></h1>
<br/>
<p><center>Codigo de persona: 
<input name="persona" type="text" size="5"/> </p>

<p>Nombre: 
  <input name="nombre" type="text" size="15" />
</p>

<p>Cargo: 
  <input name="cargo" type="text" size="15" />
</p>

<p>Jefe: 
  <input name="jefe" type="text" size="15" />
</p>

 <p>Codigo de equipo:
<select name=equi id=equi>
<?php
	$result=mysql_query("select * from equipos",$conexion);
	$i=0;
	while ($fila=mysql_fetch_row($result))
	{
		echo "<option value=".$fila[$i].">".$fila[$i]."</option>\n";
	}
?>
</select></p> 


<input type="submit" name="insertar" value="Insertar persona" />
<input type="reset" name="cancelar" value="Cancelar entrada" /> 
<p>
</form>
</body>
</html>

<?
mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
?>