<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CRM-Aiesec</title>
	
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
</head>
<body>
	
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
                            <li><a href="nova_organizacao.php">Adicionar Entidade</a></li>
                            <li><a href="nova_reuniao.php">Adicionar Reunião</a></li>
                            <li><a href="novo_evento.php">Adicionar Evento</a></li>
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
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt=""></a>
			
		</div>
		
        <?
		if( isset($_GET['error']) ){
			if( $_GET['error'] == 1)
				echo "<div class='error-box'>Formúlario errado!</div>";
		}
	?>

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
			
			<div class="side-content-form fr">
			
				<div class="content-module">

				<div class="content_form">
                    <div class="content-module">
                    
                        <div class="content-module-heading cf">
                        
                            <h3 class="fl">Adicionar nova organização</h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            	
                                <form name="formOrg" action="insereOrganizacao.php" method="post"  onsubmit="return validaFormOrganizacao();">
                                
                                    <fieldset>
                                    
                                    	<!--Nome-->
                                        <p>
                                            <label for="simple-input">Nome da organização*</label>
                                            <input type="text" id="nome" name="nome" class="round default-width-input" />
                                        </p>
                                        
                                        <!--Tipo corporate/non corporate-->
                                         <p>
                                            <label>Tipo</label>
                                            <label for="selected-radio" class="alt-label"><input type="radio" id="selected-radio" checked="checked" />Corporate</label>
                                            <label for="unselected-radio" class="alt-label"><input type="radio" id="unselected-radio" />Non-Corporate</label>
                                        </p>
                                        
                                       
                                        
                                        <!--Cidade with auto complete-->
                                        <p>
                                            <label for="simple-input">Cidade*</label>
                                            <input type="text" id="autocompleteOrCidade" name="cidade" class="round default-width-input" />
                                        </p>
                                        
                                        <!--Telefone-->
                                        <p>
                                            <label for="full-width-input">Telefone</label>
                                            <input type="text" id="full-width-input" name="telefone" class="round full-width-input"/>
                                            <em>Preferência número de telefone</em>								
                                        </p>
        
        
        								 <!--Mail-->
                                        <p>
                                            <label for="full-width-input">Email</label>
                                            <input type="text" id="email" name="email" class="round full-width-input"/>
                                            							
                                        </p>
                                        
                                          <!--Nif-->
                                        <p>
                                            <label for="simple-input">NIF*</label>
                                            <input type="text" id="niff" name="nif" class="round default-width-input" onkeyup="verificaNIF(this.value)"/>
                                            <em id="nif"></em> 
                                        </p>
                                        
                                       
        								<!--
                                        <p class="form-error">
                                            <label for="error-input">Erro de formato</label>
                                            <input type="text" id="error-input" class="round default-width-input error-input"/>
                                            <em>Email inválido</em>								
                                        </p>-->
                                        
                                    </fieldset>
                                    <br>
                                     <input type="button" value="+ Pessoa Responsável" class="round blue ic-download showResp" />
                                    
                                        <div id="responsavelOrg">
                                            <!--Nome-->
                                            <p>
                                                <label for="simple-input">Nome do Responsável</label>
                                                <input type="text" id="simple-input"  name="nomeResp" class="round default-width-input" />
                                            </p>
                                            
                                             <!--Nome-->
                                            <p>
                                                <label for="simple-input">Contacto Responsável</label>
                                                <input type="text" id="simple-input"  name="contactoResp" class="round default-width-input" />
                                            </p>
                                            
                                             <p>
                                                <label for="simple-input">Email Responsável</label>
                                                <input type="text" id="emailResp"  name="emailResp" class="round default-width-input" />
                                            </p>
                                        	
                                        
                                        </div>
                                	
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                               			<!--Morada-->
                                        <p>
                                            <label for="simple-input">Morada</label>
                                            <input type="text" id="morada" name="morada" class="round default-width-input" />
                                        </p>
                               			<!--Nome-->
                                        <p>
                                            <label for="simple-input">Site</label>
                                            <input type="text" id="site" name="site" class="round default-width-input" />
                                        </p>
                                        
                               			<!--sector de actividade com auto complete-->
                                         <p>
                                            <label for="textarea">Sector de actividade*</label>
                                           <input type="text" id="autocompleteSector" name= "sectorActividade" class="round default-width-input" />
                                        </p>
                                        
                                    	<!--Descricao da empresa-->
                                         <p>
                                            <label for="textarea">Descrição</label>
                                            <textarea id="textarea"  name= "descricao" class="round full-width-textarea" maxlength="255"></textarea>
                                            <em>Pequena descrição da empresa</em>								
                                        </p>
                                      
                                        
                                       
                                        
                                       
        								<!--
                                        <p>
                                            <label>Checkboxes</label>
                                            <label for="selected-checkbox" class="alt-label"><input type="checkbox" id="selected-checkbox" checked="checked" />A selected checkbox</label>
                                            <label for="unselected-checkbox" class="alt-label"><input type="checkbox" id="unselected-checkbox" />An uselected checkbox</label>
                                        </p>
        								-->
                                        
                                       
                                       
        
        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Adicionar entidade" class="round blue ic-right-arrow" />

                                        
                                    </fieldset>
                                
                                </form>
								<input type="button"  value="Cancelar" class="round blue ic-cancel" onClick="cancelBox()"/>

                                
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