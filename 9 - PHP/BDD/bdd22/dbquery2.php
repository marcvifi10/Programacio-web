<!DOCTYPE html>
<html>
	<head>
		<title>bdd21</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="../jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<style>

            #taula3
            {

                left: 2000px;

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

			if (isset($_GET["OrderID"])) 
			{

				$client = $_GET["OrderID"];

			}

			$city = "%";

			if (isset($_GET["City"])) 
			{

				$city = $_GET["City"];

			}

			$query = "SELECT * FROM orderdetails WHERE OrderID='".$client."'";

			$result = $con->query($query);

		?>
		<div class="container" id="container">
			<table class="table table-bordered table-hover table-responsive" id="taula3">
				<?php

					$string = "<tr>";

					$string .= "<th>OrderID</th>";
					$string .= "<th>ProductID</th>";
					$string .= "<th>UnitPrice</th>";
					$string .= "<th>Quantity</th>";
					$string .= "<th>Discount</th>";

					$string .= "<tr>";

					while($row = $result->fetch_assoc())
					{

                        $string .= "<tr class='fila_client2'>";
                        
						$string .= "<td>";
						$string .= $row["OrderID"];
                        $string .= "</td>";
                        $string .= "<td>";
						$string .= $row["ProductID"];
                        $string .= "</td>";
                        $string .= "<td>";
						$string .= $row["UnitPrice"];
                        $string .= "</td>";
                        $string .= "<td>";
						$string .= $row["Quantity"];
                        $string .= "</td>";
                        $string .= "<td>";
						$string .= $row["Discount"];
						$string .= "</td>";

						$string .= "<tr>";

					}	
					
					echo $string;

				?>
			</table>
		</div>
		</div>
		<?php 

				$con->close();

		?>
	</body>
</html>