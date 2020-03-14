<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
   <style type="text/css">
	.logo{
		text-align: center;
		padding: 5px;
		margin: 10px auto;
		background: #ddd;
	}
	.container{
		padding: 20px;
		margin:20px auto;
	}
	img{
		width: 65px;
		height: 65px;
	}
	.msg{
		font-size: 20px;
	}
	.login{
		margin: 15px auto;
	}
   </style>
</head>

<body>
   <div class="container bg-light">
   	  <div class="logo">
   	  	<img src="/img/ticketssy-icon.png" alt="logo">
   	  	 </div>
   	  	<div class="title">
   	  		<h3>Verify Email</h3>
   	  	</div>
   	  	<div class="msg">
   	  		{{ $msg['msg'] }}
   </div>
   <div class="login">
   	<a id="btn" class="btn btn-primary btn-mid" href="">Login</a>
   </div>
</div>
</body>
</html>