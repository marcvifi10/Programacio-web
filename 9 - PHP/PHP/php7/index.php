<html>
    <head>
        <title>PHP6</title>
        <meta charset="utf8">
        <style>

            td
            {

                width: 200px;
                height: 30px;
                align-content: center;

            }

        </style>
    </head>
    <body>
        <table>
        <?php
            
            $num = 4;

            echo "========================"."<br>";
            echo "FACTORES DE CONVERSIÓN <br>";
            echo "========================"."<br><br>";

            echo "<table id='taula1' border='1' align='center'>";

            $i = 0;

            while($i != 6000)
            {
        ?>
        <tr>
            <td align='center'>
                <?php echo "$i"." euros"; ?>
            </td>
            <td align='center'>
                <?php echo $i * 0.94." $"; ?>
            </td>
        </tr>
        <?php

                if($i < 5 )
                {

                    $i++;

                }
                else if($i < 20 )
                {

                    $i = $i + 5;

                }
                else if($i < 100)
                {

                    $i = $i + 10;

                }
                else if($i < 1000 )
                {

                    $i = $i + 100;

                }
                else if($i < 6000 )
                {

                    $i = $i + 1000;

                }

            }

            echo "</table>";

        ?>
        </table>
    </body>
</html>