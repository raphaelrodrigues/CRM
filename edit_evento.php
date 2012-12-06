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
		
		include('function.php'); 
	   include('Entidade.class.php');
	   //$organizacao = getOrganizacao();
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
		
	  <div class="page-full-width cf">
	
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" "/></a>
			
		</div> 
		<!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT ----------------------------------->
	<div id="content">
		
		<div class="page-full-width cf">
			
			<div class="side-content-form fr">
			
				<div class="content-module">

				<div class="content_form">
                    <div class="content-module">
                    
                        <div class="content-module-heading cf">
                        
                            <h3 class="fl">Adicionar nova empresa</h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            
                                <form action="#">
                                
                                    <fieldset>
                                    
                                        <p>
                                            <label for="simple-input">Nome da entidade</label>
                                            <input type="text" id="simple-input" class="round default-width-input" <? echo 'value="IPJ"'; ?> />
                                        </p>
                                        
                                        <p>
                                            <label for="full-width-input">Contacto</label>
                                            <input type="text" id="full-width-input" class="round full-width-input" <? echo 'value="IPJ"'; ?>/>
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
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec</a></p>
	
	</div> <!-- end footer -->

</body>
</html>