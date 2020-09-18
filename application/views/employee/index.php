<!DOCTYPE html>
<html>
<head>
	<title>Read Data</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
</head>
<body>

	<div class="alert alert-success" style="display: none;">
			
	</div>

	<div class="row" style="margin: 10px;">
		<!-- Button trigger modal -->
		<button id="btnAdd" class="btn btn-primary">
		  Add New User
		</button>
		

		<!-- Modal -->
		<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form id="myForm" action="" method="POST">
		          <input type="hidden" name="txtId" value="0">
				  <div class="form-group">
				    <label for="username">Username</label>
				    <input type="text" class="form-control" name="username" id="username">
				  </div>
				  <div class="form-group">
				    <label for="name">Name</label>
				    <input type="text" class="form-control" name="name" id="name">
				  </div>
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" name="email" id="email">
				  </div>
				  <div class="form-group">
				    <label for="gender">Gender</label>
				    <input type="text" class="form-control" name="gender" id="gender">
				  </div>
		    	</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" id="btnSave" class="btn btn-primary">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>


	<!-- Modal -->
		<div id="deleteModal" class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        Do you want to delete this record ?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="button" id="btnDelete" class="btn btn-danger">Delete</button>
		      </div>
		    </div>
		  </div>
		</div>

	<div class="container">
		<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">First</th>
			      <th scope="col">Last</th>
			      <th scope="col">Email</th>
			      <th scope="col">Gender</th>
			      <th>Action</th>
			    </tr>
			  </thead>
			  <tbody id="showData">
			  </tbody>
		</table>
	</div>

	<script src="<?php echo base_url(); ?>script/jquery-3.5.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(function(){

			showAllEmployee();


			//btn Add New User Form
			$('#btnAdd').click(function(){

				$('#myModal').modal('show');
				//add modal title
				$('#myModal').find('.modal-title').text('Add New User');
				//add attribute action to the form 
				$('#myForm').attr('action', '<?php echo base_url() ?>index.php/employee/addEmployee');
			});

			//btn Save
			$('#btnSave').click(function(){
				var url = $('#myForm').attr('action');
				var data = $('#myForm').serialize();

				//validate form
				var userName = $('input[name=username]');
				var name = $('input[name=name]');
				var email = $('input[name=email]');
				var gender = $('input[name=gender]');
				var result = '';
				if (userName.val()=='') {
					//parent disini mengacu pada div diatasnya sehingga class has error jadi pindah ke div atas sebanyak brp kali diulangi
					// userName.parent().parent().addClass('has-error');
					userName.parent().addClass('has-error');

				}else{
					// userName.parent().parent().removeClass('has-error');
					userName.parent().removeClass('has-error');
					result +='1';
				}

				if (name.val()=='') {
					//parent disini mengacu pada div diatasnya sehingga class has error jadi pindah ke div atas sebanyak brp kali diulangi
					// name.parent().parent().addClass('has-error');
					name.parent().addClass('has-error');

				}else{
					// name.parent().parent().removeClass('has-error');
					name.parent().removeClass('has-error');
					result +='2';
				}

				if (email.val()=='') {
					//parent disini mengacu pada div diatasnya sehingga class has error jadi pindah ke div atas sebanyak brp kali diulangi
					// email.parent().parent().addClass('has-error');
					email.parent().addClass('has-error');

				}else{
					// email.parent().parent().removeClass('has-error');
					email.parent().removeClass('has-error');
					result +='3';
				}

				if (gender.val()=='') {
					//parent disini mengacu pada div diatasnya sehingga class has error jadi pindah ke div atas sebanyak brp kali diulangi
					// gender.parent().parent().addClass('has-error');
					gender.parent().addClass('has-error');

				}else{
					// gender.parent().parent().removeClass('has-error');
					gender.parent().removeClass('has-error');
					result +='4';
				}

				if (result=='1234') {
					$.ajax({
						type: 'ajax',
						method: 'post',
						url: url,
						data: data,
						async: false,
						dataType: 'json',
						success: function(response){
							if (response.success) {
								$('#myModal').modal('hide');
								$('#myForm')[0].reset();
								if (response.type=='add') {
									var type = 'added';
								}else if (response.type=='update') {
									var type = 'updated';
								}	
								$('.alert-success').html('Employee '+type+' Successfully!').fadeIn().delay(4000).fadeOut('slow');
								showAllEmployee();
								console.log('success Add Data');
							}else{
								alert('error');
							}
						},
						error: function(){
							alert('Could not load data');
						}
					});
				}


			});

			function showAllEmployee(){
				$.ajax({
					type: 'ajax',
					url: '<?php echo base_url() ?>index.php/employee/showAllEmployee',
					async: false,
					dataType: 'json',
					success: function(data){
						console.log(data);
						var html = '';
						var i;
						for (i=0; i<data.length; i++) {
								
							html += '<tr>'+
								  		'<td>'+data[i].id+'</td>'+
								  		'<td>'+data[i].username+'</td>'+
								  		'<td>'+data[i].name+'</td>'+
								  		'<td>'+data[i].email+'</td>'+
								  		'<td>'+data[i].gender+'</td>'+
								  		'<td>'+
								  			'<a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id+'">Edit</a>'+
								  			'<a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id+'">Delete</a>'+
								  		'</td>'+
								  	'</tr>';
						}
						$('#showData').html(html);
					},
					error: function(){
						alert('Could not get data from database');
					}
				});
			}

			//Edit data
			$('#showData').on('click', '.item-edit', function(){
				var id = $(this).attr('data');
				console.log(id);
				$('#myModal').modal('show');
				$('#myModal').find('.modal-title').text('Edit Employee');
				$('#myForm').attr('action', '<?php echo base_url() ?>index.php/employee/updateEmployee');
				$.ajax({
					type: 'ajax',
					method: 'get',
					url : '<?php echo base_url() ?>index.php/employee/editEmployee',
					data : {id: id},
					async : false,
					dataType: 'json',
					success: function(data){
						console.log(data);
						$('input[name=username]').val(data.username);
						$('input[name=name]').val(data.name);
						$('input[name=email]').val(data.email);
						$('input[name=gender]').val(data.gender);
						$('input[name=txtId]').val(data.id);
					},
					error: function(){
						alert('Could not add data');
					}
				});
			});


			//delete
			$('#showData').on('click', '.item-delete', function(){
				var id = $(this).attr('data');
				$('#deleteModal').modal('show');

				//prevent previous handler - unbind()
				$('#btnDelete').unbind().click(function(){
					$.ajax({
						type: 'ajax',
						method: 'get',
						async: false,
						url: '<?php echo base_url() ?>index.php/employee/deleteEmployee',
						data: {id: id},
						success: function(response){
							$('#deleteModal').modal('hide');
							$('.alert-success').html('Employee Deleted Successfully!').fadeIn().delay(4000).fadeOut('slow');
							showAllEmployee();
						},	
						error: function(){
							alert('Error deleting');
						}
					});
				});
			});



		});
	</script>
</body>
</html>