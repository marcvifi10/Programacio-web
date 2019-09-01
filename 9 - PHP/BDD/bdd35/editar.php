<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
<link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

<h1>ACTUALIZAR</h1>

<?php

	include("conexion.php");
	
	if(!isset($_POST["bot_actualizar"]))
	{
		
		$ProductID=$_GET["ProductID"];
		
		$ProductName=$_GET["ProductName"];
		
		$SupplierID=$_GET["SupplierID"];
		
    $CategoryID=$_GET["CategoryID"];
    
    $QuantityPerUnit=$_GET["QuantityPerUnit"];

    $UnitPrice=$_GET["UnitPrice"];

    $UnitsOnOrder=$_GET["UnitsOnOrder"];

    $UnitsInStock=$_GET["dir"];

    $ReorderLevel=$_GET["ReorderLevel"];

    $Discontinued=$_GET["Discontinued"];
		
	}
	else
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
		
		$sql="UPDATE products SET ProductID=:ProductID, ProductName=:ProductName, SupplierID=:SupplierID,
          CategoryID=:CategoryID, QuantityPerUnit=:QuantityPerUnit, UnitPrice=:UnitPrice,
          UnitsOnOrder=:UnitsOnOrder, UnitsInStock=:UnitsInStock, ReorderLevel=:ReorderLevel,
          Discontinued=:Discontinued
          WHERE ProductID=:ProductID";
		
		$resultado=$base->prepare($sql);
		
    $resultado->execute(array(":ProductID"=>$ProductID, ":ProductName"=>$ProductName, 
                              ":SupplierID"=>$SupplierID, ":CategoryID"=>$CategoryID,
                              ":QuantityPerUnit"=>$QuantityPerUnit, ":UnitPrice"=>$UnitPrice,
                              ":UnitsOnOrder"=>$UnitsOnOrder, ":UnitsInStock"=>$UnitsInStock,
                              ":ReorderLevel"=>$ReorderLevel, ":Discontinued"=>$Discontinued));
		
		header("Location:index.php");
		
	}
	
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="ProductID"></label>
      <input type="hidden" name="ProductID" id="ProductID" value="<?php echo $ProductID ?>"></td>
    </tr>
    <tr>
      <td>ProductName</td>
      <td><label for="ProductName"></label>
      <input type="text" name="ProductName" id="ProductName" value="<?php echo $ProductName ?>"></td>
    </tr>
    <tr>
      <td>SupplierID</td>
      <td><label for="SupplierID"></label>
      <input type="text" name="SupplierID" id="SupplierID" value="<?php echo $SupplierID ?>"></td>
    </tr>
    <tr>
      <td>CategoryID</td>
      <td><label for="CategoryID"></label>
      <input type="text" name="CategoryID" id="CategoryID" value="<?php echo $CategoryID ?>"></td>
    </tr>
    <tr>
      <td>QuantityPerUnit</td>
      <td><label for="QuantityPerUnit"></label>
      <input type="text" name="QuantityPerUnit" id="QuantityPerUnit" value="<?php echo $QuantityPerUnit ?>"></td>
    </tr>
    <tr>
      <td>UnitPrice</td>
      <td><label for="UnitPrice"></label>
      <input type="text" name="UnitPrice" id="UnitPrice" value="<?php echo $UnitPrice ?>"></td>
    </tr>
    <tr>
      <td>UnitsOnOrder</td>
      <td><label for="UnitsOnOrder"></label>
      <input type="text" name="UnitsOnOrder" id="UnitsOnOrder" value="<?php echo $UnitsOnOrder ?>"></td>
    </tr>
    <tr>
      <td>UnitsInStock</td>
      <td><label for="UnitsInStock"></label>
      <input type="text" name="UnitsInStock" id="UnitsInStock" value="<?php echo $UnitsInStock ?>"></td>
    </tr>
    <tr>
      <td>ReorderLevel</td>
      <td><label for="ReorderLevel"></label>
      <input type="text" name="ReorderLevel" id="ReorderLevel" value="<?php echo $ReorderLevel ?>"></td>
    </tr>
    <tr>
      <td>CategoryID</td>
      <td><label for="Discontinued"></label>
      <input type="text" name="Discontinued" id="Discontinued" value="<?php echo $Discontinued ?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>