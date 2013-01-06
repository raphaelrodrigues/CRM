<?php require_once('function.php');
		//if the user has not logged in
		verificaLogin();
		$username = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRM-Aiesec</title>
	
	<!-- Stylesheets -->
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
	<link rel="stylesheet" href="css/style.css">
    <link href="css/jquery-ui-1.9.2.custom.css" rel="stylesheet">
	
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
		
		<div class="page-full-width cf">
                
                <ul id="nav" class="fl">
        
                    <li class="v-sep"><a href="dashboard.php" class="round button dark ic-left-arrow image-left">Home Page</a></li>
                    <li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong><? echo $username;?></strong></a>
                        <ul>
                            <li><a href="profile.php" >My Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
                            <!--<li><a href="#">User Settings</a></li>-->
                            <? if( $_SESSION['perm'] == 1 ) {
                           		echo "<li><a href='painel.php'>Lista de users</a></li>";
                           		echo "<li><a href='mails.php'>Mails Enviados</a></li>";
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
	
	
	
	<!---------------------------------- HEADER -------------------------------------------->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a href="dashboard.php" class="active-tab dashboard-tab">Dashboard</a></li>
				<li><a href="pesquisa.php"> &nbsp;&nbsp;Pesquisa &nbsp;&nbsp;</a></li>
				<li><a href="page-other.php">Other page elements</a></li>
			</ul> <!-- end tabs -->
			<!--<a id="myLink" title="Click to do something" href="#"  class="button round blue image-right ic-add text-upper">Add</a>-->
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/aiesec.gif" alt="" width="215" /></a>
            
		</div> <!-- end full-width -->	
       
     

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
    <?
		if( isset($_GET['sucess']) ){
			if( $_GET['sucess'] == 1)
				echo "<div class='confirmation-box round'>Informação inserida com sucesso.</div>";
		}
	?>
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>BackOffice</h3>
				
				<ul class="menuBackoffice">
					<li id ="addOrganizacao"><a href="nova_organizacao.php">Adicionar Entidade</a></li>
                    <li id ="addReuniao1"><a href="nova_reuniao.php">Adicionar Reunião</a></li>
					<li id ="addEvento"><a href="#"><span class="frente">Adicionar Evento</span></a></li>
					<li id ="addNota"><a href="#"><span class="frente">Adicionar Nota</span></a></li>
				</ul>
				
			</div> <!-- end side-menu -->
			
			<div class="side-content fr">
			
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Tabela de Entidades</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
						<? tabelaOrganizacao(); ?>					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
				
				<div class="content_form">
                    <div class="content-module">
                    
                        <div class="content-module-heading cf" id="addEntidade">
                        
                            <h3 class="fl">Adicionar nova entidade</h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            
                                <form action="#">
                                
                                    <fieldset>
                                    
                                        <p>
                                            <label for="simple-input">Nome da entidade</label>
                                            <input type="text" id="simple-input" class="round default-width-input" />
                                        </p>
                                        
                                        <p>
                                            <label for="full-width-input">Contacto</label>
                                            <input type="text" id="full-width-input" class="round full-width-input"/>
                                            <em>Preferência número de telefone</em>								
                                        </p>
        
                                        <p>
                                            <label for="another-simple-input">Descrição</label>
                                            <input type="text" id="another-simple-input" class="round default-width-input"/>
                                            <em>Pequena descrição da empresa</em>								
                                        </p>
        
                                        <p class="form-error">
                                            <label for="error-input">Erro de formato</label>
                                            <input type="text" id="error-input" class="round default-width-input error-input"/>
                                            <em>Email inválido</em>								
                                        </p>
                                        
                                    </fieldset>
                                
                                </form>
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                                <form action="#">
                                
                                    <fieldset>
                                    
                                        <p>
                                            <label for="textarea">Textarea</label>
                                            <textarea id="textarea" class="round full-width-textarea"></textarea>
                                            
                                           
                                        </p>
                                         <p>Date: <input type="text" id="datepicker" /></p>
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <p>
                                            <label>Checkboxes</label>
                                            <label for="selected-checkbox" class="alt-label"><input type="checkbox" id="selected-checkbox" checked="checked" />A selected checkbox</label>
                                            <label for="unselected-checkbox" class="alt-label"><input type="checkbox" id="unselected-checkbox" />An uselected checkbox</label>
                                        </p>
        
                                        <p>
                                            <label>Radio buttons</label>
                                            <label for="selected-radio" class="alt-label"><input type="radio" id="selected-radio" checked="checked" />A selected radio</label>
                                            <label for="unselected-radio" class="alt-label"><input type="radio" id="unselected-radio" />An uselected radio</label>
                                        </p>
        
                                        <p class="form-error-input">
                                            <label for="dropdown-actions">Categoria</label>
        
                                            <select id="dropdown-actions">
                                                <option value="option1">IT</option>
                                                 <option value="option1">Gestão</option>
                                                  <option value="option1">Economia</option>
                                            </select>
                                        </p>
        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Adicionar entidade" class="round blue ic-right-arrow" />
                                        
                                    </fieldset>
                                
                                </form>
                                
                            </div> <!-- end half-size-column -->
                    
                        </div> <!-- end content-module-main -->
                        
                    </div> <!-- end content-module -->
	
				
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
				<div class="half-size-column fl">
	
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">A half size box</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main">
					
							<div class="information-box round">This is an information box. It will resize based on 
							it’s contents.</div>
							
							<div class="confirmation-box round">This is a confirmation box. It will resize based on 
							it’s contents.</div>
							
							<div class="error-box round">This is an error box. It will also resize based on it’s 
							contents.</div>
							
							<div class="warning-box round">This is a warning box. It will also resize based on 
							it’s contents.</div>
					
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
	
				</div>

				<div class="half-size-column fr">

				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Another half size box</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<ul class="temporary-button-showcase">
							<li><a href="#" class="button round blue image-right ic-add text-upper">Add</a></li>
							<li><a href="#" class="button round blue image-right ic-edit text-upper">Edit</a></li>
							<li><a href="#" class="button round blue image-right ic-delete text-upper">Delete</a></li>
							<li><a href="#" class="button round blue image-right ic-download text-upper">Download</a></li>
							<li><a href="#" class="button round blue image-right ic-upload text-upper">Upload</a></li>
							<li><a href="#" class="button round blue image-right ic-favorite text-upper">Favorite</a></li>
							<li><a href="#" class="button round blue image-right ic-print text-upper">Print</a></li>
							<li><a href="#" class="button round blue image-right ic-refresh text-upper">Refresh</a></li>
							<li><a href="#" class="button round blue image-right ic-search text-upper">Search</a></li>
						</ul>
				
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

			</div>
		
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	<? tabelaOrganizacao(); ?>
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec@COMM</a></p>
	
	</div> <!-- end footer -->

</body>
</html>