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
		
			<a href="login_page.php" class="round button dark ic-left-arrow image-left "></a>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header">
		
		<div class="page-full-width cf">
	
			<div id="login-intro" class="fl">
			
				<h1>Login to CRM-Aiesec</h1>
				<h5>Enter your credentials below</h5>
			
			</div> <!-- login-intro -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 39px height. -->
			<a href="#" id="company-branding" class="fr"><img src="images/aiesec" alt="" width="400"  /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
	
		<form name="registoForm" action="registar.php" method="POST" id="registo-form" onsubmit="return validaFormRegisto();">
		
			<fieldset>
				
                <p>
					<label >Nome*</label>
					<input type="text" id="nome" name="nome" class="round full-width-input" autofocus />
				</p>
                <p>
					<label>Username*</label>
					<input type="text" id="user" name="user" class="round full-width-input" onkeyup="verificaUser(this.value)" autofocus />
                    <em id="userEM">exemplo: jose.rodrigues</em>
				</p>
				
				
                <p>
					<label>Email*</label>
					<input type="text" id="email" name="email" class="round full-width-input" autofocus />
				</p>
                
				<p>
					<label for="login-password">Password*</label>
					<input type="password" id="pass" name="pass" class="round full-width-input" />
				</p>
                
                <p>
					<label for="login-password">Confirmar Password*</label>
					<input type="password" id="pass-confirm" name="pass-confirm" class="round full-width-input" />
				</p>
                
				

			</fieldset>
             <div class="stripe-separator"><!--  --></div>
			<input name="submit" type="submit" class="button round blue image-right ic-right-arrow" value="Registar"/>
             <div class="stripe-separator"><!--  --></div>
		</form>
		
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec Minho</a>. All rights reserved.</p>
		<p><strong>CRM</strong> theme by <a href="http://www.aiesec.pt">Aiesec</a></p>
	
	</div> <!-- end footer -->

</body>
</html>