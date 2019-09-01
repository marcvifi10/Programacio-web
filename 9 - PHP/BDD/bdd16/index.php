<!DOCTYPE html>
<html>
    <head>
        <title>bdd14</title>
        <meta charset="utf8">
        <style>

            

        </style>
    </head>
    <body>
        <script src="../jquery-3.4.1.min.js"></script>
        <h1>EMPRESA</h1>
        <form>
            <input type="text" id="nom_empresa" name="nom_empresa">
            <input type="button" id="boto" name="boto" value="Mostrar">
        </form>
        <div id="dades">

        </div>
        <script>

            $(document).ready(function()
            {

                $("#boto").click(function()
                {

                    var empresa = $("#nom_empresa").val();

                    alert(empresa);

                    $.get("busqueda.php?nom_empresa="+empresa, function(htmlextern){

                        $("#dades").html(htmlextern);

                    });

                });

            });

        </script>
    </body>
</html>