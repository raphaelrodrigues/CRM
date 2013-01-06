/**********************************************************************************

	Project Name: CRM Aiesec
	Project Description: crm project
	File Name: script.js
	Author:  Raphael Rodrigues
	Version: 1.0.0
	
**********************************************************************************/

$(document).ready(function() {

	
	//Content boxes expand/collapse
	$(".initial-expand").hide();
	$("#responsavelOrg").hide();
	
	$("div.closeInit").next("div.content-module-main").hide();
	$("div.closeInit").children(".expand-collapse-text").toggle();
	//alert($("div.content-module-heading").hide());
	
	$("div.content-module-heading").click(function(){
		$(this).next("div.content-module-main").slideToggle();
		$(this).children(".expand-collapse-text").toggle();
	});
	
	
	$(".showResp").click(function(){
			$("#responsavelOrg").slideToggle();
	});
	$("#addReuniao").click(function(e) {			//serve para ir ter a zona de adicionar entidade
		//alert("Ola");
       //$(document).scrollTop($('#addEntidade'));
	   
	   if( $(".initial-expand").is(':hidden') ){
		   $("#formReuniao").next("div.content-module-main").slideToggle();
		   $("#formReuniao").children(".expand-collapse-text").toggle();
	   }
	   
	    var top = $("#formReuniao").offset().top;
        $('html,body').animate({scrollTop: top}, 900);
	   return false;																					//para nao entrar no link
    });
	
	$("#newMail").click(function(e) {																	//serve para ir ter a zona de adicionar entidade
		//alert("Ola");
       //$(document).scrollTop($('#addEntidade'));
	   
	   if( $(".initial-expand").is(':hidden') ){
		   $("#formMail").next("div.content-module-main").slideToggle();
		   $("#formMail").children(".expand-collapse-text").toggle();
	   }
	   
	    var top = $("#formMail").offset().top;
        $('html,body').animate({scrollTop: top}, 900);
	   return false;																					//para nao entrar no link
    });
	
	
	
	// if user clicked on button, the overlay layer or the dialogbox, close the dialog	
	$('a.btn-ok, #dialog-overlay, #dialog-box').click(function () {		
		$('#dialog-overlay, #dialog-box').hide();		
		return false;
	});
	
	// if user resize the window, call the same function again
	// to make sure the overlay fills the screen and dialogbox aligned to center	
	$(window).resize(function () {
		
		//only do it if the dialog box is not hidden
		if (!$('#dialog-box').is(':hidden')) popup();		
	});	
	
	
	// if user clicked on button, the overlay layer or the dialogbox, close the dialog	
	$('.black_overlay').click(function () {		
		hideL();
		$('.white_contentF').hide();
		$('.white_content').hide();
		$('.white_contentP').hide();
		$('.black_overlay').hide();
		return false;
	});
	
	// if user resize the window, call the same function again
	// to make sure the overlay fills the screen and dialogbox aligned to center	
	$(window).resize(function () {
		
		//only do it if the dialog box is not hidden
		if (!$('#dialog-box1').is(':hidden')) popup();		
	});	
	
	
	/**
	* detecta evento quando se clica na tabela de entidades ele cria o pop up com todas as informaçoes da entidade
	* Funcao de pré-visualizacao
	*
	
	$("#tabelaEntidades tr").click(function(e){
			//verifica se é algum link 
			var tag = e.target.nodeName;
			//alert(tag);
			if( tag == 'A' ){
				// link was clicked
			} else {
				// normal td was clicked
				var row = $(this).find('td');
				
				var $nome = row.eq(1).text();
				var $tipo = row.eq(2).text();
				var $contacto = row.eq(3).text();
				var $email = row.eq(4).text();
				//createPopUp($nome,$tipo,$contacto,$email);
				verL1();
			}
			
			
			return false;
			
		});
	*/
		/**
		*  Abre o form para adicionar qualquer um dos objectos que 
		*  esta no menu de backoffice
		**/
		$(".menuBackoffice li").click(function(e){
				
				$id = $(this).attr('id');
				//alert ($id);
				
				if( $id == 'addOrganizacao' ){
					createPopUpFormOrg();
					showForm();
				} else {
					if( $id == 'addReuniao1' ){
							createPopUp2();
							verL1();
						}
					else
						if( $id == 'addEvento'){
							createPopUp("nome","tipo","contacto","mail");
							verL1();
						}
						else
							if( $id == 'addNota'){
							createPopUp("nome","tipo","contacto","mail");
							verL1();
						}
				}
						
				
				return false;
		});
	
	
	$( "#radio" ).buttonset();
	
	/**
	**
	**
	** AUTOCOMPLETES 
	*/
	
	//barra search
	$( "#autocompleteSearch" ).autocomplete( {
			source:"suggest_user.php",
			 minLength:2
	});
	
	//form da reuniao (campo organizacao)
	$( "#autocompleteReOrg" ).autocomplete( {
			source:"suggest_organizacao.php",
			minLength:1,
			 select: function(event, ui) {
				window.location = ui.item.url;
			}
	});
	
	$( "#autocompleteReOrg2" ).autocomplete( {
			source:"suggest_organizacao.php",
			minLength:1
			
	});
	
	//form da organizacao campo da cidade
	$( "#autocompleteOrCidade" ).autocomplete( {
			source:"suggest_cidade.php",
			 minLength:0
	});
	
	//form da organizacao campo da cidade
	$( "#autocompleteSector" ).autocomplete( {
			source:"suggest_sectorActividade.php",
			 minLength:0
	});
	
	$( "#autocompletePesquisa" ).autocomplete( {
			source:"suggest_organizacao.php",
			 minLength:0
	});
	
	$( "#autocompleteParceria" ).autocomplete( {
			source:"suggest_organizacao.php",
			 minLength:0
	});
	
	
	//alternar a source do autocomplete consuante o valor da comboxbox
	$('#opt').change(function() {
		
		//document.forms["formPesq"]["consulta"].value ="";
		var val = $('#opt').val();
		var src;
	    switch( val )
	    {
		    case 'Cidade' : src ="suggest_cidade.php";
		    				break;
		    case 'SectorActividade' : src = "suggest_sectorActividade.php";
		    						break;
		    default : src = "suggest_organizacao.php"; 
	    }
	    
	    $("#autocompletePesquisa").autocomplete('option', 'source', src);
	});

	
	 
    $('#submitP').click(function () {
	
		
		 var consulta = document.forms["formPesq"]["consulta"].value;
		 var opt = document.forms["formPesq"]["opt"].value;
		 var dataString = 'consulta='+ consulta + '&opt=' + opt ;
		 //alert (dataString);
		 $.ajax({
		    type: "GET",
		    url: "pesquisaAvancada.php",
		    data: dataString,
		    success: function(response) {
		    	$(".content-module-main").html( response);
		      //display message back to user here
		    }
		 });
		 return false;  
	});
	
	/**
	**	Auto complete com multiplos valores
	**/
	var participantes = ['Aiesecer','Pessoa de fora'];
	function split( val ) {
            return val.split( /,\s*/ );
        }
    function extractLast( term ) {
            return split( term ).pop();
        }
 
        $( "#participantesS" )
            // don't navigate away from the field on tab when selecting an item
            .bind( "keydown", function( event ) {
                if ( event.keyCode === $.ui.keyCode.TAB &&
                        $( this ).data( "autocomplete" ).menu.active ) {
                    event.preventDefault();
                }
            })
            .autocomplete({
                source: function( request, response ) {
                    $.getJSON( "suggest_participantes.php", {
                        term: extractLast( request.term )
                    }, response );
                },
                search: function() {
                    // custom minLength
                    var term = extractLast( this.value );
                    if ( term.length < 1 ) {
                        return false;
                    }
                },
                focus: function() {
                    // prevent value inserted on focus
                    return false;
                },
                select: function( event, ui ) {
                    var terms = split( this.value );
                    // remove the current input
                    terms.pop();
                    // add the selected item
                    terms.push( ui.item.value );
                    // add placeholder to get the comma-and-space at the end
                    terms.push( "" );
                    this.value = terms.join( ", " );
                    return false;
                }
    });	
	
	
		  
	
	
	
	
	/**
	*	DATAPICKERS
	**/
	
	$( "#datepicker" ).datepicker({
				 changeMonth: true,
				changeYear: true
	});
			
	$('#hourpicker').timepicker();
	
	
	

});


	function validaFormMail()
	{		
		var email = document.forms["formMail"]["to"];
		var f = 0;
		
		$("em").each(function () {
			$(this).empty();
			$('#email').removeClass('error-input');
			
        });
		if(email.value != ""){
			
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if(reg.test(email.value) == false) {
				  email.className += " error-input";
				  $("<em>  Email invalido </em>").insertAfter(email);
				  f = 1;
			   }
		}
		
		if(f == 1){
			return false;
		}

	}
	
	function validaFormRegisto()
	{		
		
		
		var email = document.forms["registoForm"]["email"];
		var user = document.forms["registoForm"]["user"];
		var nome = document.forms["registoForm"]["nome"];
		var pass = document.forms["registoForm"]["pass"];
		var pass2 = document.forms["registoForm"]["pass-confirm"];
		
		var f = 0;
		
		$("em").each(function () {
			$(this).empty();
			$('#email').removeClass('error-input');
			$('#user').removeClass('error-input');
			$('#nome').removeClass('error-input');
			$('#pass').removeClass('error-input');
			$('#pass2').removeClass('error-input');
			
        });
		//verifica email
		if(email.value != ""){
			var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
			if(reg.test(email.value) == false) {
				  email.className += " error-input";
				  $("<em id='erros'>  Email invalido </em>").insertAfter(email);
				  f = 1;
			   }
		}
		else
		{
			email.className += " error-input";
			$("<em id='erros'>  Obrigatório </em>").insertAfter(email);
			f = 1;
		}
		
		//verifica nome
		if( nome.value === ""){
				f = 1;
				nome.className += " error-input";
				$("<em id='erros'>  Nome invalido </em>").insertAfter(nome);
		}
		
		//verifica nome
		if( user.value.length < 5){
				f = 1;
				user.className += " error-input";
				$("<em id='erros'> User inválido!Minímo 5 caracteres! </em>").insertAfter(user);
		}

		//verifica nome
		if( pass.value.length < 5){
				f = 1;
				pass.className += " error-input";
				$("<em id='erros'>Minimo 5 caracteres! </em>").insertAfter(pass);
		}
		
		//verifica pass
				if( pass2.value === ""){
				f = 1;
				pass2.className += " error-input";
				$("<em id='erros'>  Password invalida </em>").insertAfter(pass2);
		}
		
		if(  pass.value !== pass2.value )
		{
				f = 1;
				pass2.className += " error-input";
				$("<em id='erros'>  Passwords diferentes </em>").insertAfter(pass2);
		}
	
		if(f == 1){
			return false;
		}

	}
	
	
	function validaFormParceria()
	{
		
		var tipo = document.forms["formParceria"]["tipo"];
		var dataIni = document.forms["formParceria"]["dataIni"];
		var dataFim = document.forms["formParceria"]["dataFim"];	
		var f = 0;
		
		$("em").each(function () {
			$(this).empty();
			$('#tipo').removeClass('error-input');
			$('#dataIni').removeClass('error-input');
			$('#dataFim').removeClass('error-input');
			
        });
        
      	if( tipo.value === ""){
				f = 1;
				tipo.className += " error-input";
				$("<em id='erros'>  Tipo invalido </em>").insertAfter(tipo);
		}
		
		
		if( dataIni.value !== "")
		{
			var reg = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
			if( reg.test(dataIni.value) == false){
				f = 1;
				dataIni.className += " error-input";
				$("<em id='erros'>  data inválida </em>").insertAfter(dataIni);
			}
		}		
		
		if( dataFim.value !== "")
		{
			var reg = /(?:[01][0-9]|2[0-4]):[0-5][0-9]$/;
			if(reg.test(dataFim.value) == false){
				f = 1;
				dataFim.className += " error-input";
				$("<em id='erros'> Data inválida </em>").insertAfter(dataFim);
			}
		}
		
		if(f == 1){
			return false;
		}
		
	}

	
	
	function validaFormReuniao()
	{
		
		var nomeOrg = document.forms["formReun"]["nome"];
		var data = document.forms["formReun"]["data"];
		var hora = document.forms["formReun"]["hora"];
		var assunto = document.forms["formReun"]["assunto"];		
		var f = 0;
		
		$("em").each(function () {
			$(this).empty();
			$('#nomeOrg').removeClass('error-input');
			$('#data').removeClass('error-input');
			$('#hora').removeClass('error-input');
			$('#assunto').removeClass('error-input');
			
        });
        
        if( assunto.value === ""){
				f = 1;
				assunto.className += " error-input";
				$("<em id='erros'>  Assunto Obrigatório </em>").insertAfter(assunto);
		}
        
		if( nomeOrg.value === ""){
				f = 1;
				nomeOrg.className += " error-input";
				$("<em id='erros'>  Nome invalido </em>").insertAfter(nomeOrg);
		}
		
		
		if( data.value === "")
		{
				f = 1;
				data.className += " error-input";
				$("<em id='erros'> Data obrigatória</em>").insertAfter(data);
		}
		
		if( data.value !== "")
		{
			var reg = /^(\d{1,2})\/(\d{1,2})\/(\d{4})$/;
			if( reg.test(data.value) == false){
				f = 1;
				data.className += " error-input";
				$("<em id='erros'>  data inválida </em>").insertAfter(data);
			}
		}
		else
		{
			data.className += " error-input";
			$("<em id='erros'>  Introduza uma data </em>").insertAfter(data);
		}
		
		
		if( hora.value !== "")
		{
			var reg = /(?:[01][0-9]|2[0-4]):[0-5][0-9]$/;
			if(reg.test(hora.value) == false){
				f = 1;
				hora.className += " error-input";
				$("<em id='erros'>  Hora inválida </em>").insertAfter(hora);
			}
		}
		
		if(f == 1){
			return false;
		}
		
	}
	function validaFormOrganizacao()
	{
		
		var nome = document.forms["formOrg"]["nome"];
		var email = document.forms["formOrg"]["email"];
		var sectorActividade = document.forms["formOrg"]["sectorActividade"];
		var cidade = document.forms["formOrg"]["cidade"];
		var nif = document.forms["formOrg"]["nif"];
		
		var nifConfirm = document.getElementById('nif');
		
		var emailResp = document.forms["formOrg"]["emailResp"];
		
		
		
		$("em").each(function () {
			$(this).empty();
			$('#email').removeClass('error-input');
			$('#nome').removeClass('error-input');
			$('#sectorActividade').removeClass('error-input');
			$('#cidade').removeClass('error-input');
			$('#niff').removeClass('error-input');
			$('#emailResp').removeClass('error-input');
			
        });
        
		var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
		var f = 0;
		
		if( nome.value === ""){
				f = 1;
				nome.className += " error-input";
				$("<em id='erros'>  Nome invalido </em>").insertAfter(nome);
		}
		
		if( cidade.value === "")
		{
			f = 1;
			cidade.className += " error-input";
			$("<em id='erros'>  Cidade inválida </em>").insertAfter(cidade);
		}
		
		if( sectorActividade.value === "")
		{
			f = 1;
			sectorActividade.className += " error-input";
			$("<em id='erros'>  Sector de Actividade inválida </em>").insertAfter(sectorActividade);
		}
		
		if( nif.value === "")
		{
			f = 1;
			nif.className += " error-input";
			$("<em id='erros'>  NIF invalido </em>").insertAfter(nif);
		}
		
		if(email.value != ""){
			
			
			if(reg.test(email.value) == false) {
				  email.className += " error-input";
				  $("<em id='erros'>  Email invalido </em>").insertAfter(email);
				  f = 1;
			   }
		}
		
		if( emailResp.value != "")
		{
			if(reg.test(emailResp.value) == false) {
				  emailResp.className += " error-input";
				  $("<em id='erros'>  Email invalido </em>").insertAfter(emailResp);
				  f = 1;
			 }
		}
		
		
		
		if( nifConfirm.innerHTML.length === 10){
			nif.className += " error-input";
			$("<em id='erros'> Nif ja existente </em>").insertAfter(nif);

			f = 1;
		}
		
		
		
		
		
		if(f == 1){
			return false;
		}
		
	}
	
	

	 $(function() {
        $( "#dialog" ).dialog();
    });
	
	
	function cancelBox(){
	
			var r=$.confirm({
			'title'		: 'Pretendes Sair?',
				'buttons'	: {
				'Sair'	: {
					'class'	: 'blue',
					'action': function(){
						$("#confirmOverlay").css("display","none");
						window.location.href = "dashboard.php";
						return true;
					}
				},
				'Não Sair'	: {
					'class'	: 'blue',
					'action': function(){	$("#confirmOverlay").css("display","none");
											return false;
										}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
		
	}
	
	
	function confirmUpdateRe(){
	
			var r=$.confirm({
			'title'		: 'Pretendes Actualizar?',
				'buttons'	: {
				'Actualizar'	: {
					'class'	: 'blue',
					'action': function(){
						$("#confirmOverlay").css("display","none");
						document.forms["updateReuniao"].submit();
						return true;
					}
				},
				'Não'	: {
					'class'	: 'blue',
					'action': function(){	
											$("#confirmOverlay").css("display","none");
											return false;
										}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
		return false;
	}
	
	
	
	function deleteBox(id){
	
			var r=$.confirm({
			'title'		: 'Pretendes remover este Registo?',
				'buttons'	: {
				'Remover'	: {
					'class'	: 'blue',
					'action': function(){
						$("#confirmOverlay").css("display","none");
						window.location.href = "remover_reuniao.php?id="+id;
						return true;
					}
				},
				'Cancelar'	: {
					'class'	: 'blue',
					'action': function(){	$("#confirmOverlay").css("display","none");
											return false;
										}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
		
	}
	
	
	/*
	* 	confirm box para confirmar a activaçao de um registo
	*/
	function activarRegisto(id){
	
		var r=$.confirm({
			'title'		: 'Tens a certeza que pretendes activar ? ',
				'buttons'	: {
				'Activar'	: {
					'class'	: 'blue',
					'action': function(){
						$("#confirmOverlay").css("display","none");
						window.location.href = "activar.php?user="+id;
					}
				},
				'Cancelar'	: {
					'class'	: 'blue',
					'action': function(){	$("#confirmOverlay").css("display","none");
											return false;
										}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	}
	
	/*
	* 	confirm box para confirmar a remocao de um registo
	*/
	function apagarRegisto(id){
	
		var r=$.confirm({
			'title'		: 'Tens a certeza que pretendes remover ? ',
				'buttons'	: {
				'Remover'	: {
					'class'	: 'blue',
					'action': function(){
						$("#confirmOverlay").css("display","none");
						window.location.href = "desactivar.php?user="+id;
					}
				},
				'Cancelar'	: {
					'class'	: 'blue',
					'action': function(){	$("#confirmOverlay").css("display","none");
											return false;
										}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
	}
	
	
	
	/**
	*	Cria o html do pop up com os respectivos campos
	*/
		
	function createPopUp2()
	{
		$('.white_content').empty();
		$('.white_content').append("<div class='conteudoCentralBox'>"
												  +" <div class='half-size-column fl'>"

													+"<p>Nome</p> Instituto Português da Juventude "
													+"<p>Contacto</p> 912222222 "
													+"<p>Email</p> ipj@gmail+com<br> "
													+"<p>Tipo</p> Instituto<br> "
													
												
												+"</div>"
												
												+" <div class='half-size-column fr'>"
													+"<p>Sector Actividade</p>Informatica<br> "
													+"<p>Tipo</p>Corporate<br> "
													+"<p>Morada</p>Avenida Republicasdsjkdhshjdgshjdgjshdgjhsgdjhsgdjhsgdjhsgdjshgdjh<br> "
													
													
												
												+"</div>"
												
												+"<div class='conteudoLateralBox'>"
												+"<p>Proximas Reunioes</p> <br> "
												 +"15 Novembro 2012<br>"
												+"15 Novembro 2012"


												+"</div>"
												
											+"</div>"
											  
											

								  		+"</div>");
		
		
	}
	


	function createPopUpFormOrg()
	{
		$('.white_contentF').empty();
		$('.white_contentF').append("  <form action='#'>"+
                                
                                   " <fieldset>"+
                                    
                                       " <p>"+
                                           " <label for='simple-input'>Nome da entidade</label>"+
                                            "<input type='text' id='simple-input' class='round default-width-input' />"+
                                        "</p>"+
                                        
                                       " <p>"+
                                            "<label for='full-width-input'>Contacto</label>"+
                                            "<input type='text' id='full-width-input' class='round full-width-input'/>"+
                                            "<em>Preferência número de telefone</em>"			+					
                                       " </p>"+
        
                                        "<p>"+
                                            "<label for='another-simple-input'>Descrição</label>"+
                                           " <input type='text' id='another-simple-input' class='round default-width-input'/>"+
                                           " <em>Pequena descrição da empresa</em>	"+							
                                        "</p>"+
                                        "<p class='form-error'>"+
                                            "<label for='error-input'>Erro de formato</label>"+
                                           " <input type='text' id='error-input' class='round default-width-input error-input'/>"+
                                           " <em>Email inválido</em>"+								
                                        "</p>"+
                                        
                                    "</fieldset>"+
                                
                                "</form>");
		
	}
	
	function verL()
	{
		// get the screen height and width  
		var maskHeight = $(document).height();  
		var maskWidth = $(window).width();
		
		
		var dialogTop =  (maskHeight/2) - ($('.white_content parceria').height() );  
		var dialogLeft = (maskWidth / 2 ) - ( $('.white_content parceria').width() / 2); 
		// calculate the values for center alignment 
		$('.black_overlay').css({height:maskHeight, width:maskWidth}).show();
		$('.white_content').css({top:dialogTop, left:dialogLeft}).show();
		
	}
	
	function verL1()
	{
		// get the screen height and width 
		 
		var maskHeight = $(document).height();  
		var maskWidth = $(window).width();
		
		var dialogTop =  (maskHeight/ 3 ) - ($('.white_content').height() / 2);  
		var dialogLeft = (maskWidth / 2 ) - ( $('.white_content').width() / 2); 
		
		
		// calculate the values for center alignment 
		$('.black_overlay').css({height:maskHeight, width:maskWidth}).show();
		$('.white_content').css({top:dialogTop, left:dialogLeft}).show();

	}
	
	function verPopUpParceria()
	{
		// get the screen height and width 
		 
		var maskHeight = $(document).height();  
		var maskWidth = $(window).width();
		
		var dialogTop =  (maskHeight/ 3 ) - ($('.white_contentP').height() / 2);  
		var dialogLeft = (maskWidth / 2 ) - ( $('.white_contentP').width() / 2); 
		
		
		// calculate the values for center alignment 
		$('.black_overlay').css({height:maskHeight, width:maskWidth}).show();
		$('.white_contentP').css({top:dialogTop, left:dialogLeft}).show();

	}
	
	
	function addFeedBack( id )
	{
		
		// get the screen height and width 
		var maskHeight = $(document).height();  
		var maskWidth = $(window).width();
		
		var dialogTop =  (maskHeight / 2) - ($('.white_contentF').height() / 2);  
		var dialogLeft = (maskWidth / 2 ) - ( $('.white_contentF').width() / 2); 
		
		//alert(id);
		document.forms["add_feedback"]["idReuniao"].value = id;

		
		
		//document.forms["add_feedback"]["add_feedback"].value = " "+ feedback + " ";
		// calculate the values for center alignment 
		$('.black_overlay').css({height:maskHeight, width:maskWidth}).show();
		$('.white_contentF').css({top:dialogTop, left:dialogLeft}).show();

	}
	
	/**
	*	Mostra pop-up de formulario
	**/
	function showForm()
	{
		// get the screen height and width 
		 
		var maskHeight = $(document).height();  
		var maskWidth = $(window).width();
		
		var dialogTop =  (maskHeight / 4) - ($('.white_contentF').height() / 2);  
		var dialogLeft = (maskWidth / 2 ) - ( $('.white_contentF').width() / 2); 
		
		
		// calculate the values for center alignment 
		$('.black_overlay').css({height:maskHeight, width:maskWidth}).show();
		$('.white_contentF').css({top:dialogTop, left:dialogLeft}).show();

	}
	
	
	
	
	function hideL()
	{
		document.getElementById('light').style.display='none';
		document.getElementById('fade').style.display='none';
	}
	
	function absoluteOffset(elem) {
    	return elem.offsetParent && elem.offsetTop + absoluteOffset(elem.offsetParent);
	}
	
	
(function($){

	$.confirm = function(params){


		var buttonHTML = '';
		$.each(params.buttons,function(name,obj){

			// Generating the markup for the buttons:

			buttonHTML += '<a href="#" class="button '+obj['class']+'">'+name+'<span></span></a>';

			if(!obj.action){
				obj.action = function(){};
			}
		});

		var markup = [
			'<div id="confirmOverlay">',
			'<div id="confirmBox">',
			'<h1>',params.title,'</h1>',
			'<p>',params.message,'</p>',
			'<div id="confirmButtons">',
			buttonHTML,
			'</div></div></div>'
		].join('');

		$(markup).hide().appendTo('body').fadeIn();

		var buttons = $('#confirmBox .button'),
			i = 0;

		$.each(params.buttons,function(name,obj){
			buttons.eq(i++).click(function(){

				// Calling the action attribute when a
				// click occurs, and hiding the confirm.

				obj.action();
				$.confirm.hide();
				return false;
			});
		});
	}

	$.confirm.hide = function(){
		$('#confirmOverlay').fadeOut(function(){
			$(this).remove();
		});
	}

})(jQuery);


	/***********
	****AJAX FUNCTION
	************/
	
	/**
	**	funcao que verifica se é nif ja existe na criacao de uma nova organizacao
	**/
	function verificaNIF(str)
	{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("nif").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("nif").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","verificaNIF.php?q="+str,true);
		xmlhttp.send();
	}
	
	/**
	**	funcao que verifica se é nif ja existe na criacao de uma nova organizacao
	**/
	function verificaUser(str)
	{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("userEM").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				$('#userEM').empty();
				document.getElementById("userEM").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","verificaUser.php?q="+str,true);
		xmlhttp.send();
	}
	
	
	/**
	**	funcao que verifica se é nif ja existe na criacao de uma nova organizacao
	**/
	function verificaNome(str)
	{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("nomeOrg").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				$('#nomeOrg').empty();
				document.getElementById("nomeOrg").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","verificaOrganizacao.php?q="+str,true);
		xmlhttp.send();
	}
	
	
	
	/*********
	********
	*Funcoes de pop up
	***
	***
	*/
	function popupReuniao(str)
	{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("reuniaoPop").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("reuniaoPop").innerHTML=xmlhttp.responseText;
			verL1();
			}
		  }
		xmlhttp.open("GET","info_reuniao.php?id="+str,true);
		xmlhttp.send();
	}
	
	
	/*********
	********
	*Funcoes de pop up
	***
	***
	*/
	function popupParceria(str)
	{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("ParceriaPop").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("ParceriaPop").innerHTML=xmlhttp.responseText;
			verPopUpParceria();
			}
		  }
		xmlhttp.open("GET","info_parceria.php?id="+str,true);
		xmlhttp.send();
	}

	function popupOrganizacao(str)
	{
		var xmlhttp;
		if (str.length==0)
		  { 
		  document.getElementById("OrganizacaoPop").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("OrganizacaoPop").innerHTML=xmlhttp.responseText;
			verL1();
			}
		  }
		
		xmlhttp.open("GET","info_organizacao.php?id="+str,true);
		xmlhttp.send();
	}
	
	