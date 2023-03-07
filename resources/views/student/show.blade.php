<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Show Data
	</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col md-12">
			<h1>{{ $stud->name }}</h1>
			@forelse($stud->courseSub as $sub)
				{{ $sub['course'] }}
			@empty
				<p>No Course Found</p>
			@endforelse
		</div>
	</div>
</div>
</body>
</html>