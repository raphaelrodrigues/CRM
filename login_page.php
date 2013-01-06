<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRM-Aiesec</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">

	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
    
    <!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script src="js/script.js"></script>   
</head>
<body>


	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width">
		
			<a href="#" class="round button dark ic-left-arrow image-left "></a>
			
		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
    
            <div id="login-intro" class="fl">
			
				<h1>Login to CRM-Aiesec</h1>
				<h5>Enter your credentials below</h5>
			
			</div> <!-- login-intro -->
			<div id="registar">
				<p><a href="registo.php">Registar-se</a></p>
			</div>
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><img src="images/aiesec.gif"  /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	   	

		<form action="login.php" method="POST" id="login-form">
			<? include( 'function.php'); checkErrors();?>
			<fieldset>

				<p>
					<label for="login-username">Username</label>
					<input type="text" id="login-username" name="user" class="round full-width-input" autofocus />
				</p>

				<p>
					<label for="login-password">Password</label>
					<input type="password" id="login-password" name="pass" class="round full-width-input" />
				</p>
                
                <p>
                 <label for="remember">
                            <input type="checkbox" name="remember" id="remember" value="1" /> Remember me
                 </label>
				</p>
                
				<p>I've <a href="#">forgotten my password</a>.</p><br>
				
				

			</fieldset>
			<input type="submit" class="button round blue image-right ic-right-arrow" value="Login"/>
			<br/><br> 
			
		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec Minho</a>. All rights reserved.</p>
		<p><strong>CRM</strong> theme by <a href="http://www.aiesec.pt">Aiesec</a></p>
	
	</div> <!-- end footer -->

</body>
</html>