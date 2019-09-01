<?php

    if (isset($_POST["css"]))
    {

        $backcolor=$_POST["backcolor"];

    }
    else
    {

        $backcolor="red";

    }

?>
<html>
    <head>
        <title>Cambiar propiedades CSS con PHP</title>
        <style>
            body
            {
            width: <?php echo $width; ?>; 
            height: <?php echo $height;?>; 
            background-color: <?php echo $backcolor; ?>;
            }
        </style>
    </head>
    <body>
        <center>
            <h1>Cambiar propiedades CSS con PHP</h1>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                <table>
                <tr>
                    <td>Color fondo:</td> 
                    <td>
                        <input type="text" name="backcolor" value="<?php echo $backcolor; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="css">
                    </td><td><input type="submit" value="Enviar"></td></tr>
                </table>
            </form>
            <div id="caja"></div>
        </center>
    </body>
</html>