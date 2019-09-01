<html>
    <head>
        <title>Plantilla</title>
        <meta charset="utf8">
    </head>
    <body>
        <?php

            $nom = $_POST["nom"];
            $cognom = $_POST["cognom"];
            $titol = $_POST["titol"];
            $titol_cortesia = $_POST["titol_cortesia"];
            $naixement = $_POST["datepicker1"];
            $contractacio = $_POST["datepicker"];
            $adreça = $_POST["adreça"];
            $ciutat = $_POST["ciutat"];
            $regio = $_POST["regio"];
            $codiPostal = $_POST["codiPostal"];

            $plantilla = "<table border='1' align='center' width='30%'>
                            <tr>
                                <td>
                                    <strong>Nom:</strong>
                                </td> 
                                <td>
                                    $nom
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Cognoms:</strong>
                                </td> 
                                <td>
                                    $cognom
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Titol:</strong>
                                </td> 
                                <td> 
                                    $titol
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Titol cortesía:</strong>
                                </td>
                                <td>
                                    $titol_cortesia
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Data de naixement:</strong> 
                                </td>
                                <td>
                                    $naixement
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Data de contractació:</strong>
                                </td>
                                <td>
                                    $contractacio
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Adreça:</strong>
                                </td>
                                <td> 
                                    $adreça
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Ciutat:</strong> 
                                </td>
                                <td>
                                    $ciutat
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Regió:</strong>
                                </td>
                                <td> 
                                    $regio
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>Codi postal:</strong>
                                </td>
                                <td>
                                    $codiPostal
                                </td>
                            </tr>
                            </table>";

            echo "<br><br>";
            echo $plantilla;

        ?>
    </body>
</html>