<html>
    <head>
        <title>PHP6</title>
        <meta charset="utf8">
        <style>

            td
            {

                width: 80px;
                height: 30px;
                align-content: center;

            }

        </style>
    </head>
    <body>
        <table>
        <?php
            
            $num = 4;

            echo "========================================"."<br>";
            echo "TAULA DE MULTILPLICAR DEL NÚMERO ".$num."<br>";
            echo "========================================"."<br><br>";

            echo "<table id='taula1' border='1' align='center'>";

            $i = 0;

            for($i = 0; $i < 11; $i++)
            {
        ?>
        <tr>
            <td align='center'>
                <?php echo "$num";?>
            </td>
            <td align='center'>
                <?php echo " X "; ?>
            </td>
            <td align='center'>
                <?php echo "$i"; ?>
            </td>
            <td align='center'>
                <?php echo " = "; ?>
            </td>
            <td align='center'>
                <?php echo ($i*$num); ?>
            </td>
        </tr>
        <?php



            }

            echo "</table>";

        ?>
        </table>
    </body>
</html>