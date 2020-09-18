<!DOCTYPE html>
<html>
<head>
	<title>Read Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">First</th>
	      <th scope="col">Last</th>
	      <th scope="col">Email</th>
	      <th scope="col">Gender</th>
	    </tr>
	  </thead>
	  <tbody id="target">
	   
	  </tbody>
	</table>

	<script src="<?php echo base_url(); ?>script/jquery-3.5.1.min.js"></script>
	<script type="text/javascript">
		
		ambilData();

		function ambilData(){
			$.ajax({
				type: 'POST',
				url : '<?php echo base_url()."index.php/tutor/ambilData" ?>',
				dataType : 'json',
				success: function(data){
					console.log(data);
					var baris = '';
					for (var i = 0; i < data.length; i++) {
						baris += '<tr>'+
									'<td>'+ data[i].id +'</td>'+
									'<td>'+ data[i].username +'</td>'+
									'<td>'+ data[i].name +'</td>'+
									'<td>'+ data[i].email +'</td>'+
									'<td>'+ data[i].gender +'</td>'+
								 '</tr>';
					}
					$('#target').html(baris);
				}
			});
		}

	</script>

</body>
</html>