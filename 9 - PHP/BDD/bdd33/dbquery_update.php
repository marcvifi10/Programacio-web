<!DOCTYPE html>
<html>
	<head>
		<title>Index</title>
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
			if ($con->connect_error) {
				die("Error: ".$con->connect_errno." ".$con->connect_error);
			}
			$con->query("SET NAMES 'utf8'");

			if (isset($_POST["SupplierID"])) {
				$query = "UPDATE suppliers SET 
					CompanyName = '".$_POST["CompanyName"]."', 
					ContactName = '".$_POST["ContactName"]."', 
					ContactTitle = '".$_POST["ContactTitle"]."', 
					Address = '".$_POST["Address"]."', 
					City = '".$_POST["City"]."', 
					Region = '".$_POST["Region"]."', 
					PostalCode = '".$_POST["PostalCode"]."', 
					Country = '".$_POST["Country"]."', 
					Phone = '".$_POST["Phone"]."', 
					Fax = '".$_POST["Fax"]."', 
					HomePage = '".$_POST["HomePage"]."' 
					WHERE SupplierID = '".$_POST["SupplierID"]."'";

				if ($con->query($query)) {
					echo "<script>console.log('Correct')</script>";
					$string = "<table id='newRow'><tr>";
					$string .= "<td>".$_POST["CompanyName"]."</td>";
					$string .= "<td>".$_POST["ContactName"]."</td>";
					$string .= "<td>".$_POST["ContactTitle"]."</td>";
					$string .= "<td>".$_POST["Address"]."</td>";
					$string .= "<td>".$_POST["City"]."</td>";
					$string .= "<td>".$_POST["Region"]."</td>";
					$string .= "<td>".$_POST["PostalCode"]."</td>";
					$string .= "<td>".$_POST["Country"]."</td>";
					$string .= "<td>".$_POST["Phone"]."</td>";
					$string .= "<td>".$_POST["Fax"]."</td>";
					$string .= "<td>".$_POST["HomePage"]."</td>";
					$string .= "</tr></table>";
					echo $string;
				}
				else {
					echo "<script>console.log('Error: ".$con->error;
				}
			}

			$con->close();
		?>
	</body>
</html>