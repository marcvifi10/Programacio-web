<?php 
    
    $server = "localhost";
	$username = "root";
	$password = "";
    $databse = "proves";
    
    $nom = $_POST["nom"];
    $descripcio = $_POST["descripcio"];

	$con = new mysqli($server, $username, $password, $databse);

	if ($con->connect_error) 
	{

		die("Error: ".$con->connect_errno." ".$con->connect_error);

	}

    $con->query("SET NAMES 'utf8'");
    
    $sql = "INSERT INTO categories(CategoryName,Description) VALUES('".$nom."','".$descripcio."')";

    if($con->query($sql))
    {

        echo "DADES INTRODUIDES CORRECTAMENT!!!";

    }
    else
    {

        echo "ERROR!!! ".$con->error;

    }

    $con->close();

?>