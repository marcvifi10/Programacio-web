<!DOCTYPE html>
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
					<h3>Suppliers</h3>
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
				function loadSuppliers() {
					$.ajax({
						url: "dbquery_suppliers.php",
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
						data: "SupplierID=" + supplierID,
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
							var rowId = $("form#supplierForm input[name=SupplierID]").val();
							$("#suppliersRow" + rowId).html($(newRowHtml).html());
						},
						error: function () {
							alert("Error");
						}
					});
					return false;
				});

				$("#formDiv").hide();
				loadSuppliers();
			});
		</script>
	</body>
</html>