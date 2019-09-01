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

    $query = $con->query("SELECT * FROM products");

    $rowCount = $query->num_rows;

?>
<html>
    <head>
        <title>MODIFICAR</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <script src="../jquery-3.4.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>INSERTAR</h1>
            <form action="index.php" method="post">  
                <label>NOM:</label><br>
                <input type="text" name="nom">
                <br><br>
                <label>SUPPLIER:</label><br>
                <select name="supplier">
                    <?php

                        $query4 = $con->query("SELECT DISTINCT SupplierID FROM products");

                        $rowCount4= $query4->num_rows;

                        if($rowCount4 > 0)
                        {

                            while($row4 = $query4->fetch_assoc())
                            {
                            
                                echo '<option value="'.$row4['SupplierID'].'">'.$row4['SupplierID'].'</option>';
                            
                            }
                            
                            }else{
                            
                                echo '<option value="">Provincia no disponible</option>';
                            
                            }

                    ?>
                </select>
                <br><br>
                <label>CATEGORY:</label><br>
                <select name="category">
                    <?php

                        $query2 = $con->query("SELECT * FROM categories");

                        $rowCount2= $query2->num_rows;

                        if($rowCount2 > 0)
                        {

                            while($row2 = $query2->fetch_assoc())
                            {
                            
                                echo '<option value="'.$row2['CategoryID'].'">'.$row2['CategoryID'].'</option>';
                            
                            }
                            
                            }else{
                            
                                echo '<option value="">Provincia no disponible</option>';
                            
                            }

                    ?>
                </select>
                <br><br>
                <label>DISCCOUNT:</label><br>
                    <select name="disccount">
                        <?php

                            $query3 = $con->query("SELECT DISTINCT Discontinued FROM products");

                            $rowCount3 = $query3->num_rows;

                            if($rowCount3 > 0)
                            {

                                while($row3 = $query3->fetch_assoc())
                                {
                                
                                    echo '<option value="'.$row3['Discontinued'].'">'.$row3['Discontinued'].'</option>';
                                
                                }
                                
                                }else{
                                
                                    echo '<option value=""></option>';
                                
                                }

                        ?>
                    </select>
                <br><br>
                <input type="submit" value="Insertar">
            </form>
            <?php

                

                $con->close();

            ?>
        </div>
    </body>
</html>