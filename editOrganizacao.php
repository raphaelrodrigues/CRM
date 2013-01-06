<? 
		include('function.php'); 
		if( !isset($_GET['id']) ){
			//header("Location : dashboard.php?sucess=1");
			//exit();
		}
			
		$idO = $_GET['id'];
		
		
	    $org = getOrganizacao($idO);
		
		
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
                     <li><a href="logout.php">Log out</a></li>
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
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" /></a>
			
		</div> 
		<!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT ----------------------------------->
	<div id="content">
		
         <?
			if( $org == NULL){
				echo '<div class="error-box round">Esta Organização nunca existiu!!.</div>';
				return;
			}
		?>
		<div class="page-full-width cf">
			
			<div class="side-content-form fr">
			
				<div class="content-module">

				<div class="content_form">
                    <div class="content-module">
                    
                        <div class="content-module-heading cf">
                        
                            <h3 class="fl">Editar Organização <? echo $org->getNome();?></h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            
                               <form action="updateOrganizacao.php" method="post">
                                
                                    <fieldset>
                                    
                                    	<!--Nome-->
                                        <p>
                                            <label for="simple-input">Nome da organização</label>
                                            <input type="text" id="simple-input" name="nome" class="round default-width-input" value='<? echo $org->getNome(); ?>' />
                                        </p>
                                        
                                        <!--Tipo corporate/non corporate-->
                                        <p>
                                            <label>Tipo</label>
                                           <? if( $org->getTipo() == 1)
                                             	 echo ' <input type="radio" id="radio" name="radio" value="1" checked="checked"/>'.
                                            	
                                            			'<label for="selected-radio" class="alt-label">Corporate</label>'.
                                            
                                            			'<input type="radio" id="radio" name="radio" value="2" />'.
                                            			'<label for="unselected-radio" class="alt-label">Non-Corporate</label>';
                                            else
                                            	 echo ' <input type="radio" id="radio" name="radio" value="1" />'.
                                            	
                                            			'<label for="unselected-radio" class="alt-label">Corporate</label>'.
                                            
                                            			'<input type="radio" id="radio" name="radio" value="2" checked="checked"/>'.
                                            			'<label for="selected-radio" class="alt-label">Non-Corporate</label>';
                                            ?>
                                            		
                                        </p>
                                        
                                       
                                        
                                        <!--Cidade with auto complete-->
                                        <p>
                                            <label for="simple-input">Cidade</label>
                                            <input type="text" id="autocompleteOrCidade" name="cidade" class="round default-width-input" value='<? echo $org->getCidade(); ?>' />
                                        </p>
                                        
                                        <!--Telefone-->
                                        <p>
                                            <label for="full-width-input">Telefone</label>
                                            <input type="text" id="full-width-input" name="telefone" class="round full-width-input" value='<? echo $org->getTelefone(); ?>'/>
                                            <em>Preferência número de telefone</em>								
                                        </p>
        
        
        								 <!--Mail-->
                                        <p>
                                            <label for="full-width-input">Email</label>
                                            <input type="text" id="full-width-input" name="email" class="round full-width-input" value='<? echo $org->getEmail(); ?>'/>
                                            							
                                        </p>
                                        
                                          <!--Nif-->
                                        <p>
                                            <label for="simple-input">NIF</label>
                                            <input type="text" id="simple-input" name="nif" class="round default-width-input" value='<? echo $org->getNif(); ?>'/>
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
                                    
                                    	<? if( $org->getNomeResp() !== '' || $org->getContactoResp() !== '' || $org->getMailResp() !== '' ) 
										    	
											
										
										?>
                                        <div id="responsavelOrg" >
                                            <!--Nome-->
                                            <p>
                                                <label for="simple-input">Nome do Responsável</label>
                                                <input type="text" id="simple-input"  name="nomeResp" class="round default-width-input" value='<? echo $org->getNomeResp(); ?>'/>
                                            </p>
                                            
                                             <!--Nome-->
                                            <p>
                                                <label for="simple-input">Contacto Responsável</label>
                                                <input type="text" id="simple-input"  name="contactoResp" class="round default-width-input" value='<? echo $org->getContactoResp(); ?>'/>
                                            </p>
                                            
                                             <p>
                                                <label for="simple-input">Email Responsável</label>
                                                <input type="text" id="simple-input"  name="emailResp" class="round default-width-input" value='<? echo $org->getMailResp(); ?>'/>
                                            </p>
                                        
                                        
                                        </div>
                                	
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                               			<p>
                               				<label for="simple-input">Site</label>
                                          <input type="text" id="full-width-input" name="email" class="round full-width-input" value='<? echo $org->getSite(); ?>'/>
                                		</p>
                                        <!--sector de actividade com auto complete-->
                                         <p>
                                            <label for="textarea">Sector de actividade</label>
                                           <input type="text" id="autocomplete" name= "sectorActividade" class="round default-width-input" value='<? echo $org->getSectorActividade(); ?>'/>
                                        </p>
                                    	<!--Descricao da empresa-->
                                         <p>
                                            <label for="textarea">Descrição</label>
                                            <textarea id="textarea"  name= "descricao" class="round full-width-textarea" ><? echo $org->getDescricao(); ?></textarea>
                                            <em>Pequena descrição da empresa</em>								
                                        </p>
                                      
                                        
                                       
                                        
                                        <input type="hidden" name="idOrg" class="round default-width-input" value='<? echo $org->getIdOrg(); ?>'/>
											
                                       
                                       
        
        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Actualizar" class="round blue ic-right-arrow" />
                                        
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