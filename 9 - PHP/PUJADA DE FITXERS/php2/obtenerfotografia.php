<?php

    mysql_connect("localhost", "root", "") or die(mysql_error());
    mysql_select_db("proves") or die(mysql_error());

    if ($_GET['id'] > 0)
    {
        
        $consulta = "SELECT FOTO, tipus_foto FROM products WHERE ProductID={$_GET['id']}";
        $resultado = @mysql_query($consulta) or die(mysql_error());
        $datos = mysql_fetch_assoc($resultado);

        $imagen = $datos['imagen']; 
        $tipo = $datos['tipo_imagen'];  

        header("Content-type: $tipo");

        echo $imagen;

    }

?>