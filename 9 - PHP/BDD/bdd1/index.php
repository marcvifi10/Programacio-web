<!DOCTYPE html>
<html>
    <head>
        <title>bdd1</title>
        <meta charset="utf8">
    </head>
    <body>
        <?php

            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "proves";

            $con = new mysqli($host,$username,$password,$database);

            if($con->connect_error)
            {

                die("Error en la connexió: ".$con->connect_error);

            }

            $sql = "SELECT * FROM customers WHERE Country='UK'";

            $result = $con->query($sql);

            if($result->num_rows == 0)
            {

                echo "No s'han trobat dades";

            }
            else
            {

                echo "Trobats: ".$result->num_rows." clients.";

                while($client = $result->fetch_assoc())
                {

                    echo "<br><br>";
                    echo $client["CompanyName"];
                    echo "<br>";

                }

            }

            $con->close();

        ?>
    </body>
</html>