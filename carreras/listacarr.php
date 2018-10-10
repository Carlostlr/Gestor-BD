<html>
<head></head>

<body background="../operaciones.jpg">>

<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");
// echo "<br><h2><b><center>CONEXIÓN REALIZADA CORRECTAMENTE.</center></b></h2></br>";
mysql_select_db("carreras",$conexion) or die("<br><h2><b><center>CONEXIÓN A LA BD NO REALIZADA.</center></b></h2></br>");
// echo "<br><h2><b><center>*** CONEXIÓN A LA BASE DE DATOS REALIZADA ***.</center></b></h2></br>";

$result=mysql_query("select * from carreras",$conexion);

echo "<center><h2><b><font color='white'>LISTADO DE LAS CARRERAS</font>";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Carrera</b></td>
	<td ><b>Premio</b></td>
	<td ><b>Fecha</b></td>
	<td ><b>Km</b></td>
	<td ><b>Tipo</b></td>
	<td ><b>Duracion</b></td>
	<td ><b>Circuito</b></td></tr>";


while ($fila=mysql_fetch_array($result))
{
	echo"<tr bgcolor='#FFFFF99'>";
	echo"<td>$fila[cod_carrera]</td>";
	echo"<td>$fila[premio]</td>";
	echo"<td>$fila[fech_realiza]</td>";
	echo"<td>$fila[km_a_recorrer]</td>";
	echo"<td>$fila[tipo_prue]</td>";
	echo"<td>$fila[duracion]</td>";
	echo"<td>$fila[cod_circuito]</td>";
	echo"</tr>";
}

echo"</table></center>";

$numero=mysql_num_rows($result);

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
//echo "<br><h2><b><center>CONEXIÓN CERRADA CORRECTAMENTE.</center></b></h2></br>";
	
?>

</body>
</html>
