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
        </form>
        <div id="dades">

        </div>
        <script>

            $(document).ready(function()
            {

                $("#nom_empresa").keyup(function()
                {

                    var empresa = $("#nom_empresa").val();

                    $.ajax
                    ({

                        url: 'busqueda.php?nom_empresa='+empresa,
                        data: 'action=showAll',
                        cache: false,
                        success: function(r)
                        {
                            $("#dades").html(r);
                        }

                    });

                });

            });

        </script>
    </body>
</html>