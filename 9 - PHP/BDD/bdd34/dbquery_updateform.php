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
			$supplierID = "";
			if (isset($_POST["SupplierID"])) {
				$supplierID = $_POST["SupplierID"];
			}

			$server = "localhost";
			$username = "root";
			$password = "";
			$databse = "proves";

			$con = new mysqli($server, $username, $password, $databse);
			if ($con->connect_error) {
				die("Error: " . $con->connect_errno . " " . $con->connect_error);
			}
			$con->query("SET NAMES 'utf8'");

			$query = "SELECT * FROM suppliers WHERE SupplierID = '".$supplierID."'";
			$result = $con->query($query);
			if ($result->num_rows == 0) {
				echo "Supplier not found.";
			}
			else {
				$supplier = $result->fetch_assoc();
			}

			$con->close();
		?>

		<div class="container" id="formDiv">
			<form method="POST" action="" class="form-group" id="supplierForm">
				<input type="hidden" name="SupplierID" value="<?php echo $supplier["SupplierID"] ?>">

		<?php
			$columns = [];
			$infoFields = mysqli_fetch_fields($result);
			foreach ($infoFields as $value) {
				$columns[] = $value->name;
			}

			$string = "";
			for ($i = 1; $i < count($columns); $i++) {
				$string .= $columns[$i]."<input class='form-control' type='text' name='"
					.$columns[$i]."' value='".$supplier[$columns[$i]]."'><br />";
			}
			echo $string;
		?>

				<input class="btn btn-primary" type="submit" value="Submit" id="formSubmitButton">
			</form>
		</div>
	</body>
</html>