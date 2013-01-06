<?php require_once('function.php');
		$username = verificaLogin();
?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aiesec-CRM</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
	
	<!-- Optimize for mobile devices -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
	<!-- jQuery & JS files -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
	<script src="js/script.js"></script>  
   	<script src="js/jquery-ui-timepicker-addon.js"></script> 
</head>
<body>

	<? popUpInfoReuniao();  ?>
	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			 <ul id="nav" class="fl">
        
                    <li class="v-sep"><a href="dashboard.php" class="round button dark ic-left-arrow image-left">Home Page</a></li>
                    <li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><? echo $username;?></strong></a>
                        <ul>
                            <li><a href="profile.php" >My Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <!--<li><a href="#">User Settings</a></li>-->
                            <? if($username == 'admin') {
                           		echo "<li><a href='painel.php'>Lista de users</a></li>";
                            	}
                             ?>
                            <li><a href="logout.php">Log out</a></li>
                        </ul> 
                    </li>
                
                   <li class="v-sep"><a href="#" class="round button dark menu-new-special image-left">Menu</a>
                        <ul>
                            <li><a href="nova_organizacao.php">Adicionar Entidade</a></li>
                            <li><a href="nova_reuniao.php">Adicionar Reunião</a></li>
                            <li><a href="#">Adicionar Evento</a></li>
                        </ul> 
                    </li>
                    <li class="v-sep"><a href="pesquisa.php" class="round button dark menu-pesquisa image-left">Pesquisar</a></li>
                    
                   

                    <a href="calendario.php" class="round button dark menu-cal image-left">Calendário</a></li>
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
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
				<li><a href="page-full-width.html">Full width page</a></li>
				<li><a href="page-other.html" class="active-tab">Other page elements</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" ></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
     
		<div class="page-full-width cf">

			<div class="side-content2 fr">
			
				<div class="medium-size-column fr">
				
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Ultimas Reuniões</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main">
						
                        	<? listaUltimasReunioes( 0 ); ?>
							
							<div class="stripe-separator"><!-- --></div>
							
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
				
				</div> <!--end half-size-column-->

				<div class="half-size-column fl">
				
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Proximas Reuniões</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main cf">
					
                    		<?php listaProximasReunioes( 0 , 1); ?>
							
							<div class="stripe-separator"><!-- --></div>
							
						</div> <!-- end content-module-main -->
						
					</div> <!-- end content-module -->
                    
                    

					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Ultimas entidades</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main cf">
					
							<div class="half-size-column fl">
						
								<h2 class="text-upper">A simple unordered list</h2>
								
								<ul class="regular-ul">
									<li>This is list item number 1.</li>
									<li>Another list item.</li>
									<li>A slightly longer list item.</li>
									<li>Another list item.</li>
								</ul>
								
								<p>To add a simple list, make sure you specify <code>class="regular-ul"</code> to the list.</p>
								
							</div>
							
							<div class="half-size-column fr">
								
								<h2 class="text-upper">A custom unordered list</h2>
								
								<ul class="custom-ul">
									<li><a href="#">Some links go here</a></li>
									<li><a href="#">Another link</a></li>
									<li><a href="#">And yet another link</a></li>
								</ul>

								<p>To add a custom list, make sure you specify <code>class="custom-ul"</code> to the list.</p>

							</div>
							
						</div> <!-- end content-module-main -->
						
					</div> <!-- end content-module -->

				</div> <!--end half-size-column-->
                
                <div class="half-size-column fl">
				
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Ultimas notas</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main cf">
					
							<div class="half-size-column fl">
						
								<h2 class="text-upper">A simple ordered list</h2>
								
								<ol>
									<li>This is list item number 1.</li>
									<li>Another list item.</li>
									<li>A slightly longer list item. This will probably wrap on the next line.</li>
									<li>Another list item.</li>
								</ol>
						
							</div>
							
							<div class="half-size-column fr">
								
								<h2 class="text-upper">An ordered list with links</h2>
								
								<ol>
									<li><a href="#">Some links go here</a></li>
									<li><a href="#">Another link</a></li>
									<li><a href="#">And yet another link</a></li>
								</ol>
							
							</div>
							
						</div> <!-- end content-module-main -->
						
					</div> <!-- end content-module -->
                 </div><!--end half-size-column fl -->
                    
                    <div class="half-size-column fl">
				
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Estatísticas</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main cf">
					
							<div class="half-size-column fl">
						
								<h2 class="text-upper">A simple ordered list</h2>
								
								<ol>
									<li>This is list item number 1.</li>
									<li>Another list item.</li>
									<li>A slightly longer list item. This will probably wrap on the next line.</li>
									<li>Another list item.</li>
								</ol>
						
							</div>
							
							<div class="half-size-column fr">
								
								<h2 class="text-upper">An ordered list with links</h2>
								
								<ol>
									<li><a href="#">Some links go here</a></li>
									<li><a href="#">Another link</a></li>
									<li><a href="#">And yet another link</a></li>
								</ol>
							
							</div>
							
						</div> <!-- end content-module-main -->
						
					</div> <!-- end content-module -->
                    
                    
                    
                    
	
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec</a></p>
	
    
     
	</div> <!-- end footer -->

</body>
</html>