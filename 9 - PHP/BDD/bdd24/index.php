<!DOCTYPE html>
<html>
    <head>
        <title>bdd24</title>
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

            $sql = "SELECT suppliers.CompanyName, categories.CategoryID, categories.CategoryName, products.ProductID
            FROM products 
            LEFT JOIN categories 
            ON products.CategoryID = categories.CategoryID
            LEFT JOIN suppliers 
            ON products.SupplierID = suppliers.SupplierID";

            $result = $con->query($sql);

            if($result->num_rows == 0)
            {

                echo "No s'han trobat dades";

            }
            else
            {

                echo "<br><br>";
                echo "<table border='1' align='center' width='20%' style='background-color:skyblue'>";
                echo "<tr id='camps'>";
                echo "<td align='center'><font size='5'><strong>ProductID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>CategoryName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>CategoryID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>CompanyName</strong></font></td>";
                echo "</tr>";

                while($client = $result->fetch_assoc())
                {

                    echo "<tr>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['ProductID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['CategoryName']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['CategoryID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['CompanyName']);
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