<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "proves";

    $nom_client = $_GET["nom_client"];

    $nom_empleat = $_GET["nom_empleat"];

    $con = new mysqli($host,$username,$password,$database);

    if($con->connect_error)
    {

        die("Error en la connexió: ".$con->connect_error);

    }

    //-----------------PAGINACIÓ-------------------------------
	$tamany_pagines = 3;
				
	if(isset($_GET["pagina"]))
	{
		if($_GET["pagina"]==1)
		{
			header("Location:index.php");
		}	
		else
		{
			$pagina=$_GET["pagina"];
		}
	}
	else
	{
		$pagina=1;
	}
				
	$pagina = 1;
				
    $comencar_desde = ($pagina-1)*$tamany_pagines;

    $sql_total = "SELECT * FROM orders";

    $result=$con->prepare($sql_total);
                    
    $result->execute(array());

    $num_files = $result->rowCount();
				
    $total_pagines = ceil($num_files / $tamany_pagines);

    $sql = "SELECT * FROM orders 
    WHERE CustomerID LIKE '".$nom_client."%' AND EmployeeID LIKE '".$nom_empleat."%' 
    LIMIT $comencar_desde,$tamany_pagines";
    
    $result = $con->query($sql);

    if($result->num_rows == 0)
    {

        echo "No s'han trobat dades";

    }
    else
    {

        $taula = "<br><br>";
        $taula .= "<table border='1' align='center' width='95%' style='background-color:skyblue'>";
        $taula .= "<tr id='camps'>";
        $taula .= "<td align='center'><font size='4'><strong>CustomerID</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>OrderID</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>EmployeeID</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>OrderDate</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>RequiredDate</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShippedDate</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipVia</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>Freight</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipName</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipAddress</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipCity</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipRegion</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipPostalCode</strong></font></td>";
        $taula .= "<td align='center'><font size='4'><strong>ShipCountry</strong></font></td>";
        $taula .= "</tr>";

        while($client = $result->fetch_assoc())
        {

            $taula .= "<tr height='20px'>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['CustomerID']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['OrderID']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['EmployeeID']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['OrderDate']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['RequiredDate']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShippedDate']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipVia']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['Freight']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipName']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipAddress']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipCity']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipRegion']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipPostalCode']);
            $taula .= "</td>";
            $taula .= "<td align='center'>";
            $taula .= utf8_encode($client['ShipCountry']);
            $taula .= "</td>";
            $taula .= "</tr>";

        }

        $taula .= "</table>";
        $taula .= "<br>";

        echo $taula;

        /* --------------------------PAGINACION------------------ */
        
        for($i=1; $i<=$total_pagines; $i++)
        {
            echo "<br>";
            echo "<a href='?pagina=".$i."'>".$i."</a>  ";
        }

    }

    $con->close();

?>