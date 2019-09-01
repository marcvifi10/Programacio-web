<!DOCTYPE html>
<html>
    <head>
        <title>bdd14</title>
        <meta charset="utf8">
        <style>

            #camps
            {

                background-color: blue;
                color: white;
                
            }

        </style>
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

            $sql = "SELECT * FROM products WHERE ProductName LIKE '%Anton%'";

            $result = $con->query($sql);

            if($result->num_rows == 0)
            {

                echo "No s'han trobat dades";

            }
            else
            {

                echo "<br><br>";
                echo "<table border='1' align='center' width='95%' style='background-color:skyblue'>";
                echo "<tr id='camps'>";
                echo "<td align='center'><font size='5'><strong>ID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>ProductName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>SupplierID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>CategoryID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>QuantityPerUnit</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>UnitPrice</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>UnitsOnOrder</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>UnitsInStock</strong></font></td>";
                echo "</tr>";

                while($client = $result->fetch_assoc())
                {

                    echo "<tr>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['ProductID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['ProductName']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['SupplierID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['CategoryID']);
                    echo "</td>";
                    echo "<td>";
                    echo utf8_encode($client['QuantityPerUnit']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['UnitPrice']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['UnitsOnOrder']);
                    echo "</td>";
                    echo "<td height='20px' align='center'>";
                    echo utf8_encode($client['UnitsInStock']);
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