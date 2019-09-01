<html>
    <head>
        <title>PAS 4</title>
        <meta charset="utf8">
        <?php

            session_start();

        ?>
    </head>
    <body>
        <?php

            setcookie("pas3","pas3",time()-7000);

            $_SESSION["color"] = $_GET["color"];

            setcookie("pas3","pas3",time()-7000);

            echo "<h1 align='center'><u>RESUM</u></h1>";
            echo "<br>";
            echo "<table align='center' width='300px' border='1'>";
            echo "<tr>";
            echo "<td align='center'>";
            echo "<strong>Vehicle: </strong>";
            echo "</td>";
            echo "<td align='center'>";
            echo $_SESSION["vehicle"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='center'>";
            echo "<strong>Tipus: </strong>";
            echo "</td>";
            echo "<td align='center'>";
            echo $_SESSION["tipus"];
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td align='center'>";
            echo "<strong>Color: </strong>";
            echo "</td>";
            echo "<td align='center'>";
            echo $_SESSION["color"];
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br>";

        ?>
    </body>
</html>