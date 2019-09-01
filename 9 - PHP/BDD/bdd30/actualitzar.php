<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "proves";

    $con = new mysqli($host,$user,$password,$db_name);

    if($con->connect_errno)
    {

        die("Error: ".$con->connect_errno." ".$con->connect_error);

    }

    $id = $_GET["id"];

    $con->query("SET NAMES 'utf8'");

    $sql = "SELECT * FROM shippers WHERE ShipperID = '".$id."'";

    $result = $con->query($sql);

    while($row = $result->fetch_assoc())
    { 

?>
<html>
    <head>
        <title>MODIFICAR</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <script src="../jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>ACTUALITZAR</h1>
            <form action="index.php" method="post">
                <label>ID:</label><br>
                <input type="text" name="id" value="<?php echo $row["ShipperID"]; ?>">
                <br><br>
                <label>NOM DE L'EMPRESA:</label><br>
                <input type="text" name="nom" value="<?php echo $row["CompanyName"]; ?>">
                <br><br>
                <label>TELÉFON:</label><br>
                <input type="text" name="tel" value="<?php echo $row["Phone"]; ?>">
                <br><br>
                <input type="submit" value="Actualitzar">
            </form>
            <?php


                }

                $con->close();

            ?>
        </div>
    </body>
</html>