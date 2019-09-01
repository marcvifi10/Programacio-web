<?php

	include("conexion.php");
	
	$ProductID=$_GET["ProductID"];
	
	$base->query("DELETE FROM products WHERE ProductID='$Id'");
	
	header("Location:index.php");
	
?>