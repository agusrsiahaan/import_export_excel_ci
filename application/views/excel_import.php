<!DOCTYPE html>
<html>
	<head>
		<title>Test Import</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="container">
			<a href="<?php echo base_url("index.php/employee/export"); ?>">Export ke Excel</a><br><br>
			<form method="post" id="import_form" enctype="multipart/form-data">
				<p><label>Select Excel File</label>
				<input type="file" name="file" id="file" required accept=".xls, .xlsx"></p>
				<br>
				<input type="submit" name="import" value="Import" class="btn btn-info">
			</form>
			<br>
		</div>
		<div class="table-responsive" id="customer_data">
		</div>
		<script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
	</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		
		load_data();

		function load_data()
		{
			$.ajax({
				url: "<?php echo base_url(); ?>index.php/excel_import/fetch",
				method: "POST",
				success: function (data){
					$('#customer_data').html(data); 
				}
			})
		}

		$('#import_form').on('submit', function(event){

			event.preventDefault();
			$.ajax({
				url:"<?php echo base_url(); ?>index.php/excel_import/import",
				method:"POST",
				data: new FormData(this),
				contentType: false,
				cache:false,
				processData:false,
				success: function(data){
					$('#file').val('');
					load_data(); 
					alert(data);
				}
			})
		});

	});
</script>