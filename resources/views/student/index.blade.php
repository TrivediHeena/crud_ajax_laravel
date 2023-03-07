<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

<!-- Modal -->
<div class="modal fade" id="AddStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddStudentModalLabel">Add Students</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
        	<label>Name</label>
        	<input type="text" name="name" class="name form-control" />
        </div>
        <div class="form-group mb-3">
        	<label>Course</label>
        	<input type="text" name="course" class="course form-control" />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_student">Save</button>
      </div>
    </div>
  </div>
</div>

<div class="container py-5">
	<div class="row">
		<div class="col md-12">
			<div id="success_message"></div>
			<div class="card">
				<div class="card-header">
					<h4>Students Data
					<a href="#" data-bs-toggle="modal" data-bs-target="#AddStudentModal" class="btn btn-primary">Add Student</a></h4>
				</div>
				<div class="card-body">
					<table class="table table-bordered">
						<thead>
							<tr><th>Id</th><th>Name</th><th>Course</th></tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
	$(document).ready(function(){
		fetch_students()
		function fetch_students() {
			$.ajax({
				type:'GET',
				url:'/fetchstudents',
				dataType:'json',
				success: function(response){
					console.log(response.students);
					$.each(response.students,function(key,item){
						$('tbody').append('<tr>\
							<td>'+item.id+'</td>\
							<td>'+item.name+'</td>\
							<td>'+item.course+'</td>\
							<td><a href=students/show/'+item.id+'>Show</a></td></tr>');
					});
				}
			});
		}
		$(document).on('click','.add_student',function (e) {
			e.preventDefault();
			//console.log('Hello');
			var data = {
				'name':$('.name').val(),
				'course':$('.course').val()
			}
			//console.log(data);
			$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
			$.ajax({
				type:'POST',
				url:'/add_student',
				data:data,
				dataType:'json',
				success: function(response){
					if(response.status==200){
						$('#success_message').addClass('alert alert-success');
						$('#success_message').text(response.message);
						$('#AddStudentModal').modal('hide');
						$('#AddStudentModal').find('input').val('');
					}
				}
			});
		});
	});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>