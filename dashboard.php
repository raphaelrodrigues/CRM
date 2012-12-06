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



<? include('function.php');
	
	
	
	popUpInfoEntidade();
	//popUpFormulario(); 
	?>
	<!-- TOP BAR -->
   
   
 
    <div id='light' class='white_contentF'>
    <div id="content">
		
		<div class="page-full-width cf">
			
			<div class="side-content-form fr">
			
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
                                            <label for="simple-input">NIF</label>
                                            <input type="text" id="simple-input" name="nif" class="round default-width-input" />
                                        </p>
                                        
                                       
        								<!--
                                        <p class="form-error">
                                            <label for="error-input">Erro de formato</label>
                                            <input type="text" id="error-input" class="round default-width-input error-input"/>
                                            <em>Email inválido</em>								
                                        </p>-->
                                        
                                    </fieldset>
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
                                                <input type="text" id="simple-input"  name="emailResp" class="round default-width-input" />
                                            </p>
                                        	
                                        
                                        </div>
                                	
                            
                            </div> <!-- end half-size-column -->
                            
                            <div class="half-size-column fr">
                            
                               
                               			<!--sector de actividade com auto complete-->
                                         <p>
                                            <label for="textarea">Sector de actividade*</label>
                                           <input type="text" id="autocomplete" name= "sectorActividade" class="round default-width-input" />
                                        </p>
                                        
                                    	<!--Descricao da empresa-->
                                         <p>
                                            <label for="textarea">Descrição</label>
                                            <textarea id="textarea"  name= "descricao" class="round full-width-textarea" maxlength="255"></textarea>
                                            <em>Pequena descrição da empresa</em>								
                                        </p>
                                      
                                        
                                       
                                        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <p>
                                            <label>Checkboxes</label>
                                            <label for="selected-checkbox" class="alt-label"><input type="checkbox" id="selected-checkbox" checked="checked" />A selected checkbox</label>
                                            <label for="unselected-checkbox" class="alt-label"><input type="checkbox" id="unselected-checkbox" />An uselected checkbox</label>
                                        </p>
        								
                                        
                                       
                                       
        
        
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Adicionar entidade" class="round blue ic-right-arrow" />

                                        
                                    </fieldset>
                                
                                </form>
								<input type="button"  value="Cancelar" class="round blue ic-cancel" onClick="cancelBox()"/>

                                
                            </div> <!-- end half-size-column -->
                    
                        </div> <!-- end content-module-main -->
                        
                    </div> <!-- end content-module -->

</div>
</div>
</div>
</div>
<div id='fade' class='black_overlay'></div>
    
    
   <!--TOPBAR-->
	<div id="top-bar">
		
		<div class="page-full-width cf">

				
                <ul id="nav" class="fl">
        
                    <li class="v-sep"><a href="../../crm/dashboard.php" class="round button dark ic-left-arrow image-left">Home Page</a></li>
                    <li class="v-sep"><a href="#" class="round button dark menu-user image-left">Logged in as <strong>admin</strong></a>
                        <ul>
                            <li><a href="javascript:showForm()" >My Profile</a></li>
                            <li><a href="#">User Settings</a></li>
                            <li><a href="#">Change Password</a></li>
                            <? if(!isset($user)) {
                           		echo "<li><a href='painel.php'>Lista de users</a></li>";
                            	}
                             ?>
                            <li><a href="#">Log out</a></li>
                        </ul> 
                    </li>
                	<!--
                    <li class="v-sep"><a href="#" class="round button dark menu-new-special image-left">BackOffice</a>
                       <ul>
                            <li><a href="nova_organizacao.php">+ Nova Entidade</a></li>
                            <li><a href="nova_reuniao.php">+ Nova Reunião</a></li>
                            <li><a href="novo_evento.php">+ Novo Evento</a></li>
                        </ul> 
                    </li>-->
                      <li class="v-sep"><a  href="nova_organizacao.php" class="round button dark menu-add-special image-left">Entidade</a></li>

                    <li><a href="nova_reuniao.php" class="round button dark menu-add-special image-left">Reunião</a></li>

                    
                </ul> <!-- end nav -->
			
				
            	
                <form action="#" method="POST" id="search-form" class="fr">
                    <fieldset>
                        <input  id="autocompleteSearch" title="type &quot;a&quot;" type="text" name="city" class="round button dark ic-search image-right" placeholder="Search...">
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
				<li><a href="page-other.html">Other page elements</a></li>
			</ul> <!-- end tabs -->
			<!--<a id="myLink" title="Click to do something" href="#"  class="button round blue image-right ic-add text-upper">Add</a>-->
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<!--<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" width="215" /></a>-->
            
		</div> <!-- end full-width -->	
        

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
    <?
		if( isset($_GET['q']) ){
		echo "<div class='confirmation-box round'>This is a confirmation box. It will resize based on it’s contents.</div>";
	}?>
		<div class="page-full-width cf">

			<div class="side-menu fl">
				
				<h3>BackOffice</h3>
				<ul class="menuBackoffice">
					<li id ="addOrganizacao"><a href="javascript:void(0)"><img src="images/plusCinza.png" class="plus">&nbsp;<span class="frente">Entidade</span></a></li>
                    <li id ="addReuniao1"><a href="javascript:void(0)"><img src="images/plusCinza.png">&nbsp;<span class="frente">Reunião</span></a></li>
					<li id ="addEvento"><a href="#"><img src="images/plusCinza.png"><span class="frente">Evento</span></a></li>
					<li id ="addNota"><a href="#"><img src="images/plusCinza.png"><span class="frente">Nota</span></a></li>
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
					
						<table id="tabelaEntidades">
						
							<thead>
						
								<tr onClick="return false">
									<th> </th>
									<th>Name</th>
                                    <th>Tipo</th>
									<th>Contacto</th>
									<th>Email</th>
									<th>Actions</th>
								</tr>
							
							</thead>
	
							<tfoot>
							
								<tr>
								
									<td colspan="5" class="table-footer">
									
										<label for="table-select-actions">With selected:</label>
	
										<select id="table-select-actions">
											<option value="option1">Delete</option>
											<option value="option2">Export</option>
											<option value="option3">Archive</option>
										</select>
										
										<a href="#" class="round button blue text-upper small-button">Apply to selected</a>	
	
									</td>
									
								</tr>
							
							</tfoot>
							
							<tbody>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png"></a></td>
									<td>ProcterGamble</td>
                                    <td>Empresa</td>
									<td>919876543</td>
									<td><a href="#">ProcterGamble@gmail.com</a></td>
									<td>
										<a onClick="parent.location='editOrganizacao.php?q=18'" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
                                    <td style="display:none">Ronaldo</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png"></td>
									<td> <a onClick="parent.location='entidade.php'" >Instituto Português da Juventude </a> </td>
                                    <td>Instituto</td>
									<td>919876543</td>
									<td><a href="#">ipj@gmail.com</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" ></td>
									<td>SDG </td>
                                    <td>Empresa</td>
									<td>919876543</td>
									<td><a href="#">SDG@gmail.com</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
								
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" ></a></td>
									<td>Activo Bank </td>
                                    <td>Empresa</td>
									<td>919876543</td>
									<td><a href="#">Activo Bank @gmail.com</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" ></td>
									<td>IE Madrid</td>
									<td>Instituto</td>
									<td>919876543</td>
									<td><a href="#">adipurdila@gmail.com</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td id="link"><a href="javascript:void(0)"><img src="images/16x16/search.png"></td>
									<td>EF</td>
									<td>Instituto</td>
									<td>919876543</td>
									<td><a href="#">EF@gmail.com</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
							
							</tbody>
							
						</table>
					
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
	
	
	
	<!-- FOOTER -->
	<div id="footer">

		<p>&copy; Copyright 2012 <a href="#">Aiesec</a>. All rights reserved.</p>
		<p><strong>CRM-Aiesec</strong> theme by <a href="http://www.aiesec.pt">Aiesec@COMM</a></p>
	
	</div> <!-- end footer -->

</body>
</html>