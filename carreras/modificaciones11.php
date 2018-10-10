
<body background="../operaciones.jpg">
<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$n=$_POST['carr'];
$a=$_POST['premio'];
$b=$_POST['fecha'];
$c=$_POST['km'];
$d=$_POST['tipo'];
$e=$_POST['duracion'];
$f=$_POST['circuito'];

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");

mysql_select_db("carreras",$conexion);

$result=mysql_query("update carreras set cod_carrera='$n',premio='$a', fech_realiza='$b', km_a_recorrer='$c', tipo_prue='$d', duracion='$e',
						 cod_circuito='$f' where cod_carrera='$n'",$conexion);
$filas=mysql_affected_rows($conexion);

if(mysql_errno($conexion)==0)
{
	echo "<center><h2><b><font color='white'> FILAS MODIFICADAS: $filas</font></b></h2></center>";
}
else
{
	$numeroERROR = mysql_errno($conexion);
	$descripcionERROR=mysql_error($conexion);
	echo "<h2><b>Nº de error: $numeroERROR * Descripcion: $descripcionERROR</b></h2>";
	
}


mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
	
	
?>
</body>
