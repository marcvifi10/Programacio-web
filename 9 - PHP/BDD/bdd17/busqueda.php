<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "proves";

    $nom_empresa = $_GET["nom_empresa"];

    $con = new mysqli($host,$username,$password,$database);

    if($con->connect_error)
    {

        die("Error en la connexió: ".$con->connect_error);

    }

    $sql = "SELECT * FROM customers WHERE CompanyName LIKE '".$nom_empresa."%'";

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
        echo "<td align='center'><font size='5'><strong>CustomerID</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>CompanyName</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>ContactName</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>ContactTitle</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>Address</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>City</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>Region</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>PostalCode</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>Country</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>Phone</strong></font></td>";
        echo "<td align='center'><font size='5'><strong>Fax</strong></font></td>";
        echo "</tr>";

        while($client = $result->fetch_assoc())
        {

            echo "<tr height='20px'>";
            echo "<td align='center'>";
            echo utf8_encode($client['CustomerID']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['CompanyName']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['ContactName']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['ContactTitle']);
            echo "</td>";
            echo "<td>";
            echo utf8_encode($client['Address']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['City']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['Region']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['PostalCode']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['Country']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['Phone']);
            echo "</td>";
            echo "<td align='center'>";
            echo utf8_encode($client['Fax']);
            echo "</td>";
            echo "</tr>";
            //echo $client["CompanyName"];

        }

        echo "</table>";
        echo "<br>";

    }

    $con->close();

?>