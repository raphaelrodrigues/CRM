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
<? include('function.php');popUpInfoReuniao(); ?>
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
                            <li><a href="#">Adicionar Entidade</a></li>
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
	
	
	
	<!-- HEADER -------------------------------------------------->
	<div id="header-with-tabs">
		
		<div class="page-full-width cf">
	
			<ul id="tabs" class="fl">
				<li><a heref="#" class="active-tab dashboard-tab" >Dados</a></li>
				<li><a href="page-full-width.html">Reuniões</a></li>
				<li><a href="page-other.html">Enviar Mail</a></li>
			</ul> <!-- end tabs -->
			<!--<a id="myLink" title="Click to do something" href="#"  class="button round blue image-right ic-add text-upper">Add</a>-->
			<!-- Change this image to your own company's logo -->
			<!-- The logo will automatically be resized to 30px height. -->
			<a href="#" id="company-branding-small" class="fr"><img src="images/" alt="" width="215" /></a>
			
		</div> <!-- end full-width -->	

	</div> <!-- end header -->
	
	
	
	<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">
			
			<div class="side-menu fl">
				
				<h3>BackOffice</h3>
				<ul>
					<li><a href="javascript:void(0)" id="addReuniao">Add Reunião</a></li>
					<li><a href="#">Add Evento</a></li>
					<li><a href="#">Edit Perfil</a></li>
					<li><a href="javascript:void(0)" id="newMail">Enviar email</a></li>
				</ul>
				
			</div> <!-- end side-menu -->
            
           
            
            <div class="side-content fr">
            
            
            
            <div class="half-size-column fl">
				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Instituto Português da Juventude</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
                     <div class="content-module-main cf">
                     
                     <div class="half-size-column fl">
                     
                      <ul class="regular-ul2">
									<li><p>Nome</p>  Instituto Português da Juventude</li>
									<li> <p>Mail</p>  ipj@gmail.com</li>
									<li><p>Contacto</p>  912221222</li>
                                    <li><p>Tipo</p>  Non-Corporative</li>
                                    <li><p>NIF</p>  2133434243434 </li>
					  </ul>
                    </div>
                    <div class="half-size-column fl">
                     <ul class="regular-ul2">
                     				<li> <p>Morada</p> Avenida da Republica Braga</li>
									<li><p>Cidade</p>  Braga</li>
									
									<li><p>Descricao</p>Instituto de apoio a jovens </li>
                                    <li><p>Sector de Actividade</p> Apoio Social</li>
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
                                <h1 class="titleH1">Novembro</h1>
                                        <ul class="regular-ul2">
                                                <li>Instituto Português da Juventude  dia 30-11-2012 17:00 <p>Faltam 3 dias</p></li>
                                                <li>ProcterGamble dia 30-11-2012 16:00 <p>Faltam 3 dias</p></li>
                                                <li>ProcterGamble dia 30-11-2012 17:00<p>Faltam 3 dias</p></li>
                                                <li>IPJ dia 30-11-2012 15:00<p>Faltam 3 dias</p></li>
                                        </ul>
                            
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
                                            <input type="text" id="simple-input" name="to" class="round default-width-input" value="<? echo "ipj@gmail.com"; ?>"  />
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
        
                                        <input type="submit" value="Enviar Email" class="round blue ic-right-arrow" />
                                        
                                    </fieldset>
                                
                                </form>
					
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
					
						<table>
						
							<thead>
						
								<tr>
									<th> </th>
									<th>Assunto</th>
                                    <th>Ttitulo</th>
									<th>Data</th>
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
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" onclick ='verL()'></a></td>
									<td>Falar sobre MIP</td>
                                    <td>MIP</td>
									<td><a href="#">12-02-2013</a></td>
									<td>
										<a href="editReuniao.php?id=12" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" onclick ='verL()'></td>
									<td>Falar sobre MIP</td>
                                    <td>MIP</td>
									<td><a href="#">12-02-2013</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" onclick ='verL()'></td>
									<td>Falar sobre MIP</td>
                                    <td>MIP</td>
									<td><a href="#">12-02-2012</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
								
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" onclick ='verL()'></a></td>
									<td>Falar sobre MIP</td>
                                    <td>MIP</td>
									<td><a href="#">12-02-2012</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" onclick ='verL()'></td>
									<td>Falar sobre MIP</td>
                                    <td>MIP</td>
									<td><a href="#">12-02-2012</a></td>
									<td>
										<a href="#" class="table-actions-button ic-table-edit"></a>
										<a href="#" class="table-actions-button ic-table-delete"></a>
									</td>
								</tr>
	
								<tr>
									<td><a href="javascript:void(0)"><img src="images/16x16/search.png" onclick ='verL()'></td>
									<td>Falar sobre MIP</td>
                                    <td>MIP</td>
									<td><a href="#">12-02-2012</a></td>
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
                    <div class="content-module2">
                    
                        <div class="content-module-heading cf closeInit" id="formReuniao">
                        
                            <h3 class="fl">Adicionar Reunião</h3>
                            <span class="fr expand-collapse-text">Click to collapse</span>
                            <span class="fr expand-collapse-text initial-expand">Click to expand</span>
                        
                        </div> <!-- end content-module-heading -->
                        
                        
                        <div class="content-module-main cf" >
                    
                            <div class="half-size-column fl">
                            
                                <form action="#">
                                
                                    <fieldset>
                                    
                                        <p>
                                            <label for="simple-input">Assunto</label>
                                            <input type="text" id="simple-input" class="round default-width-input" />
                                        </p>
                                        
                                        <p>
                                            <label for="full-width-input">Data</label>
                                            <input type="text" id="full-width-input" class="round full-width-input"/>
                                            <em></em>								
                                        </p>
        
                                        <p>
                                            <label for="another-simple-input">Descrição</label>
                                            <input type="text" id="another-simple-input" class="round default-width-input"/>
                                            <em>Pequena descrição da reuniao</em>								
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
                                            <label for="textarea">Relatório </label>
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
                                        
                                        <p>Date: <input type="text" id="datepicker" /></p>

        
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
					
						<div class="content-module-heading cf closeInit">
						
							<h3 class="fl">Parcerias</h3>
							<span class="fr expand-collapse-text">Click to collapse</span>
							<span class="fr expand-collapse-text initial-expand">Click to expand</span>
						
						</div> <!-- end content-module-heading -->
						
						
						<div class="content-module-main" >
					<form action="#">
                                
                                    <fieldset>
                                    
                                    	<p>
                                            <label for="textarea">Para</label>
                                            <input type="text" id="simple-input" class="round default-width-input" value="<? echo "ipj@gmail.com"; ?>" readonly />
                                        </p>
                                        <p>
                                            <label for="textarea">Assunto </label>
                                            <input type="text" id="simple-input" class="round default-width-input" />
                                        </p>
                                        
                                         <p>
                                            <label for="textarea">Corpo email</label>
                                            <textarea id="textarea" class="round full-width-textarea"></textarea>
                                        </p>
              
                                        <div class="stripe-separator"><!--  --></div>
        
                                        <input type="submit" value="Enviar Email" class="round blue ic-right-arrow" />
                                        
                                    </fieldset>
                                
                                </form>
					
						</div> <!-- end content-module-main -->
					
					</div> <!-- end content-module -->
	
				</div>

				<div class="half-size-column fr">

				<div class="content-module">
				
					<div class="content-module-heading cf">
					
						<h3 class="fl">Notas</h3>
						<span class="fr expand-collapse-text">Click to collapse</span>
						<span class="fr expand-collapse-text initial-expand">Click to expand</span>
					
					</div> <!-- end content-module-heading -->
					
					
					<div class="content-module-main cf">
				
						<p>Criado por <span> admin </span>  no dia <span> 12-02-2001 </span> </p>
                        
				
					</div> <!-- end content-module-main -->
				
				</div> <!-- end content-module -->

			</div>
		
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