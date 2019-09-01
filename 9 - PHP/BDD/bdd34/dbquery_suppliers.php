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
		?>

		<div class="container">
			<div id="tableDiv" class="col-xs-8">
				<table class="table table-bordered table-hover table-striped table-responsive" id="table1">

		<?php
			$query = "SELECT * FROM suppliers";
			$result = $con->query($query);

			if ($result->num_rows == 0) {
				echo "No data found";
			}
			else {
				$columns = [];
				$infoFields = mysqli_fetch_fields($result);
				foreach ($infoFields as $value) {
					$columns[] = $value->name;
				}

				$string = "<tr>";
				foreach ($columns as $column) {
					$string .= "<th>".$column."</th>";
				}
				$string .= "</tr>";
				echo $string;

				while($supplier = $result->fetch_assoc()) {
					$string = "<tr class='filaSuppliers' id='suppliersRow".$supplier["SupplierID"]."'>";
					foreach ($columns as $column) {
						$string .= "<td>".$supplier[$column]."</td>";
					}
					$string .= "</tr>";
					echo $string;
				}
			}

			$con->close();
		?>

				</table>
			</div>
		</div>

	</body>
</html>