<!DOCTYPE html>
<html>
    <head>
        <title>EXÀMEN</title>
        <meta charset="utf8">
        <style>

            

        </style>
    </head>
    <body>
        <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
        <h1>COMANDES</h1>
        <form>
            <input type="text" id="nom_client" name="nom_client" placeholder="NOM DEL CLIENT">
            <input type="text" id="nom_empleat" name="nom_empleat" placeholder="NOM DE L'EMPLEAT">
        </form>
        <br>  
        <a href="afegir.php" target="_blank">AFEGIR</a>
        <div id="dades">

        </div>
        <script>

            $(document).ready(function()
            {

                $("#nom_client").keyup(function()
                {

                    var client = $("#nom_client").val();
                    var empleat = $("#nom_empleat").val();

                    $.ajax
                    ({

                        url: 'busqueda.php?nom_client='+client+"&nom_empleat="+empleat,
                        data: 'action=showAll',
                        cache: false,
                        success: function(r)
                        {
                            $("#dades").html(r);
                        }

                    });

                });

                
                $("#nom_empleat").keyup(function()
                {

                    var client = $("#nom_client").val();
                    var empleat = $("#nom_empleat").val();

                    $.ajax
                    ({

                        url: 'busqueda.php?nom_client='+client+"&nom_empleat="+empleat,
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