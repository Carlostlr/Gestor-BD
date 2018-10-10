<html>
<head> <title>consulta 3</title></head>

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

$result=mysql_query("select avg(carreras.premio),personal.nombre_per
from carreras,personal,equipos
where carreras.cod_circuito in (select cod_circuito
			    							 from circuitos
		            				 where cod_circuito in (select codigo_cir
						   									  from paises
					           								  where nombre='espana'))
and personal.cargo='piloto'
and carreras.cod_carrera=equipos.cod_carrera
and equipos.cod_equipo=personal.cod_equipo;",$conexion);

echo "<center><h2><b><font color='white'>Sacar la media de los premios que han recibido el equipos que corria en Espana y el nombre del piloto.</font><br/><br/><br/>
";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Media</b></td>
	<td ><b>Piloto</b></td></tr>";


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
