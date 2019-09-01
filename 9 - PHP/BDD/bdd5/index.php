<!DOCTYPE html>
<html>
    <head>
        <title>bdd5</title>
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

            $sql = "SELECT * FROM customers LIMIT 20 OFFSET 40";

            $result = $con->query($sql);

            if($result->num_rows == 0)
            {

                echo "No s'han trobat dades";

            }
            else
            {

                echo "<br><br>";
                echo "<table border='1' align='center' width='1100px' style='background-color:skyblue'>";
                echo "<tr>";
                echo "<td align='center'><strong>ID</strong></td>";
                echo "<td align='center'><strong>CompanyName</strong></td>";
                echo "<td align='center'><strong>ContactName</strong></td>";
                echo "<td align='center'><strong>ContactTitle</strong></td>";
                echo "<td align='center'><strong>Adress</strong></td>";
                echo "<td align='center'><strong>City</strong></td>";
                echo "<td align='center'><strong>PostalCode</strong></td>";
                echo "<td align='center'><strong>Country</strong></td>";
                echo "</tr>";

                while($client = $result->fetch_assoc())
                {

                    echo "<tr>";
                    echo "<td>";
                    echo utf8_encode($client['CustomerID']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['CompanyName']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['ContactName']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['ContactTitle']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['Address']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['City']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['PostalCode']);
                    echo "</td>";
                    echo "<td height='50px'>";
                    echo utf8_encode($client['Country']);
                    echo "</td>";
                    echo "</tr>";
                    //echo $client["CompanyName"];

                }

                echo "</table>";
                echo "<br>";

            }

            $con->close();

        ?>
    </body>
</html>