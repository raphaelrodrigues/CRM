<?php require_once('function.php');
		verificaLogin();
		$username = $_SESSION['user'];
		
		$idParceria = mysql_real_escape_string( $_GET['id'] );
		$parceria = getParceria( $idParceria );
		
		if( $parceria == NULL){
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

	<!-- TOP BAR -->
	<div id="top-bar">
		
		<div class="page-full-width cf">

			<ul id="nav" class="fl">
	
				<li class="v-sep"><a href="crm/dashboard.php" class="round button dark ic-left-arrow image-left">Home Page</a></li>
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
			<a href="#" id="company-branding-small" class="fr"></a>
			
		</div>
		

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
			
			<div class="side-content-form fr">
			
				<div class="content-module">

				<div class="content_form">
                    <div class="content-module">
                    
                        <div class="content-module-heading cf">
                        
                            <h3 class="fl">Editar nova Parceria com <? echo $parceria->getNomeOrg(); ?></h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            
                                <form name = "formParceria" action="updateParceria.php" method="post"  onsubmit="return validaFormParceria();">
                                    <fieldset>
                                    	 <input type="hidden"  name="user" value="<? echo $parceria->getUtilizador(); ?>" />
                                    	 <input type="hidden"  name="idOrg" value="<? echo $parceria->getIdOrg(); ?>" />
                                    	  <input type="hidden"  name="nomeOrg" value="<? echo $parceria->getNomeOrg(); ?>" />
                                    	   <input type="hidden"  name="idParceria" value="<? echo $parceria->getIdParceria(); ?>" />
                                    	 
                                    	<!--organizaçao a adicionar a reuniao-->
                                        <p>
                                            <label for="simple-input">Tipo*</label>
                                            	
                                         <input  type="text" id="autocompleteParceria"  name="tipo"  value="<? echo $parceria->getTipo(); ?>" class="round default-width-input" >
                                            <em id="tipo"></em> 
                                        </p>
                                    	
                                    	<p><label for="simple-input">Data Inicio</label>
                                    		<? 
                                    			if( $parceria->getDataIni() === '0000-00-00' )
                                    				$dataIni = '';
                                    			else
                                    				$dataIni = $parceria->getDataIni();
                                    		?>
                                        	 <input type="text" id="datepicker" name="dataIni" value = "<?  echo $dataIni  ?>"class=" round default-width-input" />
                                        </p>
                                        <em id="dataIni"></em>
                                        
                                        <p><label for="simple-input">Data Fim</label>
                                        	 <? 
                                    			if( $parceria->getDataFim() === '0000-00-00' )
                                    				$dataFim = '';
                                    			else
                                    				$dataFim = $parceria->getDataFim();
                                    		?>
                                        	 <input type="text" id="datepicker" name="dataFim" value = "<? echo $dataFim  ?>"class=" round default-width-input" />
                                        </p>        							
                                        <em id="dataFim"></em>
                                        <div class="stripe-separator"><!--  --></div>
                                        
                                      	
                                       
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                            		<fieldset>
                            		  <!--Tipo corporate/non corporate-->
                                        <!--Nome-->
                                        <p>
                                            <label for="simple-input">Descrição</label>
                                            <textarea id="textarea"  name= "descricao"  class="round full-width-textarea" maxlength="255"> <? echo $parceria->getDescricao(); ?></textarea>                                  
                                             <em id="assunto"></em>
                                        </p><br><br>
                                     <input type="submit" value="Actualizar Parceria" class="round blue ic-right-arrow" /><br><br>

                                    </fieldset>
                                
                                </form>
                                
                                <input type="submit"  value="Cancelar" class="round blue ic-cancel" onClick="cancelBox()"/>
                                
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