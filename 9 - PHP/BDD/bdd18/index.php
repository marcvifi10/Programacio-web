<!DOCTYPE html>
<html>
    <head>
        <title>bdd18</title>
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

            $sql = "SELECT DISTINCT(Title) FROM employees ORDER BY Title asc";

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
                echo "<td align='center'><font size='5'><strong>TITLE</strong></font></td>";
                echo "</tr>";

                while($client = $result->fetch_assoc())
                {

                    echo "<tr>";
                    echo "<td align='center'>";
                    echo utf8_encode($client['Title']);
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