<?php 

    mysql_connect("localhost", "root", "") or die(mysql_error());
    
    mysql_select_db("proves") or die(mysql_error());


    if (!isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0)
    {
        echo "Ha ocurrido un error.";
    }
    else
    {

        $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
        $limite_kb = 16384;

        if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024)
        {

            $imagen_temporal = basename($_FILES['imagen']['name']);

            $tipo = $_FILES['imagen']['type'];

            $fp = fopen($imagen_temporal, 'r+b');
            $data = fread($fp, filesize($imagen_temporal));
            fclose($fp);
            
            $data = mysql_escape_string($data);

            $resultado = @mysql_query("INSERT INTO products (FOTO, tipus_foto) VALUES ('$imagen_temporal', '$tipo')");

            if ($resultado)
            {

                if(move_uploaded_file($_FILES["imagen"]["tmp_name"]),"C:\xampp\htdocs\Programacio_web_PICE\9 - PHP\PUJADA DE FITXERS\photo.jpg")
                {

                    echo "<img src='C:\xampp\htdocs\Programacio_web_PICE\9 - PHP\PUJADA DE FITXERS\photo.jpg'>";

                }

                echo "El archivo ha sido copiado exitosamente.";
                

            }

            else
            {

                echo "Ocurrió algun error al copiar el archivo.";

            }

        }

        else
        {

            echo "Formato de archivo no permitido o excede el tamaño límite de $limite_kb Kbytes.";

        }
    }
?>