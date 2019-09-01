<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "proves";

    $con1 = new mysqli($host,$user,$password,$db_name);

    if($con1->connect_errno)
    {

        die("Error: ".$con->connect_errno." ".$con->connect_error);

    }

    $con1->query("SET NAMES 'utf8'");
 
    if(isset($_POST["nom"]))
    {

        $nom = $_POST["nom"];
		$supplier = $_POST["supplier"];
		$category = $_POST["category"];
		$disccount = $_POST["disccount"];

        $sql = "INSERT INTO products(ProductName,SupplierID,CategoryID,Discontinued) VALUES('".$nom."',".$supplier.",".$category.",".$disccount.")";

        $result = $con1->query($sql);

    }

    $con1->close();

?>
<html>
	<head>
		<title>Index</title>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<script src="../jquery-3.4.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">

		<style>
			#tableDiv {
				overflow-x: auto;
			}

			.newRow {
				background-color: #0000ff;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-8">
					<h3>Products</h3>
				</div>
				<div class="col-xs-4">
					<button type="button" class="btn btn-primary" id="buttonAfegir">Afegir</button>
				</div>
			</div>
			<div class="row">
				<div id="tableDiv" class="col-xs-8">
					<table class="table table-bordered table-hover table-striped table-responsive" id="suppliersTable">
					</table>
				</div>
				<div id="formDiv" class="col-xs-4"></div>
			</div>
		</div>

		<script>
			$(function () {
				function loadProducts() {
					$.ajax({
						url: "dbquery_products.php",
						method: "post",
						dataType: "html",
						success: function (data, status) {
							var suppliersTableHtml = $(data).find("#table1");
							$("#suppliersTable").html($(suppliersTableHtml).html());
						},
						error: function () {
							alert("Error");
						}
					});
				}

				$(document).on("click", ".filaSuppliers", function () {
					var supplierID = $(this).children(":first").html();
					$.ajax({
						url: "dbquery_updateform.php",
						method: "post",
						data: "ProductID=" + supplierID,
						dataType: "html",
						success: function (data, status) {
							var formDivHtml = $(data).filter("#formDiv");
							$("#formDiv").html($(formDivHtml).html());
							$("#formDiv").show();
						},
						error: function () {
							alert("Error");
						}
					});
				});

				$(document).on("click", "#formSubmitButton", function () {
					$.ajax({
						url: "dbquery_update.php",
						type: "post",
						dataType: "html",
						data: $("form#supplierForm").serialize(),
						success: function (data, status) {
							var newRowHtml = $(data).filter("#newRow");
							var rowId = $("form#supplierForm input[name=ProductID]").val();
							$("#suppliersRow" + rowId).html($(newRowHtml).html());
						},
						error: function () {
							alert("Error");
						}
					});
					return false;
				});

				$(document).on("click", "#buttonAfegir", function () {

                    window.location = "dbquery_insert.php";

				});

				$("#formDiv").hide();
				loadProducts();
			});
		</script>
	</body>
</html>