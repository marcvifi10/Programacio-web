<html>
    <head>
        <title>28</title>
        <meta charset="utf8">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
    </head>
    <body>
        <div class="container">
            <br>
            <form method="post" action="index.php">
                <label>NOM:</label>
                <input type="text" name="nom" id="nom"><br><br>
                <input type="submit" class="btn btn-primary" value="Insertar">
            </form>
            <?php

                $host = "localhost";
                $user = "root";
                $password = "";
                $db_name = "proves";

                if(isset($_POST["nom"]))
                {

                    $nom = $_POST["nom"];

                    $con = new mysqli($host,$user,$password,$db_name);

                    if($con->connect_errno)
                    {

                        die("Error: ".$con->connect_errno." ".$con->connect_error);

                    }

                    $con->query("SET NAMES 'utf8'");

                    if($nom != "")
                    {

                        $sql2 = "SELECT CompanyName FROM shippers WHERE CompanyName = '".$nom."'";

                        $result2 = $con->query($sql2);


                        if($result2->num_rows != 0)
                        {

                            echo "Dades repetides!!!";

                        }
                        else
                        {

                            if($con->query($sql2))
                            {

                                $sql = "INSERT INTO shippers (CompanyName) VALUES('".$nom."')";

                                $result = $con->query($sql);

                                echo "DADES INTRODUIDES CORRECTAMENT!!!";

                            }
                            else
                            {

                                echo "ERROR!!! ".$con->error;

                            }

                        }

                    }

                    $con->close();

                }
                else
                {



                }

            ?>
        </div>
    </body>
</html>