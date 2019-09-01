<?php

    $num= $_POST["num_formulari"];

    echo "<h1>TAULA DE MULTIPLICAR DE ".$num."</h1>";

    echo "<table border='1' style='width:500px';>";

    for($i = 0; $i < 11; $i++)
    {

        echo "<tr>";
        echo "<td>";
        echo $num;
        echo "</td>";
        echo "<td>";
        echo " X ";
        echo "</td>";
        echo "<td>";
        echo $i;
        echo "</td>";
        echo "<td>";
        echo " = ";
        echo "</td>";
        echo "<td>";
        echo $num*$i;
        echo "</td>";

    }

    echo "</table>";

?>