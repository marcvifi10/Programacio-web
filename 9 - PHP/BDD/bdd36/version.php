<?php
	$bd = @new mysqli("localhost", "root", "");
	$bd->select_db("tienda");
	$sqlJOIN = "SELECT version.idVersion, juego.idJuego, ptl.idPlataforma, ed.idEdicion, dis.idDistribuidora, juego.nombreJuego, ed.nombreEdicion, ptl.nombrePlataforma, version.precio, version.stock, version.fechaSalida, dis.nombreDistribuidora
	 			FROM videojuego juego, versionjuego version, edicion ed , plataforma ptl, distribuidora dis
				where version.idEdicion = ed.idEdicion AND version.idJuego = juego.idJuego AND version.idPlataforma = ptl.idPlataforma AND version.idDistribuidora = dis.idDistribuidora ORDER BY version.idVersion ASC";
				/* ORDER BY `ptl`.`nombrePlataforma` $orden" */
	$reg = $bd->query($sqlJOIN);
	$bd->close();
?>


<a  class="versionNueva "><button type="button" onclick="nuevaVersion()" class="btn-version btn btn-default navbar-btn">Nova Versió</button></a>
<h2 >Llista de videojocs</h2>
<table class="highlight bordered tablaVersiones">
	<thead>
		<tr>
			<th onclick="">Nom</th>
			<th>Edició</th>
			<th>Plataforma</th>
			<th>Preu</th>
			<th>Stock</th>
			<th>Data de sortida</th>
			<th>Nom DistribuÏdora</th>
			<th>Acció</th>
		</tr>
	</thead>
	<?php while($row = mysqli_fetch_assoc($reg)){ ?>
		<tr id="parte_<?=$row['idVersion'] ?>">
			<td class="nombreJuegoTabla" id="<?=$row['idJuego'] ?>"><?=$row["nombreJuego"] ?></td>
			<td class="edicionTabla" id="<?=$row['idEdicion'] ?>"><?=$row["nombreEdicion"] ?></td>
			<td class="plataformaTabla" id="<?=$row['idPlataforma'] ?>"><?=$row["nombrePlataforma"] ?></td>
			<td class="precioTabla"><?=$row["precio"] ?></td>
			<td class="stockTabla" ><?=$row["stock"] ?></td>
			<td class="fechaSalidaTabla"><?=$row["fechaSalida"] ?></td>
			<td class="disTabla" id="<?=$row['idDistribuidora'] ?>"><?=$row["nombreDistribuidora"] ?></td>
			<td><a id="<?=$row['idVersion'] ?>" onclick="modificarVersion(this)" class="editar"><button type="button" class="btn amber darken-4"><i class="material-icons">edit</i></button></a>
			<a class="eliminarVersion" onclick="borrar(this)" id="<?=$row['idVersion'] ?>"><button type="button" class="btn red darken-2"><i class="material-icons">delete</i></button></a></td>
		</tr>
	<?php }
	?>
</table>
