<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CRUD</title>
<link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

<?php
	
	$base=new PDO('mysql:host=localhost; dbname=proves', 'root', '');
		
	$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	$base->exec("SET CHARACTER SET UTF8");
	
	//-----------------PAGINACIÓN-------------------------------
	$tamano_paginas = 3;
				
	if(isset($_GET["pagina"]))
	{
		if($_GET["pagina"]==1)
		{
			header("Location:index.php");
		}	
		else
		{
			$pagina=$_GET["pagina"];
		}
	}
	else
	{
		$pagina=1;
	}
				
	$pagina = 1;
				
	$empezar_desde = ($pagina-1)*$tamano_paginas;
				
	$sql_total="SELECT * FROM products";
				
	$resultado=$base->prepare($sql_total);
				
	$resultado->execute(array());
				
	$num_filas = $resultado->rowCount();
				
	$total_paginas = ceil($num_filas / $tamano_paginas);
	
	//----------------------------------------------------------

	$conexion=$base->query("SELECT * FROM products LIMIT $empezar_desde,$tamano_paginas");
	
	$registros=$conexion->fetchAll(PDO::FETCH_OBJ);
	
	//$registros=$base->query("SELECT * FROM DATOS_USUARIOS")->fetchAll(PDO::FETCH_OBJ);

	if(isset($_POST["cr"]))
	{
		$ProductID=$_GET["ProductID"];
		
		$ProductName=$_GET["ProductName"];
		
		$SupplierID=$_GET["SupplierID"];
		
    	$CategoryID=$_GET["CategoryID"];
    
    	$QuantityPerUnit=$_GET["QuantityPerUnit"];

    	$UnitPrice=$_GET["UnitPrice"];

    	$UnitsOnOrder=$_GET["UnitsOnOrder"];

    	$UnitsInStock=$_GET["UnitsInStock"];

    	$ReorderLevel=$_GET["ReorderLevel"];

		$Discontinued=$_GET["Discontinued"];
		

		//-------------------------------CONTINUAR A LA TARDA------------------------------------------
		
		$sql="INSERT INTO DATOS_USUARIOS (ProductName, SupplierID, CategoryID, QuantityPerUnit,
										  UnitPrice, UnitsOnOrder, UnitsInStock, ReorderLevel, Discontinued) 
										  VALUES
										  (:ProductName, :SupplierID, :CategoryID, :QuantityPerUnit,
										  :UnitPrice, :UnitsOnOrder, :UnitsInStock, :ReorderLevel, :Discontinued)";
	
		$resultado=$base->prepare($sql);
		
		$resultado->execute(array(":ProductName"=>$ProductName, 
                              ":SupplierID"=>$SupplierID, ":CategoryID"=>$CategoryID,
                              ":QuantityPerUnit"=>$QuantityPerUnit, ":UnitPrice"=>$UnitPrice,
                              ":UnitsOnOrder"=>$UnitsOnOrder, ":UnitsInStock"=>$UnitsInStock,
                              ":ReorderLevel"=>$ReorderLevel, ":Discontinued"=>$Discontinued));
		
		header("Location:index.php");
	}

?>

<h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">ProductID</td>
      <td class="primera_fila">ProductName</td>
      <td class="primera_fila">SupplierID</td>
      <td class="primera_fila">CategoryID</td>
	  <td class="primera_fila">QuantityPerUnit</td>
      <td class="primera_fila">UnitPrice</td>
      <td class="primera_fila">UnitsOnOrder</td>
      <td class="primera_fila">UnitsInStock</td>
	  <td class="primera_fila">ReorderLevel</td>
      <td class="primera_fila">Discontinued</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
   
   <?php
   
		foreach($registros as $persona):
		
	?>
		
   	<tr>
      <td><?php echo $persona->ProductID?></td>
      <td><?php echo $persona->ProductName?></td>
      <td><?php echo $persona->SupplierID?></td>
      <td><?php echo $persona->CategoryID?></td>
	  <td><?php echo $persona->QuantityPerUnit?></td>
      <td><?php echo $persona->UnitPrice?></td>
      <td><?php echo $persona->UnitsOnOrder?></td>
      <td><?php echo $persona->UnitsInStock?></td>
	  <td><?php echo $persona->ReorderLevel?></td>
      <td><?php echo $persona->Discontinued?></td>
 
      <td class="bot"><a href="borrar.php?ProductID=<?php echo $persona->ProductID?>"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="editar.php?ProductID=<?php echo $persona->ProductID?> 
	  									& ProductName=<?php echo $persona->ProductName?> 
										& SupplierID=<?php echo $persona->SupplierID?> 
										& CategoryID=<?php echo $persona->CategoryID?>
										& QuantityPerUnit=<?php echo $persona->QuantityPerUnit?>
										& UnitPrice=<?php echo $persona->UnitPrice?>
										& UnitsOnOrder=<?php echo $persona->UnitsOnOrder?>
										& UnitsInStock=<?php echo $persona->UnitsInStock?>
										& ReorderLevel=<?php echo $persona->ReorderLevel?>
										& Discontinued=<?php echo $persona->Discontinued?>">
					<input type='button' name='up' id='up' value='Actualizar'></a></td>
    </tr> 

	<?php
		
		endforeach;
		
	?>


	
	<tr>
	  <td></td>
      <td><input type='text' name='ProductName' size='10' class='centrado'></td>
      <td><input type='text' name='SupplierID' size='10' class='centrado'></td>
      <td><input type='text' name='CategoryID' size='10' class='centrado'></td>
	  <td><input type='text' name='QuantityPerUnit' size='10' class='centrado'></td>
      <td><input type='text' name='UnitPrice' size='10' class='centrado'></td>
      <td><input type='text' name='UnitsOnOrder' size='10' class='centrado'></td>
	  <td><input type='text' name='UnitsInStock' size='10' class='centrado'></td>
      <td><input type='text' name='ReorderLevel' size='10' class='centrado'></td>
      <td><input type='text' name='Discontinued' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
	</tr>    
	<tr>
		<td><?php
			/* --------------------------PAGINACION------------------ */
			
			for($i=1; $i<=$total_paginas; $i++)
			{
				echo "<br>";
				echo "<a href='?pagina=".$i."'>".$i."</a>  ";
			}
		?></td>
	</tr>
  </table>
</form>

<p>&nbsp;</p>
</body>
</html>