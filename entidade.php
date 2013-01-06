<?php require_once('function.php');
		verificaLogin();
		$username = $_SESSION['user'];
		checkHeader( 'id' );
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
	<?
			popUpInfoReuniao(); 
			popUpAddFeedback() ;
			popUpInfoParceria();
	?>
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
                            <li><a href="#">Adicionar Entidade</a></li>
                            <li><a href="#">Adicionar Reunião</a></li>
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
	
	
	
	<!-- HEADER -------------------------------------------------->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a heref="#" class="active-tab dashboard-tab" >Dados</a></li>
				<li><a href="reunioes_entidade.php?id=<? echo $id ?>">Reuniões</a></li>
				<li><a href="page-other.html">Enviar Mail</a></li>
			</ul> <!-- end tabs -->
			<!--<a id="myLink" title="Click to do something" href="#"  class="button round blue image-right ic-add text-upper">Add</a>-->
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/aiesec.gif" alt="" width="215" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
			<? checkEntidade() ?>
			<div class="side-menu fl">
				
				<h3>BackOffice</h3>
				<ul>
					<li><a href="javascript:void(0)" id="addReuniao">Add Reunião</a></li>
					<li><a href="editOrganizacao.php?id=<? echo $id ?>">Edit Perfil</a></li>
					<li><a href="nova_parceria.php?id=<? echo $id ?>">Add Parceria</a></li>
					<li><a href="javascript:void(0)" id="newMail">Enviar email</a></li>
				</ul>
				
			</div> <!-- end side-menu -->
            
           
            
            <div class="side-content fr">
            
            
            
            <div class="half-size-column fl">
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl"><? echo $org->getNome(); ?></h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
                     <div class="content-module-main cf">
                     
                     <div class="half-size-column fl">

                      <ul class="regular-ul2">
									<li><p>Nome</p> <? echo $org->getNome(); ?></li>
									<li> <p>Mail</p>  <? echo $org->getEmail(); ?></li>
									<li><p>Contacto</p> <? echo $org->getTelefone(); ?></li>
                                    <li><p>Tipo</p> <? echo $org->getTipo(); ?></li>
                                    <li><p>NIF</p>  <? echo $org->getNif(); ?> </li>
					  </ul>
                    </div>
                    <div class="half-size-column fl">
                     		<ul class="regular-ul2">
                     				<li> <p>Morada</p><? echo $org->getMorada(); ?></li>
									<li><p>Cidade</p> <? echo $org->getCidade(); ?></li>
									<li><p>Site</p><a href="http://<? echo $org->getSite();?>"><? echo $org->getSite(); ?></a></li>
									<li><p>Descricao</p><? echo $org->getDescricao(); ?></li>
                                    <li><p>Sector de Actividade</p> <? echo $org->getSectorActividade(); ?></li>
                            </ul>
					</div>
				</div><!--end module main-->
                
              
                
			</div> <!-- end content-module -->
	</div>
	
	
                
                <div class="half-size-column fr">
					<div class="content-module">
				
                        <div class="content-module-heading cf">
                        
                            <h3 class="fl">Proximas Reuniões</h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->

                             <div class="content-module-main cf">
	                             <? listaProximasReunioes( $id , 2) ?>
                            </div><!--end module main-->
					</div> <!-- end content-module -->
				</div>
                
                <div class="half-size-column fr">
	
					<div class="content-module">
					
						<div class="content-module-heading cf closeInit" id="formMail">
						
							<h3 class="fl" >Enviar Email</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main" >
						 <form name="formMail" action="sendMail.php" method="post"  onsubmit="return validaFormMail();">
                                
                                    <fieldset>
                                    	
                                    	<p>
                                            <label for="textarea">Para</label>
                                            <input type="text" id="simple-input" name="to" class="round default-width-input" value="<? echo $org->getEmail(); ?>"  />
                                        </p>
                                        <p>
                                            <label for="textarea">Assunto </label>
                                            <input type="text" id="simple-input" name="subject" class="round default-width-input" />
                                        </p>
                                        
                                         <p>
                                            <label for="textarea">Corpo email</label>
                                            <textarea id="textarea" name="message" class="round full-width-textarea"></textarea>
                                        </p>
              
                                        <div class="stripe-separator"><!--  --></div>
                                        	
                                        <? verificaMail( $org ); ?>
                                        
                                    </fieldset>
                                
                                </form>
					
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
	
				</div>

                 <div class="half-size-column fr">
	
					<div class="content-module">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Parcerias</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main" >
							<?	listaParcerias( $id , 2);	?>				
								
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
				
				</div>

                
            </div>
                </div>   
                
                             
                <div class="content-module2">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Reuniões</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main">
					
							<? tabelaReunioes( $id );	?>						
							
					
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->
                
	
                
				<div class="content_form">
                    <div class="content-module2">
                    
                        <div class="content-module-heading cf closeInit" id="formReuniao">
                        
                            <h3 class="fl">Adicionar Reunião</h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                <div class="content-module-main cf">
                    
                            <div class="half-size-column fl">
                            
                                <form name = "formReun" action="insereReuniao.php" method="post"  onsubmit="return validaFormReuniao();">
                                
                                    <fieldset>
                                    
                                    	 <input type="hidden"  name="user" value="<? echo $username; ?>" />
                                    	<!--organizaçao a adicionar a reuniao-->
                                        <p>
                                            <label for="simple-input">Organização*</label>
                                            <input  type="text" id="autocompleteReOrg"   value="<? echo $org->getNome();?>" name = "nome" class="round default-width-input" readonly >
                                        </p>
                                    	<!--Nome-->
                                        <p>
                                            <label for="simple-input">Assunto*</label>
                                            <input type="text" id="simple-input" name = "assunto" class="round default-width-input" />
                                            <em id="assunto"></em>
                                        </p>
                                        
                                        <!--Tipo corporate/non corporate-->
                                         
                                        <p><label for="simple-input">Data*</label>
                                        	 <input type="text" id="datepicker" name="data" class="round default-width-input" />
                                        </p>
                                        
                                        <p><label for="simple-input">Hora</label>
                                        	 <input type="text" id="hourpicker" name="hora" class="round default-width-input" />
                                        </p>
 
                                        
                                        
                                        <!--Obkectivo-->
                                        <p>
                                            <label for="full-width-input">Objectivo</label>
                                            <input type="text" id="full-width-input" name = "objectivo" class="round default-width-input"/>
                                            <em>Descriçao</em>								
                                        </p>
       								 </fieldset>
        
        								
                                      
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                            		<fieldset>
                              			<!--Participantes com estilo de tags-->
                                        <p>
                                            <label for="simple-input">Participantes</label>
                                          	 <input type="text" id="participantesS" name = "participantes"  class="round full-width-input"/>
                                        </p>
                                       
                                    	<!--Descricao da empresa-->
                                         <p>
                                            <label for="textarea">Feedback</label>
                                            <textarea id="textarea"  name= "feedback" class="round full-width-textarea" maxlength="255"></textarea>
                                            <em>Pequena descrição com feedback da reunião</em>								
                                        </p>
                                        
        
        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Adicionar Reunião" class="round blue ic-right-arrow" /><br><br>
                                     
                                        
                                    </fieldset>
                                
                                </form>
                                
                                <input type="submit"  value="Cancelar" class="round blue ic-cancel" onClick="cancelBox()"/>
                                
                            </div> <!-- end half-size-column -->
                    
                            
                        </div> <!-- end content-module-main -->
                        
                        
                    </div> <!-- end content-module -->

                    
				
        <div class="half-size-column fl">
	
					<div class="content-module2">
					
						<div class="content-module-heading cf">
						
							<h3 class="fl">Parcerias</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main" >
							<?	listaParcerias( $id );	?>				
								
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
				
				</div>

				<div class="half-size-column fr">

				<div class="content-module2">
				
					<div class="content-module-heading cf closeInit">
					
						<h3 class="fl">Notas</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf" >
				
                        <ul class="regular-ul2">
                     				<li> <p>Adicionada por :</p><? echo $org->getNomeUtilizador(); ?></li>
									<li><p>Data Criação:</p> <? echo $org->getDataCriacao(); ?></li>
                        </ul>
				
					</div>
							
			</div> <!-- end side-content -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
	
	
</body>
</html>