<html>
<head> <title>consulta 9 </title></head>

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

$result=mysql_query("SELECT nombre
  FROM paises
 WHERE codigo_cir IN
             (SELECT cod_circuito
                FROM circuitos
               WHERE cod_circuito IN (SELECT cod_circuito
                            			    FROM carreras
                            				  WHERE fech_realiza = '15-03-24'
                            			    AND cod_carrera IN(SELECT cod_carrera
                                            						 FROM equipos
                                          							 WHERE cod_equipo IN (SELECT cod_equipo
                                                        										  FROM personal
                                                     											    WHERE nombre_per='tamara'))));",$conexion);

echo "<center><h2><b><font color='white'>El pais del circuito en el que corrio tamara el dia 24-03-15.</font><br/><br/><br/>
";
echo "<table witch='500' border='0'>";
echo "<tr bordercolor='#CCFFOO' bgcolor='#CCFFOO'>
	<td ><b>Nombre</b></td></tr>";


while ($fila=mysql_fetch_array($result))
{
	echo"<tr bgcolor='#FFFFF99'>";
	echo"<td>$fila[0]</td>";
	echo"</tr>";
}

echo"</table></center>";

$numero=mysql_num_rows($result);

mysql_close($conexion) or die ("NO SE PUDO CERRAR LA CONEXIÓN");
//echo "<br><h2><b><center>CONEXIÓN CERRADA CORRECTAMENTE.</center></b></h2></br>";
	
?>

</body>
</html>
