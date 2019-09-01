<?php

    $foto = $_FILES["foto"]["tmp_name"];
    $nom_foto = $_FILES["foto"]["name"];
    //$foto = $_FILES["foto"]["name"];

    if(!FILE_EXISTS("uploads/"))
    {

        mkdir("uploads",0777);

    }

    if(FILE_EXISTS("uploads/".basename($nom_foto)))
    {

        echo "L'arxiu ja existeix!!!";

    }
    else
    {

        if(move_uploaded_file($foto,"uploads/".basename($nom_foto)))
        {

            echo "Imatge pujada correctament!!!";
            echo "<br>";
            echo $nom_foto;

        }

        else
        {

            echo "ERROR!!!";

        }

    }

?>