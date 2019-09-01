<html>
    <head>
        <title>PAS 1</title>
        <meta charset="utf8">
        <?php

            session_start();

        ?>
    </head>
    <body>
        <form method="get" action="pas2.php">
            <input type="radio" name="vehicle" value="Cotxe">Coche<br>
            <input type="radio" name="vehicle" value="Moto">Moto<br>
            <br><br>
            <input type="submit" name="enviar" value="Enviar">
        </form>
    </body>
</html>