<!DOCTYPE html>
<html>
    <head>
        <title>bdd7</title>
        <meta charset="utf8">
        <style>

            #pagines
            {

                margin-bottom: 20px;

            }

            #mida
            {

                margin-left: 50px;

            }

        </style>
    </head>
    <body>
        <h1 align="center">
            <u>PAGINACIÓ</u>
        </h1>
        <form>
            <select name="mida" method="get">
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="40">40</option>
                <option value="80">80</option>
            </select>
            <input type="submit">
        </form>
        <br><br>
        <?php

            $host = "localhost";
            $username = "root";
            $password = "";
            $database = "proves";

            $i = 0;

            $con = new mysqli($host,$username,$password,$database);

            if($con->connect_error)
            {

                die("Error en la connexió: ".$con->connect_error);

            }

            //===================================================================
            //                              PAGINACIÓ
            //===================================================================

            if(isset($_GET["page"]))
            {

                $plana = $_GET["page"];

            }
            else
            {

                $plana = 1;

            }

            if(isset($_GET["mida"]))
            {

                $mida = $_GET["mida"];

            }
            else
            {

                $mida = 10;

            }

            $sql = "SELECT * FROM customers LIMIT ".($plana-1)*$mida.",".$mida;

            //=====================================================================

            $result = $con->query($sql);

            if($result->num_rows == 0)
            {

                echo "No s'han trobat dades";

            }
            else
            {

                $i++;

                echo "<table border='1' align='center' width='95%' style='background-color:skyblue'>";
                echo "<tr>";
                echo "<td align='center'><font size='5'><strong>Número</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>ID</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>CompanyName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>ContactName</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>ContactTitle</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Adress</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>City</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>PostalCode</strong></font></td>";
                echo "<td align='center'><font size='5'><strong>Country</strong></font></td>";
                echo "</tr>";

                while($client = $result->fetch_assoc())
                {

                    echo "<tr>";
                    echo "<td align='center'>";
                    echo $i++;
                    echo "</td>";
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

            $sql2 = "SELECT * FROM customers";

            $consulta = $con->query($sql2);

            $Total = $consulta->num_rows;

            $numPagines = $Total / $mida;

            echo "<div id='pagines' align='center'>";

            for($i = 0; $i <= ceil($Total/$mida); $i++)
            {
                
                echo "<a href='index.php?page=".($i+1)."&mida=".$mida."'>".($i+1)."</a>";
                echo " ";
            }

            echo "</div>";

            $con->close();

        ?>
    </body>
</html>