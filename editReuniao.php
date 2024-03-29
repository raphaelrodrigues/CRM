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


	<? 
		
		include('function.php'); 
		$idReuniao = $_GET['id'];
		
	 	$reuniao =  getReuniao( $idReuniao );
	
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
		

	</div> <!-- end header -->
	
	
	
    
   
	<!-- MAIN CONTENT -->
	<div id="content">
		 <?
			if( $reuniao == NULL){
				echo '<div class="error-box round">Esta Reunião nunca existiu!!.</div>';
				return;
			}
		?>
       
		<div class="page-full-width cf">
			
			<div class="side-content-form fr">
			
				<div class="content-module">

				<div class="content_form">
                    <div class="content-module">
                    
                        <div class="content-module-heading cf">
                        
                            <h3 class="fl">Editar Reunião </h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            
                                <form name="updateReuniao" action="updateReuniao.php" method="post" onSubmit="return confirmUpdateRe()">
                                
                                    <fieldset>
                                    
                                    	 <input  type="hidden" value='<? echo $reuniao->getIdOrg();?>' name = "idOrg" >
                                    	<!--organizaçao a adicionar a reuniao-->
                                        <p>
                                            <label for="simple-input">Organização</label>
                                            <input  type="text" id="autocompleteReOrg"   name = "nome" class="round default-width-input" value= '<? echo $reuniao->getNomeOrg(); ?>' readonly>
                                        </p>
                                    	<!--Nome-->
                                        <p>
                                            <label for="simple-input">Assunto</label>
                                            <input type="text" id="simple-input" name = "assunto" class="round default-width-input"  value= '<? echo $reuniao->getAssunto(); ?>'/>
                                        </p>
                                        
                                        <!--Tipo corporate/non corporate-->
                                         
                                        <p><label for="simple-input">Data</label>
                                        	 <input type="text" id="datepicker" name="data" class="round default-width-input"  value= '<? echo  $reuniao->getData(); ?>'/>
                                        </p>
 
                                                                               
                                        <!--Telefone-->
                                        <p>
                                            <label for="full-width-input">Objectivo</label>
                                            <input type="text" id="full-width-input" name = "objectivo" class="round full-width-input"  value= '<? echo $reuniao->getObjectivo(); ?>'/>
                                            <em>Descriçao</em>								
                                        </p>
        
        							</fieldset>
        								
                                       
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                              
                                       <fieldset>
                                       
                                        <!--Participantes com estilo de tags-->
                                        <p>
                                            <label for="simple-input">Participantes</label>
                                          	 <input type="text" id="participantesS" name = "participantes"  class="round full-width-input"  value= '<? echo $reuniao->getParticipantes(); ?>'/>
                                        </p>

                                    	<!--Descricao da empresa-->
                                         <p>
                                            <label for="textarea">Feedback</label>
                                            <input type="text" id="feedback" name = "feedback" class="round full-width-textarea" value= '<? echo $reuniao->getFeedback(); ?>'/>
                                            <em>Pequena descrição com feedback da reunião</em>								
                                        </p>
                           
                                       	<input type="hidden" name ="idReuniao" value='<? echo $reuniao->getIdReuniao(); ?>' class="round blue ic-right-arrow" />
                                       
        
        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Actualizar Reuniao" class="round blue ic-right-arrow" /><br><br>
                                        
                                    </fieldset>
                                
                                </form>
                               <input type="button"  value="Cancelar" class="round blue ic-cancel" onClick="cancelBox()"/><br><br>
                               <input type="button" id="<? echo $reuniao->getIdReuniao(); ?>" value="Apagar Reunião" class="round blue ic-cancel" onClick="deleteBox(this.id)"/>


                                
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