<!DOCTYPE html>
<html>
	<head>
		<title>bdd21</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="../jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<style>

			#client
			{

				display: block inline;

			}

			#empleat
			{

				display: block inline;

			}
		
		</style>
	</head>
	<body>
	<?php

			$server = "localhost";
			$username = "root";
			$password = "";
			$databse = "proves";

			$con = new mysqli($server, $username, $password, $databse);

			if ($con->connect_error) 
			{

				die("Error: ".$con->connect_errno." ".$con->connect_error);

			}

			$con->query("SET NAMES 'utf8'");

			$client = "%";

			if (isset($_GET["CustomerID"])) 
			{

				$client = $_GET["CustomerID"];

			}

			$city = "%";

			if (isset($_GET["City"])) 
			{

				$city = $_GET["City"];

			}

			$query1 = "SELECT * FROM orders WHERE CustomerID='".$client."'";

			$result1 = $con->query($query1);

		?>
		<div class="container" id="container">
			<?php

				$query2 = "SELECT orderdetails.OrderID
				FROM orderdetails 
				LEFT JOIN products ON orderdetails.ProductID = products.ProductID
				LEFT JOIN categories ON products.CategoryID = categories.CategoryID
				LEFT JOIN suppliers ON products.SupplierID = suppliers.SupplierID
				WHERE orderdetails.OrderID='".$client."'";

				$result2 = $con->query($query2);

				/*if($result2->num_rows == 0)
				{

					echo "dd";

				}*/

				while($row1 = $result2->fetch_assoc())
				{

					echo "<div id='client'>";
					echo "<h1>CLIENT:</h1>";
					echo "<strong>Empresa: </strong>".$row1["OrderID"]."<br>";
					echo "<strong>Contacte: </strong>".$row1["OrderID"]."<br>";
					echo "</div>";
					echo "<div id='empleat'>";
					echo "<h1>EMPLEAT:</h1>";
					// echo "<strong>Nom: </strong>".$row1["FirstName"];
					echo "</div>";
					echo "<br><br>";

				}

			?>
			<div align="center">
			<table class="table table-bordered table-hover table-responsive" id="taula2">
				<?php

					$string = "<tr>";

					$string .= "<th>OrderID</th>";
					$string .= "<th>CustomerID</th>";
					$string .= "<th>EmployeeID</th>";
					$string .= "<th>OrderDate</th>";
					$string .= "<th>RequiredDate</th>";
					$string .= "<th>ShippedDate</th>";
					$string .= "<th>ShipVia</th>";
					$string .= "<th>Freight</th>";
					$string .= "<th>ShipName</th>";
					$string .= "<th>ShipAddress</th>";
					$string .= "<th>ShipCity</th>";
					$string .= "<th>ShipPostalCode</th>";
					$string .= "<th>ShipCountry</th>";

					$string .= "<tr>";

					while($row = $result1->fetch_assoc())
					{

						$string .= "<tr class='fila_client1'>";

						$string .= "<td>";
						$string .= $row["OrderID"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["CustomerID"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["EmployeeID"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["OrderDate"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["RequiredDate"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShippedDate"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShipVia"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["Freight"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShipName"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShipAddress"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShipCity"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShipPostalCode"];
						$string .= "</td>";
						$string .= "<td>";
						$string .= $row["ShipCountry"];
						$string .= "</td>";

						$string .= "<tr>";

					}	
					
					echo $string;

				?>
			</div>
		</div>
		<?php 

				$con->close();

		?>
	</body>
</html>