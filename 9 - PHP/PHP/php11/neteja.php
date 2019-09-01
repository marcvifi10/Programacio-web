<?php

    session_start();

?>
<html>
    <head>
        <title>PHP11</title>
    </head>
    <body>
        <?php

            // Elimina una variable de sessió en concret
            unset($_SESSION["nom"]);

            // Elimina totes les variables de sessió i també es carrega la sessió
            session_destroy();

        ?>
    </body>
</html>