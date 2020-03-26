<!DOCTYPE html>
<html>
    <head>
        <title>
        </title>
        <style type="text/css">
            html, body {
			background-color: #fff;
			color: #636b6f;
			font-family: 'Nunito', sans-serif;
			font-weight: 200;
			height: 100vh;
			margin: 0;
		}
		.container{
			background:#ECF2F5 ;
			padding: 20px;
		}
		.logo{
			text-align: center;
			padding: 10px;
		}
		.logo img{
			width: 50px;
		}
		.title{
			margin: auto;
			padding: 10px;
			text-align: center;
			border-bottom: solid 1px #1f7388;	
			background: #fff;
		}
		.hello{
			margin: auto;
			padding: 10px;
			
			background: #fff;
		}
		.link{
			text-align: center;
			margin: auto;
			padding: 30px;
			border-bottom: solid 1px #1f7388;
			
			background: #fff;
		}
		.link a{

			text-decoration: none;
			padding: 10px 20px;
			margin: 10px auto;
			background: #1f7388;
			color: #fff;
			border-radius: 5px;
		}
		.footer{
			margin: auto;
			text-align: center;

		}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="logo">
                <img alt="logo" src="http://localhost:8000/img/ticketssy-icon.png">
                </img>
            </div>
            <div class="title">
                <h1>
                    Welcome to Ticketssy!
                </h1>
            </div>
            <div class="hello">
                <p>
                    Hello:
                    <strong>
                        {{$user['name']}}
                    </strong>
                </p>
                <p>
                    Confirm your email address - that way you'll be ready to log in to your Ticketssy Web Dashboard, where you will be able to view reports, see transactions, and manage employees.
                </p>
            </div>
            <div class="link">
                <a href="{{$url}}">
                    Confirm Email
                </a>
            </div>
            <div class="footer">
                <small>
                    © 2020 Ticketssy. All rights reserved.
                </small>
            </div>
        </div>
    </body>
</html>