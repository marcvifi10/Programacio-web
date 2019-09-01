<html>
    <head>
        <title>29</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <style>

            #fons
            {

                background-color: grey;

            }

        </style>
    </head>
    <body>
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

            $con->query("SET NAMES 'utf8'");

            $sql = "SELECT * FROM categories WHERE CategoryID=1";

            $result = $con->query($sql);

            $category = $result->fetch_assoc();
                
            $con->close();

        ?>
        <div id="fons" class="container">
            <br>
            <form method="post" action="update.php">
                <label>NOM:</label><br>
                <input type="text" name="nom" id="nom" value="<?php echo $category["CategoryName"]; ?>"><br><br>
                <label>DESCRIPCIÓ:</label><br>
                <textarea id="area" name="area"><?php echo $category["Description"]; ?></textarea><br><br>
                <input type="submit" class="btn btn-primary" value="Insertar">
            </form>
        </div>
    </body>
</html>