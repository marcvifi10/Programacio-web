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

				$page = 1;

				if (isset($_GET["page"])) 
				{

					$page = $_GET["page"];

				}

				$perPage = 200;

				if (isset($_GET["perPage"])) 
				{

					$perPage = $_GET["perPage"];

				}

				$country = "%";

				if (isset($_GET["Country"])) 
				{

					$country = $_GET["Country"];

				}

				$query = "SELECT Country FROM customers GROUP BY Country ORDER BY Country";

				$result = $con->query($query);
			?>

			<div class="container">
				<form>
					<select id="select1">
						<option value="%">Select a country</option>
						<?php

							while($nextCountry = $result->fetch_assoc()) 
							{

								$string = "<option value='".$nextCountry["Country"]."'>".$nextCountry["Country"]."</option>\n";
								echo $string;

							}

						?>
					</select>
					<select id="select2">

					</select>
				</form>
				<table class="table table-bordered table-hover table-responsive" id="table1">
					<?php

						$query = "SELECT * FROM customers WHERE Country LIKE '".$country."'";

						$result = $con->query($query);

						$numRows = $result->num_rows;

						$query .= " LIMIT ".(($page - 1) * $perPage).", ".$perPage;

						$result = $con->query($query);

						if ($result->num_rows == 0) 
						{

							echo "No data found";

						}

						else 
						{

							$columns = [];

							$infoFields = mysqli_fetch_fields($result);

							foreach ($infoFields as $value) 
							{

								$columns[] = $value->name;

							}

							$string = "<tr>";

							foreach ($columns as $column) 
							{

								$string .= "<th>".$column."</th>";

							}

							$string .= "</tr>";

							echo $string;

							while($client = $result->fetch_assoc())
							{

								$string = "<tr>";

								foreach ($columns as $column) 
								{

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
		<script>

			$(function () 
			{

				$("#select2").hide();
				var currentPage = <?php echo $page ?>;
				var perPage = <?php echo $perPage ?>;
				var numRows = <?php echo $numRows ?>;
				var country = <?php echo "'".$country."'" ?>;
				var city = "%";
				var numPages = Math.ceil(numRows / perPage);

				$("#select1").val("%");

				$("#select1").change(function () 
				{

					city = "%";
					country = $(this).val();

					$.ajax({
						url: "dbquery.php?page=" + currentPage + "&perPage=" + perPage
							+ "&Country=" + country + "&City=" + city,
						method: "get",
						dataType: "html",
						success: function (data, status) 
						{

							var table = $(data).find("#dbTable");

							$("#table1").html($(table).html());

							if (country == "%") 
							{

								$("#select2").hide();

							}

							else 
							{

								var cities = $(data).find("#selectCities");
								$("#select2").html($(cities).html());
								$("#select2").show();

							}

						},

						error: function () 
						{

							alert("Error");

						}

					});

				});

				$("#select2").change(function () 
				{

					city = $(this).val();

					$.ajax({
						url: "dbquery.php?page=" + currentPage + "&perPage=" + perPage
							+ "&Country=" + country + "&City=" + city,
						method: "get",
						dataType: "html",
						success: function (data, status) 
						{

							var table = $(data).find("#dbTable");
							$("#table1").html($(table).html());

						},

						error: function () 
						{

							alert("Error");

						}

					});

				});

			});

		</script>
	</body>
</html>