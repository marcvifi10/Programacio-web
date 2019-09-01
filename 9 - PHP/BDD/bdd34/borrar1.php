<HTML>
<HEAD>
<TITLE>Borrar1.php</TITLE>
</HEAD>
<BODY>
<div align="center">
<h1>Borrar un registro</h1>
<br>

<?

$con = new mysqli("localhost","root","","proves");


echo '<FORM METHOD="POST" ACTION="borrar2.php">ProductName<br>';

$consulta = "Select ProductName From products";

$result = $con->query($consulta);

echo '<select name="nombre">';

while ($row=mysqli_fetch_array($result))

{echo '<option>'.$row["ProductName"];}

mysql_free_result($result);
?>

</select>
<br>
<INPUT TYPE="SUBMIT" value="Borrar">
</FORM>
</div>

</BODY>
</HTML>