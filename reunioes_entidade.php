<?php require_once('function.php');
		verificaLogin();
		checkHeader( 'id' );
		fazConexao();
		
		$id = mysql_real_escape_string( $_GET['id'] );
		$org = getOrganizacao($id);
		if( $org == NULL){
			header('Location: 404.php');
			exit();
		}
	
?>
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
	<script src="js/script.js"></script>  
</head>
<body>

	<?
		popUpInfoReuniao(); 
		popUpAddFeedback() ;
	?>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			
                <ul id="nav" class="fl">
        
                    <li class="v-sep"><a href="../../crm/dashboard.php" class="round button dark ic-left-arrow image-left">Home Page</a></li>
                    <li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
                        <ul>
                            <li><a href="#">My Profile</a></li>
                            <li><a href="#">User Settings</a></li>
                            <li><a href="#">Change Password</a></li>
                            <? if(!isset($user)) {
                           		echo "<li><a href='painel.php'>Lista de users</a></li>";
                            	}
                             ?>
                            <li><a href="#">Log out</a></li>
                        </ul> 
                    </li>
                
                   <li class="v-sep"><a href="#" class="round button dark menu-new-special image-left">MENU</a>
                        <ul>
                            <li><a href="#">Adicionar Entidade</a></li>
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
	
	
	
	<!-- HEADER -------------------------------------------------->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="entidade.php?id=<? echo $id ?>"  >Dados</a></li>
				<li><a href="reunioes_entidade.php?id=<? echo $id ?>" class="active-tab dashboard-tab">Reuniões</a></li>
				<li><a href="page-other.html">Enviar Mail</a></li>
			</ul> <!-- end tabs -->
			<!--<a id="myLink" title="Click to do something" href="#"  class="button round blue image-right ic-add text-upper">Add</a>-->
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" width="215" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
			
              					
					
					<div class="content-module-main">
					
							<? tabelaReunioes( $id )	?>						
							
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
                
		
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec</a></p>
	
	</div> <!-- end footer -->

</body>
</html>