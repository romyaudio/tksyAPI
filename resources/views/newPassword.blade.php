<!DOCTYPE html>
<html>
<head>
	<title>New | Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<style type="text/css">
		.logo{
			text-align: center;
			padding: 5px;
			margin: 10px auto;
			background: #ddd;
		}
		.title{
			text-align: center;
		}
		.container{
			padding: 20px;
			margin:20px auto;
		}
		img{
			width: 65px;
			height: 65px;
		}
		small{
			color: red;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="logo">
			<img src="/img/ticketssy-icon.png" alt="logo">
		</div>
		<h1 class="title">New Password</h1>
		<div class="email lead">
			<p>{{$email}}</p>
		</div>
		<form method="POST" action="/new/password">
			 @csrf
			<div class="form-group">
				<input type="hidden" name="email" value="{{$email}}">
				<label> New Password</label>
				<input type="password" class="form-control" name="password" value="{{  old('password') }}" />
				<small><strong>{{$errors->post->first('password')}}</strong></small>
			</div>

			<div class="form-group">
				<label> Confirm Password</label>
				<input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation')}}" />
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

</body>
</html>