<!DOCTYPE html>
<html>
    <head>
        <title>bdd25</title>
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

            $sql = "SELECT orders.OrderID, 
            employees.EmployeeID, employees.FirstName, employees.LastName, employees.Title, 
            customers.CustomerID, customers.CompanyName, customers.ContactName
            FROM orders 
            LEFT JOIN employees 
            ON orders.EmployeeID = employees.EmployeeID
            LEFT JOIN customers 
            ON orders.CustomerID = customers.CustomerID";

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
                echo "<td align='center'><font size='5'><strong>OrderID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>EmployeeID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Employee FirstName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Employee LastName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Employee Title</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Customers CustomerID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Customers CompanyName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Customers ContactName</strong></font></td>";
                echo "</tr>";

                while($client = $result->fetch_assoc())
                {

                    echo "<tr>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['OrderID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['EmployeeID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['FirstName']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['LastName']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['Title']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['CustomerID']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['CompanyName']);
                    echo "</td>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['ContactName']);
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