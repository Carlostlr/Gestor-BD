<?php
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);
?>
<html>
<body background="../operaciones.jpg">>
<form action="altascarr.php" method="post" target=inferior />
<h1><center><font color='white'>ENTRADA DE DATOS DE CARRERAS</font></h1>

<p><center>Numero carrera: 
<input name="carrera" type="text" size="5"/> </p>
<p>Premio : 
  <input name="premio" type="text" size="15" />
</p>
<p>Fecha:
 <input name="fecha" type="text" size="15"/> </p> 
 
 <p>Km:
 <input name="km" type="text" size="15"/> </p> 
 
 <p>Tipo:
 <input name="tipo" type="text" size="15"/> </p> 
 
 <p>Duracion:
 <input name="dura" type="text" size="15"/> </p> 
 
 <p>Circuito:
<select name=circu id=circu>
<?php
	$result=mysql_query("select * from circuitos",$conexion);
	$i=0;
	while ($fila=mysql_fetch_row($result))
	{
		echo "<option value=".$fila[$i].">".$fila[$i]."</option>\n";
	}
?>
</select></p> 

<input type="submit" name="insertar" value="Insertar carrera" />
<input type="reset" name="cancelar" value="Cancelar entrada" /> 
<p>
</form>
</body>
</html>

<?
mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
?>