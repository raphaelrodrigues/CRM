<?php 	require_once('function.php');
		verificaLogin();
		$username = $_SESSION['user'];

		$user = getUtilizador($username);
		
		if( $user == NULL)
			exit();
		
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>AiesecCRM</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="js/jquery.reveal.js"></script>
	<script src="js/script.js"></script>  
</head>
<body>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="dashboard.php" class="round button dark ic-left-arrow image-left">Home Page</a></li>
				<li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><? echo $username; ?></strong></a>
					<ul>
						<li><a href="#">My Profile</a></li>
						<li><a href="#">User Settings</a></li>
						<li><a href="#">Change Password</a></li>
                        <? if( $_SESSION['perm'] == 1 ) {
                           		echo "<li><a href='painel.php'>Lista de users</a></li>";
                           		echo "<li><a href='mails.php'>Mails Enviados</a></li>";
                               }
                        ?>						
                       <li><a href="#">Log out</a></li>
					</ul> 
				</li>
			
				<li class="v-sep"><a href="#" class="round button dark menu-new-special image-left">MENU</a>
                        <ul>
                            <li><a href="formEmpresa.php">Adicionar Entidade</a></li>
                            <li><a href="#">Adicionar Reunião</a></li>
                            <li><a href="#">Adicionar Evento</a></li>
                        </ul> 
                    </li>
				<li><a href="#" class="round button dark menu-logoff image-left">Log out</a></li>
				
			</ul> <!-- end nav -->

					
			<form action="#" method="POST" id="search-form" class="fr">
				<fieldset>
					<input type="text" id="search-keyword" class="round button dark ic-search image-right" placeholder="Search..." />
					<input type="hidden" value="SUBMIT" />
				</fieldset>
			</form>

		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
	
	
	
	<!-- HEADER -->
	<div id="header-with-tabs">
		
		

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<? checkProfile();?>
		
			

			<div class="content-module">
			
				<div class="content-module-heading cf">
				
					<h3 class="fl">Profile</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
								<!--organizaçao a adicionar a reuniao-->
								
								<ul class="regular-ul2">
									<li><p>Nome</p> <? echo $user->getNome(); ?></li>
									<li> <p>Mail</p>  <? echo $user->getEmail(); ?></li>
									<li><p>Username</p> <? echo $user->getUser(); ?></li>
									<li><p>Data de Registo</p> <? $user->getDataRegisto(); ?></li>
                                </ul>
                        <div id="profile">
                            <input type="button" value="Alterar Password" class="round blue ic-download showResp" /><br><br>
                            <div id="responsavelOrg">
                                  <form name = "mudarPass" action="change_password.php" method="post" >
                                
                                    <fieldset>
                                        
                                        <input type="text" value='<? echo $user->getUser(); ?>' name="username" class="round default-width-input" />                     
                                        <p><label for="simple-input">Actual</label>
                                        	 <input type="password" name="passActual" class="round default-width-input" />
                                        </p>
                                        
                                        <p><label for="simple-input">Nova</label>
                                        	 <input type="password"  name="pass1" class="round default-width-input" />
                                        </p>
                                        
                                        <p><label for="simple-input">Reescrever nova</label>
                                        	 <input type="password"  name="pass2" class="round default-width-input" />
                                        </p>
 
       								 </fieldset>
        
       								 <br>
                                    <input type="submit" value="Mudar Password" class="round blue ic-right-arrow" /><br><br>
         
                                
                                
                                 </form>
                            </div><!--end profile-->           
                        </div>
             	
					                                 

				
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec@COMM</a></p>
	
	</div> <!-- end footer -->

</body>
</html>