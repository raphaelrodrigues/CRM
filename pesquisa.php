<?
	include ('function.php');
	include ('functions_pagination.php');
	$username = verificaLogin();
	?>
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>AiesecCRM</title>
	
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
<? popUpInfoEntidade();?>
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

					
			<form action="pesquisa.php" method="GET" id="search-form" class="fr">
                    <fieldset>
                        <input  id="autocompleteReOrg" title="type &quot;a&quot;" type="text" name="consulta" class="round button dark ic-search image-right" placeholder="Search...">
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
				<li><a href="pesquisa.php" class="active-tab "> &nbsp;&nbsp;Pesquisa &nbsp;&nbsp;</a></li>
				<li><a href="page-other.html">Other page elements</a></li>
			</ul> <!-- end tabs -->
			
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
        
      <div id="pesquisa" class="pesquisa">
          <form name="formPesq"  method="POST" id="search-form" >
           <fieldset>
            <input  id="autocompletePesquisa" title="type &quot;a&quot;" type="text" name="consulta" class="round button dark ic-search image-right" placeholder="Search...">

         
	         <select id="opt" name="opt" class="styled-select">
	                        <option value="Nome">Nome</option>
	                        <option value="SectorActividade">Sector Actividade</option>
	                        <option value="Cidade">Cidade</option>
	                        <option value="">Clients</option>
	                        <option value="">News</option>
	          </select>
	          <input  type="button" value="Pesquisar" id="submitP" class="round blue ic-right-arrow"/>
	          </fieldset>
	         </form>
           
           </div><!--end of pesuisa-->
	</div>
     
		<div class="page-full-width cf">
			<div class="content-module">
			
				<div class="content-module-heading cf">
				
					<h3 class="fl">Resultados</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				
				</div> <!-- end content-module-heading -->
				
                <div class="content-module-main">
					
					<?  
								paginateOrganizacao();
							
					?>

                                
                                
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
		
        		
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec</a></p>
	
	</div> <!-- end footer -->

</body>
</html>