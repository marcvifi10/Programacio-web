<html>
    <head>
        <title>PAS 2</title>
        <meta charset="utf8">
        <?php

            session_start();

        ?>
    </head>
    <body>
        <?php

            $_SESSION["vehicle"] = $_GET["vehicle"];

            echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo "<strong>Tipus de vehicle: </strong>".$_SESSION["vehicle"];
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br>";

            setcookie("pas1","pas1",time()+3600);

        ?>
        <form method='get' action='pas3.php'>
            <?php

                if($_SESSION["vehicle"] == "Cotxe")
                {

                    echo "<input type='radio' name='tipus' value='Turisme'>Turisme<br>";
                    echo "<input type='radio' name='tipus' value='4x4'>4x4<br>";
                    echo "<input type='radio' name='tipus' value='Esportiu'>Esportiu<br>";
                    echo "<br><br>";
                    echo "<input type='submit' name='enviar' value='Enviar'>";

                }
                else if($_SESSION["vehicle"] == "Moto")
                {

                    echo "<input type='radio' name='tipus' value='Carretera'>Carretera<br>";
                    echo "<input type='radio' name='tipus' value='4x4'>4X4<br>";
                    echo "<br><br>";
                    echo "<input type='submit' name='enviar' value='Enviar'>";

                }
                else
                {



                }

            ?>
        </form>
    </body>
</html>