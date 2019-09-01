<!DOCTYPE html>
<html>
	<head>
		<title>bdd26</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="../jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<style>

			#div_taula1
			{

				position: absolute;
				width: 1200px;
				height: 200px;
				overflow: scroll;

			}

			#div1
			{

				position: absolute;
				top: 240px;
                left: 50px;
				width: 1280px;
				height: 380px;
				overflow: scroll;

			}

			#div2
			{

				position: absolute;
				top: 240px;
				/*left: 670px;*/
				width: 600px;
				height: 380px;
				overflow: scroll;

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

				$client = "%";

				if (isset($_GET["CustomerID"])) 
				{

					$client = $_GET["CustomerID"];

				}

				$query = "SELECT CustomerID FROM customers GROUP BY CustomerID ORDER BY CustomerID";

				$result = $con->query($query);
			?>

			<div class="container">
				<br>
				<div id="div_taula1">
					<table class="table table-bordered table-hover table-responsive" id="table1">
						<?php

							$query = "SELECT * FROM customers WHERE CompanyName LIKE '".$client."'";

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

									$string = "<tr class='fila_client'>";

									foreach ($columns as $column) 
									{

										$string .= "<td>".$client[$column]."</td>";

									}

									$string .= "</tr>";
									echo $string;

								}

								foreach ($columns as $column) 
								{

									$string .= "<th>".$column."</th>";

								}

								$string .= "</tr>";

								echo $string;

								while($client = $result->fetch_assoc())
								{

									$string = "<tr class='fila_client2'>";

									foreach ($columns as $column2) 
									{

										$string .= "<td>".$client[$column2]."</td>";

									}

									$string .= "</tr>";

									echo $string;

								}
						?>
					</table>
				</div>
			</div>
			<div id="div1"></div>
			<div id="div2" align="center"></div>
			<div id="div3" align="center"></div>
		<?php 

			}

			$con->close();

		?>
		<script>

			$(function() 
			{

				$("#select2").hide();
				var currentPage = <?php echo $page ?>;
				var perPage = <?php echo $perPage ?>;
				var numRows = <?php echo $numRows ?>;
				var CompanyName = <?php echo "'".$client."'" ?>;
				var city = "%";
				var numPages = Math.ceil(numRows / perPage);

				$("#select1").val("%");

				$("#div1").hide();
				$("#div2").hide();
				$("#div3").hide();

				$(document).on("click",".fila_client",function()
				{

					var clientID = $(this).children(":first").html();

					$.ajax(
					{
						url: "dbquery.php?CustomerID="+clientID,
						method: "get",
						dataType: "html",
						success: function (data, status) 
						{

							var HTML = $(data).find("#container");
							$("#div1").html(data);
							$("#div1").show();

						},

					});

				});

			});

		</script>
	</body>
</html>