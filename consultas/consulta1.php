<html>
<head> <title>CONSULTA 1</title></head>

<body background="../consulta.jpg">

<?
// Defino 3 variables con tres valores
$servidor="localhost";
$usuario="root";
$clave="1234";

$conexion=mysql_connect($servidor,$usuario,$clave) or die("NO PUDO CONECTARSE");
// echo "<br><h2><b><center>CONEXIÓN REALIZADA CORRECTAMENTE.</center></b></h2></br>";
mysql_select_db("carreras",$conexion) or die("<br><h2><b><center>CONEXIÓN A LA BD NO REALIZADA.</center></b></h2></br>");
// echo "<br><h2><b><center>*** CONEXIÓN A LA BASE DE DATOS REALIZADA ***.</center></b></h2></br>";

$result=mysql_query("SELECT equipos.nombre_equi, personal.nombre_per
  FROM equipos, personal
 WHERE equipos.cod_equipo IN (SELECT cod_carrera
                          FROM carreras
                         WHERE fech_realiza = '2015-03-24')
   AND personal.cargo = 'jefe'
   AND equipos.cod_equipo = personal.cod_equipo
ORDER BY equipos.nombre_equi DESC;",$conexion);

echo "<center><h2><b><font color='white'>Nombre del equipo que corrio el dia 24/03/2015, el nombre del jefe de los equipos y ordenado descendentemente.</font><br/><br/><br/>
";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Equipo</b></td>
	<td ><b>Personal</b></td></tr>";


while ($fila=mysql_fetch_array($result))
{
	echo"<tr bgcolor='#FFFFF99'>";
	echo"<td>$fila[0]</td>";
	echo"<td>$fila[1]</td>";
	echo"</tr>";
}

echo"</table></center>";

$numero=mysql_num_rows($result);

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
//echo "<br><h2><b><center>CONEXIÓN CERRADA CORRECTAMENTE.</center></b></h2></br>";
	
?>

</body>
</html>
