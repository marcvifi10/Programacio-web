<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "proves";

    $con = new mysqli($host,$user,$password,$db_name);

    $nom = $_POST['nom'];

    $descripcio = $_POST["area"];

    // $descripcio = $_POST['Description'];

    if($con->connect_errno)
    {

        die("Error: ".$con->connect_errno." ".$con->connect_error);

    }

    $con->query("SET NAMES 'utf8'");

    $sql2 = "UPDATE categories 
    SET CategoryName = '".$nom."', Description='".$descripcio."' 
    WHERE CategoryID='1'";

    $result2 = $con->query($sql2);

    ///$category2 = $result2->fetch_assoc();

    header('Location:index.php');

    $con->close();

?>