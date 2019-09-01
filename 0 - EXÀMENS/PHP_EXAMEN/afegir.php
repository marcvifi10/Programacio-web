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

    $con->query("SET NAMES 'utf8'");

    $sql = "SELECT * FROM products";

    $result = $con->query($sql);

    if($result->num_rows == 0)
    {

        echo "ERROR!!!";

    }

?>
<html>
    <head>
        <title>FORMULARI - AFEGIR</title>
        <meta charset="utf8">
    </head>
    <body>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
        <form action="insertar.php" method="post">
            <h1>FORMULARI AFEGIR</h1>
            CustomerID: 
            <input type="text" name="CustomerID" id="CustomerID">
            <br><br>
            EmployeeID: 
            <input type="text" name="EmployeeID" id="EmployeeID">
            <br><br>
            OrderDate: 
            <input type="text" name="OrderDate" id="OrderDate">
            <br><br>
            RequiredDate: 
            <input type="text" name="RequiredDate" id="RequiredDate">
            <br><br>
            ShippedDate: 
            <input type="text" name="ShippedDate" id="ShippedDate">
            <br><br>
            ShipVia: 
            <input type="text" name="ShipVia" id="ShipVia">
            <br><br>
            Freight: 
            <input type="text" name="Freight" id="Freight">
            <br><br>
            ShipName: 
            <input type="text" name="ShipName" id="ShipName">
            <br><br>
            ShipAddress: 
            <input type="text" name="ShipAddress" id="ShipAddress">
            <br><br>
            ShipCity: 
            <input type="text" name="ShipCity" id="ShipCity">
            <br><br>
            ShipRegion: 
            <input type="text" name="ShipRegion" id="ShipRegion">
            <br><br>
            ShipPostalCode: 
            <input type="text" name="ShipPostalCode" id="ShipPostalCode">
            <br><br>
            ShipCountry: 
            <input type="text" name="ShipCountry" id="ShipCountry">
            <br><br>
            <div id="producte_mes">
                <h2>PRODUCTES</h2>
                Quantitat: 
                <input type="number" name="quantitat" id="quantitat">
                Producte: 
                <select>
                    <?php


                        while ($row = $result->fetch_assoc()) 
                        {

                            $producte = $row['ProductName'];

                            echo '<option value=" '.$producte.'"  >'.$producte.'</option>';
                            echo "<br><br>";

                        }

                    ?>
                </select>
                <input type="button" name="mes_producte" id="mes_producte" value="+">
                <script>

                    $(document).ready(function()
                    {



                    });

                    $("#mes_producte").click(function()
                    {

                        $('#producte_mes').append('Quantitat: <input type="number" name="quantitat" id="quantitat">');
                        $('#producte_mes').append(' Producte: <select>');
                        $('#producte_mes').append('<?php
                    
                            while ($row = $result->fetch_assoc()) 
                            {

                                $producte = $row['ProductName'];

                                echo '<option value=" '.$producte.'"  >'.$producte.'</option>';
                                echo "<br><br>"; 

                            }
                        
                        ?>');

                        $('#producte_mes').append('</select>');
                        $('#producte_mes').append('<br><br>');

                    })

                </script>
                <br><br>
            </div>
            <input type="submit" value="Enviar">
        </form>
        <?php

            $con->close();

        ?>
    </body>
</html>