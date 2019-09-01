<?php

    $quantitat1 = $_POST["input1"];
    $menjar1 = $_POST["seleccionador1"];

    $quantitat2 = $_POST["input2"];
    $menjar2 = $_POST["seleccionador2"];

    $quantitat3 = $_POST["input3"];
    $menjar3 = $_POST["seleccionador3"];

    echo "<table border='1' align='center' style='width: 500px;'>";
    echo "<tr>";
    echo "<td align='center'>";
    echo "<strong>QUANTITAT</strong>";
    echo "</td>";
    echo "<td align='center'>";
    echo "<strong>MENJAR</strong>";
    echo "</td>";
    echo "<td align='center'>";
    echo "<strong>IMATGE</strong>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td align='center'>";
    echo $quantitat1;
    echo "</td>";
    echo "<td align='center'>";
    echo $menjar1;
    echo "</td>";
    echo "<td align='center'>";
    echo "<img src='$menjar1.jpg' width='100px' height='100px'>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td align='center'>";
    echo $quantitat2;
    echo "</td>";
    echo "<td align='center'>";
    echo $menjar2;
    echo "</td>";
    echo "<td align='center'>";
    echo "<img src='$menjar2.jpg' width='100px' height='100px'>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td align='center'>";
    echo $quantitat3;
    echo "</td>";
    echo "<td align='center'>";
    echo $menjar3;
    echo "</td>";
    echo "<td align='center'>";
    echo "<img src='$menjar3.jpg' width='100px' height='100px'>";
    echo "</td>";
    echo "</tr>";
    echo "</table>";

?>