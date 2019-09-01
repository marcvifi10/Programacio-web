<?php

    $bd = @new mysqli("localhost", "root", "");
    $bd->select_db("proves");

    $SupplierID = $_GET["SupplierID"];

    $sql = "DELETE FROM `suppliers` WHERE SupplierID = '$SupplierID'";

    $bd->query($sql);
    $bd->close();

?>
