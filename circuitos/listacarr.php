<html>
<head> <title> Lista </title></head>

<body background="../operaciones.jpg">

<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");
// echo "<br><h2><b><center>CONEXI�N REALIZADA CORRECTAMENTE.</center></b></h2></br>";
mysql_select_db("carreras",$conexion) or die("<br><h2><b><center>CONEXI�N A LA BD NO REALIZADA.</center></b></h2></br>");
// echo "<br><h2><b><center>*** CONEXI�N A LA BASE DE DATOS REALIZADA ***.</center></b></h2></br>";

$result=mysql_query("select * from circuitos",$conexion);

echo "<center><h2><b><font color='white'>LISTADO DE LOS CIRCUITOS</font>";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Circuito</b></td>
	<td ><b>Km</b></td>
	<td ><b>Ciudad</b></td>
	<td ><b>Direccion</b></td></tr>";


while ($fila=mysql_fetch_array($result))
{
	echo"<tr bgcolor='#FFFFF99'>";
	echo"<td>$fila[cod_circuito]</td>";
	echo"<td>$fila[km]</td>";
	echo"<td>$fila[ciudad]</td>";
	echo"<td>$fila[direccion]</td>";
	echo"</tr>";
}

echo"</table></center>";

$numero=mysql_num_rows($result);

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXI�N");
//echo "<br><h2><b><center>CONEXI�N CERRADA CORRECTAMENTE.</center></b></h2></br>";
	
?>

</body>
</html>
