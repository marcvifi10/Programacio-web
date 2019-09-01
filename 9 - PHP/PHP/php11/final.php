<?php

    session_start();

?>
<html>
    <head>
        <title>PHP11</title>
    </head>
    <body>
        <?php

           echo $_SESSION["nom"];

        ?>
    </body>
</html>