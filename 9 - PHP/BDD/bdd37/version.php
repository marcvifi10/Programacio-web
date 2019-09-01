<?php
	$bd = @new mysqli("localhost", "root", "");
	$bd->select_db("proves");
	$SupplierID = $_POST["SupplierID"];
	$sql = "SELECT SupplierID, CompanyName, ContactName, ContactTitle, Address, 
				City, Region, PostalCode, Country, Phone, Fax, HomePage
	 			FROM suppliers
				ORDER BY SupplierID";
	$reg = $bd->query($sql);
	$bd->close();
?>


<a  class="versionNueva "><button type="button" onclick="nuevaVersion()" class="btn-version btn btn-default navbar-btn">Nueva Versión</button></a>
<h2 >Llista de suppliers</h2>
<table class="highlight bordered tablaVersiones">
	<thead>
		<tr>
			<th onclick="">CompanyName</th>
			<th>ContactName</th>
			<th>ContactTitle</th>
			<th>Address</th>
			<th>City</th>
			<th>Region</th>
			<th>PostalCode</th>
			<th>Country</th>
			<th>Phone</th>
			<th>Fax</th>
			<th>HomePage</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['SupplierID'] ?>">
			<td class="CompanyName"><?=$row["CompanyName"] ?></td>
			<td class="ContactName"><?=$row["ContactName"] ?></td>
			<td class="ContactTitle"><?=$row["ContactTitle"] ?></td>
			<td class="Address"><?=$row["Address"] ?></td>
			<td class="City" ><?=$row["City"] ?></td>
			<td class="Region"><?=$row["Region"] ?></td>
			<td class="PostalCode"><?=$row["PostalCode"] ?></td>
			<td class="Country"><?=$row["Country"] ?></td>
			<td class="Phone"><?=$row["Phone"] ?></td>
			<td class="Fax"><?=$row["Fax"] ?></td>
			<td class="HomePage"><?=$row["HomePage"] ?></td>
			<td><a id="<?=$row['SupplierID'] ?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn amber darken-4"><i class="material-icons">edit</i></button></a>
			<a class="eliminarVersion" onclick="borrar(this)" id="<?=$row['SupplierID'] ?>"><button type="button" class="btn red darken-2"><i class="material-icons">delete</i></button></a></td>
		</tr>
	<?php }
	?>
</table>
