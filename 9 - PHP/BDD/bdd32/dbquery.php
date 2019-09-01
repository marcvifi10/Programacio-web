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

			$page = 1;
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}
			$perPage = 10;
			if (isset($_GET["perPage"])) {
				$perPage = $_GET["perPage"];
			}
			$country = "%";
			if (isset($_GET["Country"])) {
				$country = $_GET["Country"];
			}
			$city = "%";
			if (isset($_GET["City"])) {
				$city = $_GET["City"];
			}

			$query = "SELECT Country FROM customers GROUP BY Country ORDER BY Country";
			$result = $con->query($query);
		?>

		<div class="container">
			<select id="selectCities">
				<option value="%">Select a city</option>

				<?php
					$query = "SELECT City FROM customers WHERE Country LIKE '".$country."' AND City Like '".$city."' GROUP BY City ORDER BY City";
					$result = $con->query($query);
					$numRows = $result->num_rows;
					while($nextCity = $result->fetch_assoc()) {
						$string = "<option value='".$nextCity["City"]."'>".$nextCity["City"]."</option>\n";
						echo $string;
					}
				?>

			</select>

			<table class="table table-bordered table-hover table-responsive" id="dbTable">

		<?php
			$query = "SELECT * FROM customers WHERE Country LIKE '"
				.$country."' AND City Like '".$city."'";
			$result = $con->query($query);
			$numRows = $result->num_rows;

			$query .= " LIMIT ".(($page - 1) * $perPage).", ".$perPage;
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

				while($client = $result->fetch_assoc()) {
					$string = "<tr>";
					foreach ($columns as $column) {
						$string .= "<td>".$client[$column]."</td>";
					}
					$string .= "</tr>";
					echo $string;
				}
		?>

			</table>
		</div>

		<?php 
			}

			$con->close();
		?>
	</body>
</html>