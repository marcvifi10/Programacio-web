<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "proves";

    $CustomerID = $_POST["CustomerID"];
    $EmployeeID = $_POST["EmployeeID"];
    $OrderDate = $_POST["OrderDate"];
    $RequiredDate = $_POST["RequiredDate"];
    $ShippedDate = $_POST["ShippedDate"];
    $ShipVia = $_POST["ShipVia"];
    $Freight = $_POST["Freight"];
    $ShipName = $_POST["ShipName"];
    $ShipAddress = $_POST["ShipAddress"];
    $ShipCity = $_POST["ShipCity"];
    $ShipRegion = $_POST["ShipRegion"];
    $ShipPostalCode = $_POST["ShipPostalCode"];
    $ShipCountry = $_POST["ShipCountry"];


    $con = new mysqli($host,$username,$password,$database);

    if($con->connect_error)
    {

        die("Error en la connexió: ".$con->connect_error);

    }

    $con->query("SET NAMES 'utf8'");

    $sql = "INSERT INTO orders (CustomerID,EmployeeID,OrderDate,RequiredDate,
            ShippedDate,ShipVia,Freight,ShipName,ShipAddress,ShipCity,ShipRegion,
            ShipPostalCode,ShipCountry) 
            VALUES ('".$CustomerID."',".$EmployeeID.",".$OrderDate.",
            ".$RequiredDate.",".$ShippedDate.",".$ShipVia.",".$Freight.",
            '".$ShipName."','".$ShipAddress."','".$ShipCity."','".$ShipRegion."',
            '".$ShipPostalCode."','".$ShipCountry."')";

    $result = $con->query($sql);

    if($con->query($sql))
    {  

        header('Location: index.php');
        echo "Dades insertades correctament!!!";

    }
    else
    {

        echo "ERROR AL INSERTAR LES DADES!!!";

    }

    $con->close();

?>