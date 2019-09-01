<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "proves";

    $con1 = new mysqli($host,$user,$password,$db_name);

    if($con1->connect_errno)
    {

        die("Error: ".$con->connect_errno." ".$con->connect_error);

    }

    $con1->query("SET NAMES 'utf8'");
 
    if(isset($_POST["id"]))
    {

        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $telefon = $_POST["tel"];

        $sql = "UPDATE shippers SET CompanyName ='".$nom."', Phone = '".$telefon."' WHERE ShipperID = ".$id."";

        $result = $con1->query($sql);

    }

    $con1->close();

?>
<html>
    <head>
        <title>30</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <script src="../jquery-3.4.1.min.js"></script>
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

            $sql = "SELECT * FROM shippers";

            $result = $con->query($sql);
                
            // $con->close();

        ?>
        <div id="fons" class="container">
            <table align="center" width="70%" border="1">
                <tr height="50px">
                    <th>SHIPPER ID</th>
                    <th>COMPANY NAME</th>
                    <th>PHONE</th>
                </tr>
                <?php

                    while($row = $result->fetch_assoc())
                    { 
                     
                        echo "<tr class='fila'>";
                        echo "<td>".$row["ShipperID"]."</td>";
                        echo "<td>".$row["CompanyName"]."</td>";
                        echo "<td>".$row["Phone"]."</td>";
                        echo "</tr>";
                        
                    }

                    $con->close();

                ?>
            </table>
        </div>
        <script>

            $(document).ready(function()
            { 

                $(".fila").click(function()
                {

                    var ID = $(this).children(":first").html();
                    window.location = "actualitzar.php?id=" + ID;

                });

            });                    

        </script>
    </body>
</html>