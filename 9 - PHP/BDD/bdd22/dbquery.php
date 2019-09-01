<!DOCTYPE html>
<html>
	<head>
		<title>bdd21</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="../jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<style>


		
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

			$query = "SELECT * FROM orders WHERE CustomerID='".$client."'";

			$result = $con->query($query);

		?>
		<div class="container" id="container">
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

					while($row = $result->fetch_assoc())
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