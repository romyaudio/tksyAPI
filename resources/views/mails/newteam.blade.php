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
		.credeciales{
            width: 98%
            margin 3px auto;
            padding: 10px;
            background:#636b6f;
            border-radius: 5px; 
		}
		.credeciales p{
			text-align: center;
			padding: 7px;
			margin:3px;
			color: #fff;
			background: #1a2a2e;
			border: solid 1px #ddd;
			line-height: 25px;
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
                    Welcome to {{$team['business']}}!
                </h1>
            </div>
            <div class="hello">
                <p>
                    Hello:
                    <strong>
                        {{$team['team']}}
                    </strong>
                </p>
                <p>
                    {{$team['business']}}. has invited you to be part of his team,
                    To login use your email and this password.
                </p>
                <div class="credeciales">
                    <p>
                        Email:
                        <br>
                            <strong>
                                {{$team['email']}}
                            </strong>
                        </br>
                    </p>
                    <p>
                        Password:
                        <br>
                            <strong>
                                {{$team['password']}}
                            </strong>
                        </br>
                    </p>
                </div>
                <div class="link">
                    <a href="localhost:3000/login">
                        Login
                    </a>
                </div>
                <div class="footer">
                    <small>
                        © 2020 Ticketssy. All rights reserved.
                    </small>
                </div>
            </div>
        </div>
    </body>
</html>