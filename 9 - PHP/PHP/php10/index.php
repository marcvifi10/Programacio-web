<html>
    <head>
        <title>PHP10</title>
        <meta charset="utf8">
        <style>

            .contenidor
            {

                width: 500px;
                height: 200px;

                margin-top: 50px;
                margin-left: 200px;

                background-color: grey;

            }

        </style>
        <script>

            var i = 2;

        </script>
    </head>
    <body>
        <div class="contenidor">
            <form method="POST" action="menjar.php">
                <table>
                    <tr>
                        <td>QUANTITAT</td>
                        <td>PLAT</td>
                    </tr>
                    <tr>
                        <td>
                            <input type="number" name="input1" placeholder="Quantitat">
                        </td>
                        <td>
                            <select id="seleccionador1" class="sel" name="seleccionador1">
                                <option value="verdura">Verdura</option>
                                <option value="carn">Carn</option>
                                <option value="peix">Peix</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="number" name="input2" placeholder="Quantitat">
                        </td>
                        <td>
                            <select id="seleccionador2" class="sel" name="seleccionador2">
                                <option value="verdura">Verdura</option>
                                <option value="carn">Carn</option>
                                <option value="peix">Peix</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="number" name="input3" placeholder="Quantitat">
                        </td>
                        <td>
                            <select id="seleccionador3" class="sel" name="seleccionador3">
                                <option value="verdura">Verdura</option>
                                <option value="carn">Carn</option>
                                <option value="peix">Peix</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <br><br>
                
                <input type="submit">
            </form>
        </div>
        <script src="../jquery-3.4.1.min.js"></script>
        <script>

            $(document).ready(function()
            {

                    

            });

        </script>
    </body>
</html>