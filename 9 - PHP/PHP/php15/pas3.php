<html>
    <head>
        <title>PAS 3</title>
        <meta charset="utf8">
        <?php

            session_start();

        ?>
    </head>
    <body>
        <?php

            $_SESSION["tipus"] = $_GET["tipus"];

            setcookie("pas1","pas1",time()-7000);

            setcookie("pas2","pas2",time()+3600);

            echo "<table>";
            echo "<tr>";
            echo "<td>";
            echo "<strong>Tipus de vehicle: </strong>".$_SESSION["vehicle"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<strong>Tipus : </strong>".$_SESSION["tipus"];
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br>";

        ?>
        <form method="get" action="pas4.php">
            <input type="radio" name="color" value="Negre">Negre<br>
            <input type="radio" name="color" value="Vermell">Vermell<br>
            <input type="radio" name="color" value="Blau">Blau<br>
            <br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>