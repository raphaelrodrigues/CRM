<? require_once ('connect.php');
	require_once ('User.class.php');
	require_once ('Organizacao.class.php');
	require_once ('Reuniao.class.php');
	require_once ('Parceria.class.php');
	
	
	/**
	**	verifica se permissoes
	**		
	**/
	
	function permissoes( $username )
	{	
		fazConexao();
		$result = mysql_query("select permissao from login where user = '".$username."'");
		
		$row = mysql_fetch_array($result);
		
		if( $row['permissao'] == 1)
		{
			return 1;
		}
		else
			return 0;
	}
	
	
	
	/**
	**	verifica se organização com reuniões marcadas
	**		
	**/
		
	function organizacoesComReunioes()
	{
		
		$result = mysql_query("select distinct(idOrg) from reuniao");
		$ids = array();
		$i = 0;
		if( mysql_num_rows($result)!=0)
		{
			while($row = mysql_fetch_array($result))
			{
				$ids[$i] = $row['idOrg'];
				$i++;
			}
		 	//remove duplicados
		 	return $ids;
		}
		else
			return NULL;
		
		
	}
	
	
	function tabelaOrganizacao()
	{
		fazConexao();
		$ids = organizacoesComReunioes();
		
		if( $ids == NULL)
		{
			echo "NAda";
			exit();
		}
		
		
		
		echo "<table id='tabelaEntidades'>".
						"<thead>".
								"<tr>".
									"<th> </th>".
									"<th>Nome</th>".
                                    "<th>Tipo</th>".
									"<th>Contacto</th>".
									"<th>Sector</th>".
									"<th>Cidade</th>".
									"<th>Email</th>".
									"<th>Proximas Reunioes</th>".
									"<th>Actions</th>".
								"</tr>".
							
							"</thead>".
	
						    "<tbody>";
	    foreach($ids as $id) {  
	    	$sql = "SELECT * FROM `organizacao` where idOrg = $id ";
	    	$query = mysql_query($sql);
	    	$resultado = mysql_fetch_assoc($query);
			
							echo "<tr>".
									"<td><a href='javascript:void(0)'><img id='".$resultado['idOrg']."' src='images/16x16/search.png' onclick ='popupOrganizacao(this.id)'></a></td>".
									'<td><a href="entidade.php?id=' .$resultado['idOrg'] .' " >' . $resultado['nome']. '</a></td>'.
                                    "<td>". $resultado['tipo']."</td>".
									"<td>". $resultado['telefone']."</td>".
									"<td>". $resultado['sectorActividade']."</td>".
									"<td>". $resultado['cidade']."</td>".
									"<td><span class='blue-color'>". $resultado['email']."</span></td>".
									"<td>".
										"<p>". $resultado['sectorActividade']."<p>".
										"<p>". $resultado['sectorActividade']."<p>".
										"<p>". $resultado['sectorActividade']."<p>".
									"</td>".
									"<td>".
										'<a href="editOrganizacao.php?id=' .$resultado['idOrg'] .' " class="table-actions-button ic-table-edit"></a>'.
										"<a href='#' class='table-actions-button ic-table-delete'></a>".
									"</td>".
                                   
								"</tr>";
								
		}
		echo "</tbody>"
		    ."</table>";

	}

	function verificaLogin()
	{
		$user = new User('','','','','');
		//se tiver cookie entra senao redireciona para o login
		$r = $user->autenticar();
		if( $r != 0) { 
			header('Location:login_page.php?error=1');
			exit();
		}
		else
		{
			//renovar cookie
			$hour = time() + 3600;
			$user->setCookies( $hour );
			
		}
	}
	
	
	
	function isLoggedIn()
	{
	    if( isset( $_SESSION['user'] ) && isset( $_SESSION['pwd'] ) )
	        return $_SESSION['user'];
	   
	    return 0;
	}
	
	
	/*
	*
	*	Funcoes que chekam os headers para devolver mensagens
	*
	*/
	
	function checkHeader( $get )
	{
		if( !isset( $_GET[$get] ) )
		{
			header('Location:404.php');
			exit();
		}
	}
	
	function checkErrors()
	{
		if( isset($_GET['error'])  )
		{
				$err  =  mysql_real_escape_string( $_GET['error'] );
				switch ( $err)
				{
					case 1 : echo "<div  class='error-box round'>Não podes aceder a este zona sem login</div>";
							break;
					case 2 : echo '<div class="error-box round">Username ou palavra passe errada</div>';
							break;
					case 3: echo '<div class="error-box round">Conta não confirmada</div>';
							break;
					default : echo '<div class="error-box round">ERRO</div>';
				}
		}
	}
	
	function checkProfile()
	{
		if( isset($_GET['sucess'])  )
		{
				$err  =  mysql_real_escape_string( $_GET['sucess'] );
				switch ( $err )
				{
					case 1 : echo "<div  class='confirmation-box round'>Password alterada com sucesso</div>";
							break;
					case 2 : echo '<div class="error-box round">Não foi possível alterar a password!</div>';
							break;
					default : echo '<div class="error-box round">ERRO</div>';
				}
		}
	}
	
	function checkPainel()
	{
		if( isset($_GET['sucess'])  )
		{
				$err  =  mysql_real_escape_string( $_GET['sucess'] );
				switch ( $err )
				{
					case 1 : echo "<div  class='confirmation-box round'>Registo activado com sucesso</div>";
							break;
					case 2 : echo "<div  class='warning-box round'>Registo desactivado com sucesso</div>";
							break;
					default : echo '<div class="error-box round">ERRO</div>';
				}
		}
	}
	
	function checkEntidade()
	{
		if( isset($_GET['sucess'])  )
		{
				$err  =  mysql_real_escape_string( $_GET['sucess'] );
				switch ( $err )
				{
					case 1 : echo "<div  class='confirmation-box round'>Reunião inserida com sucesso</div>";
							break;
					case 2 : echo "<div  class='error-box round'>Não foi possivel marcar Reunião</div>";
							break;
					default : echo '<div class="error-box round">ERRO</div>';
				}
		}
	}	
	function listaUtilizadores()
	{
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
        $result = mysql_query("select * from login order by activo");
		 
		 if( mysql_num_rows($result)!=0)
		 {
			 echo "<tbody>";
			while($row = mysql_fetch_array($result))
			{
						
	
						echo		"<tr>";
						echo		"<td>".$row['user']."</td>";
						echo        "<td>".$row['nome']."</td>";
						echo		"<td><a href='#'>".$row['mail']."</a></td>";
						echo        "<td>".$row['dataRegisto']."</td>";
						echo		"<td><a href='#'>".$row['permissao']."</a></td>";
						
						if( $row['activo'] == 0 ){
							echo            "<td>Em espera</td>";
							
							echo			"<td>";
							echo			"<a href='#' id='". $row['user'] ."' class='confirmation-box2' onclick ='activarRegisto(this.id)' ></a>";
							
						}
						else{
							echo            "<td>Activo</td>";
							echo			"<td>";
							echo		"	<a href='#' class='error-box2' id='". $row['user'] ."' onclick ='apagarRegisto(this.id)' ></a>";
							
						}
						
						
						echo			"</td>";
						
						echo		"</tr>";
			}
		}
		
		popUpEliminar();
	
	}
	
	
	/**
	** Devolve a lista de todos os mails enviados
	**/
	function listaMails()
	{
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
        $result = mysql_query("select * from mail order by date");
		 
		 if( mysql_num_rows($result)!=0)
		 {
			 echo "<tbody>";
			while($row = mysql_fetch_array($result))
			{
						
	
						echo		"<tr>";
						echo		"<td>".$row['idOrg']."</td>";
						echo		"<td><a href='#'>".$row['fromM']."</a></td>";
						echo        "<td>".$row['toM']."</td>";
						echo        "<td>".$row['subject']."</td>";
						echo        "<td>".$row['message']."</td>";
						echo        "<td>".$row['date']."</td>";
						echo        "<td>".$row['idUser']."</td>";
						echo		"</tr>";
			}
		}
		
	
	}
	
	/*
		 echo "<div id='light' class='white_content'> "
								   			."<div class='conteudoCentralBox'>"
												  ." <div class='half-size-column fl'>"

													."<p>Nome</p> Instituto Português da Juventude "
													."<p>Contacto</p> 912222222 "
													."<p>Email</p> ipj@gmail.com<br> "
													."<p>Tipo</p> Instituto<br> "
													
												
												."</div>"
												
												." <div class='half-size-column fr'>"

													
													."<p>Sector Actividade</p>Informatica<br> "
													."<p>Tipo</p>Corporate<br> "
													."<p>Morada</p>Avenida Republica<br> "
												
												."</div>"
												
											  ."</div>"
											  
											."<div class='conteudoLateralBox'>"
												."<p>Proximas Reunioes</p> <br> "
												 ."15 Novembro 2012<br>"
												."15 Novembro 2012"


											."</div>"

								  		."</div>";							
							echo "<div id='fade' class='black_overlay'></div>";

	*/
	
	
	function popUpInfoEntidade()
	{
			echo "<div id='light' class='white_content'>".
				 	   '<div class="gridheaderleft roundbox-top">Info</div>'.
				 	   "<a id='fechar' href='javascript:void(0)' onclick='hideL()'>Fechar&nbsp<img src='images/icones16x16/delete.png'></a>"

								  ."<div class='login1' id='OrganizacaoPop'>"
								
								  ."</div></div>";
							
				echo "<div id='fade' class='black_overlay'></div>";
								  	}
	
	
	
	
		
	
	
	function popUpInfoReuniao()
	{
				 echo "<div id='light' class='white_content'>".
				 	   '<div class="gridheaderleft roundbox-top">Info</div>'.
				 	   "<a id='fechar' href='javascript:void(0)' onclick='hideL()'>Fechar&nbsp<img src='images/icones16x16/delete.png'></a>"

								  ."<div class='login1' id='reuniaoPop'>"
								
								  ."</div></div>";
							
				echo "<div id='fade' class='black_overlay'></div>";
	}
	
	function popUpInfoParceria()
	{
				 echo "<div id='light' class='white_contentP'>".
				 	   '<div class="gridheaderleft roundbox-top">Info</div>'.
				 	   "<a id='fechar' href='javascript:void(0)' onclick='hideL()'>Fechar&nbsp<img src='images/icones16x16/delete.png'></a>"

								  ."<div class='login1' id='ParceriaPop'>"
								
								  ."</div></div>";
							
				echo "<div id='fade' class='black_overlay'></div>";
	}
	
	
		
	
	
	function popUpAddFeedback( ) 
	{
			 echo "<div id='light' class='white_contentF'>"
			 			
						  ."<center><p>Adicionar Feedback</p>"
							." <form name='add_feedback' action='add_feedback.php' method='POST' >"
							."<input name='idReuniao'  type='hidden'  size='20' value=''>"
								.'<textarea  value="" id="textarea"  name="add_feedback" id="feedback" class="round full-width-textarea" maxlength="255"></textarea><br><br>'	 		 
									." <input type='submit' value='Adicionar feedback' id='enviar1' class='round blue ic-right-arrow'>"
									  ."</form>"
									  
									  ."</center></div>";
							
				echo "<div id='fade' class='black_overlay'></div>";
	}
	
	
	function popUpAddDescricao( ) 
	{
			 echo "<div id='light' class='white_contentF'>"
			 			
						  ."<center><p>Adicionar Feedback</p>"
							." <form name='add_feedback' action='add_feedback.php' method='POST' >"
							."<input name='idParceria'  type='hidden'  size='20' value=''>"
								.'<textarea  value="" id="textarea"  name="add_descricao" id="feedback" class="round full-width-textarea" maxlength="255"></textarea><br><br>'	 		 
									." <input type='submit' value='Adicionar descriçao' id='enviar1' class='round blue ic-right-arrow'>"
									  ."</form>"
									  
									  ."</center></div>";
							
				echo "<div id='fade' class='black_overlay'></div>";
	}
	
	/**
	** Funcao de conexao da base de dados
	**/
	
	function fazConexao()
	{
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con );
        return $con;
	}
	
	
	
	function getUtilizador( $username )
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		$result = mysql_query("select * from login where user= '$username'");

		if( mysql_num_rows($result) != 0 )
		 {
			
			$row = mysql_fetch_array($result);
			$user = new User($row['user'],$row['pass'],$row['email'],$row['nome'],$row['dataRegisto']);
			return $user;
			
		}
		else
			return NULL; // not valid
			
			
	}
	
	
	/**
	** Devolve a uma instancia de uma organizacao a partir do ID
	**/
	function getOrganizacao($idOrg)
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		$result = mysql_query("select * from organizacao where idOrg = $idOrg");
		
		
		if( mysql_num_rows($result) != 0 )
		 {
			$row = mysql_fetch_array($result);
			$organizacao = new Organizacao( $row );
			return $organizacao;
			
		}
		else
			return NULL; // not valid
			
			
	}
	
	
	
	
	/**
	** devolve o id de empresa a partir do nome
	**/
	function getIdOrg($nomeOrg)
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		$result = mysql_query("select idOrg from organizacao where nome = '". $nomeOrg."'");
		
		
		if( mysql_num_rows($result) != 0 )
		 {
			
			$row = mysql_fetch_array($result);
			return $row['idOrg'];
			
			
		}
		else
			return NULL; // not valid
			
			
	}
	
	
	/************Parcerias*********************/
	
	/**
	** Devolve a uma instancia de uma organizacao a partir do ID
	**/
	function getParceria( $idParceria )
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		$result = mysql_query("select * from Parceria where idParceria = '".$idParceria."'");
				
		if( mysql_num_rows($result) != 0 )
		 {
			
			$row = mysql_fetch_array($result);
			$parceria = new Parceria( $row );
			return $parceria;
		}
		else
			return NULL; // not valid
			
			
	}
	
	function getParceriaOrganizacao( $idOrg )
	{
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		$result = mysql_query("select * from Parceria where idOrg = '". $idOrg ."'");
				
		if( mysql_num_rows($result) != 0 )
		{
			$row = mysql_fetch_array($result);
			return $result;
		}
		else
			return NULL; // not valid
	}
	
	function getParceriasTodas( )
	{
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		$result = mysql_query("select * from Parceria ");
				
		if( mysql_num_rows($result) != 0 )
		{
			$row = mysql_fetch_array($result);
			return $result;
		}
		else
			return NULL; // not valid
	}
	
	
	
	function listaParcerias( $idOrg ,$page)
	{
			if( $idOrg == 0 )
				$result = getParceriasTodas();
			else
				$result = getParceriaOrganizacao( $idOrg );
			
			
				
			if( $result != NULL){
				 	echo " <ul class='regular-ul2'>";
				while($row = mysql_fetch_array($result))
				{
					if( $page == 1){
							$class = "editR";
							$info = '<li><a href="entidade.php?id='.$row['idOrg'].'">'.$row['nomeOrg'].
										"</a>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; ". $row['data'] ."&nbsp;&nbsp; ";
						}
					else
					{
							$class = "editR2";
							$info = '<li>'.$row['tipo']."<span class='blue-color2'> </span>";
			
					}
							echo  $info;
							echo "<span class='blue-color2'>Data inicio ".$row['dataIni']." Data Fim ".$row['dataFim']."</span>";
							echo '<div class="'.$class.'">';
							switch( $row['estado'] )	
							{
								case 'D' : echo '<p> A Decorrer</p>';
											break;
								case 'T' :  echo '<p> Terminada</p>';
											break;
								case 'C' :  echo '<p> Cancelada</p>';
											break;
								
							}
								echo '<a href="editParceria.php?id=' .$row['idParceria'] .
											' " ><img src="images/icons/table/actions-edit.png" title ="Editar Parceria"></a>'.
												"&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)'><img id='" . $row['idParceria'] .
														"' src='images/16x16/screen.png' title ='Visualizar' onclick ='popupParceria(this.id)'></a>&nbsp;&nbsp;&nbsp;";
														
								echo "<a title ='Adicionar Descrição'href='javascript:addFeedBack(".$row['idReuniao'] .")' class='table-actions-button ic-table-addF'></a>";
								echo "<a title ='Alterar Estado 'href='javascript:addFeedBack(".$row['idReuniao'] .")' class='table-actions-button ic-table-addF'></a>";
							echo "</div>";
							if( strlen($row['descricao']) > 0 )
							{
								echo "<p>Descrição : ". $row['descricao'] ;
							}		
				}
				echo "</ul>";
			}
			else
				echo "<h1 class='titleH1'>Sem parcerias</h1>";
				
			
	}
	/************REUNIOES*********************/
	
	/**
	** Devolve a uma instancia de uma organizacao a partir do ID
	**/
	function getReuniao( $idReuniao )
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		$result = mysql_query("select * from reuniao where idReuniao = '".$idReuniao."'");
				
		if( mysql_num_rows($result) != 0 )
		 {
			
			$row = mysql_fetch_array($result);
			$reuniao = new Reuniao( $row );
			return $reuniao;
		}
		else
			return NULL; // not valid
			
			
	}
	
	
	/**
	** Devolve as proximas reunioes
	**/
	function getProximasReunioes()
	{
		
		
		FazConexao();
		
		$result = mysql_query("select DATEDIFF(data,now()),r.* from reuniao r where DATEDIFF(r.data,now()) > 0 order by data limit 10");
		
		if( mysql_num_rows($result) != 0 )
		 {
			
			return ( $result );
			
		}
		else
			return NULL; // not valid
		
	}
	
	/**
	** Devolve as proximas reunioes
	**/
	function getProximasReunioesOrganizacao( $idOrg )
	{
		
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		
		$result = mysql_query("select DATEDIFF(data,now()),r.* from reuniao r where idOrg = $idOrg and DATEDIFF(r.data,now()) BETWEEN 0 AND 30 order by data limit 10");
		
		if( mysql_num_rows($result) != 0 )
		 {
			
			return ( $result );
			
		}
		else
			return NULL; // not valid
			
			
		
	}
	
	function validaFormOrganizacao( $array )
	{
		
		
		echo  $array['email'],"<br>";
		//if( strlen($array['nome']) == 0)
			//return 1;
		$email =  $array['email'];
		$regexMail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 
		$regexData ="/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/"; 
		
		
		// Date mask YYYY-MM-DD
		if(preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", '2012-09-09asa') === 0)
				echo "eeror date";
				
		//verifica mail
		if( preg_match($regexMail , $email) ){
			
			echo "EMAIL Correcto";
		}
		
		//verifica sector de actividade
			
	}
	
	/**
	** Devolve as proximas reunioes
	**/
	function getUltimasReunioes()
	{
		
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		
		$result = mysql_query("select * from reuniao where DATEDIFF(data,now()) < 0 order by data ");

		if( mysql_num_rows($result) != 0 )
		 {
			
			return ( $result );
			
		}
		else
			return NULL; // not valid
		
		
	}
	
	
	/**
	** Devolve as proximas reunioes de uma organizacao a partir do seu id
	**/
	function getUltimasReunioesOrganizacao( $idOrg )
	{
		
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		
		$result = mysql_query("select * from reuniao where idOrg = $idOrg and  DATEDIFF(data,now()) < 0 order by data ");

		if( mysql_num_rows($result) != 0 )
		 {
			
			return ( $result );
			
		}
		else
			return NULL; // not valid
		
		
	}
	
	
	/*
	* Imprime o resultado das ultimas reunioes 
	* se $id = 0 referente a todas as organizacoes 
	* se $id != 0 referente a um id de uma empresa
	*/
	function listaUltimasReunioes( $id )
	{
			if( $id == 0 )
				$result = getUltimasReunioes();
			else
				$result = getUltimasReunioesOrganizacao( $id );
			
			if( $result != NULL){
				echo "<h1 class='titleH1'></h1>";
				 	echo " <ul class='regular-ul2'>";
				while($row = mysql_fetch_array($result))
				{
					echo '<div class="editR3"><a href="editReuniao.php?id=' .$row['idReuniao'] .' " ><img src="images/icons/table/actions-edit.png"></a>'.
							"&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)'><img id='" .$row['idReuniao'] ."' src='images/16x16/screen.png' onclick ='popupReuniao(this.id)'></a></div>";
					if( $row['feedback'] != '')
					echo  "<li><a href='entidade.php?id=".$row['idOrg']."'>".$row['nomeOrg']."</a>&nbsp;&nbsp; ". $row['data'] ." <p>Feedback: ". $row['feedback'] ."Houve um excelente atendimento conseguimos atingir os melhores objectivosexcelente atendimento conseguimos atingir os melhores objectivosexcelente atendimento conseguimos atingir os melhores objectivosexcelente atendimento conseguimos atingir os melhores objectivos</p></li>";	
					else
						echo  "<li><a href='entidade.php?id=".$row['idOrg']."'>".$row['nomeOrg']."</a> ". $row['data'] ."</li>";
					
				}
				echo "</ul>";
			}
			else
				echo "<h1 class='titleH1'>Não houveram reuniões ultimamente</h1>";
	}
	
	/*
	* Imprime o resultado das proximas reunioes 
	* se $id = 0 referente a todas as organizacoes 
	* se $id != 0 referente a um id de uma empresa
	* $page serve para saber para que pagina vai ser a tabela.
	* preciso por causa das margens 
	* 1->page 2->vem do perfil da organizacao
	*/
	function listaProximasReunioes( $id , $page)
	{
			if( $id == 0 )
				$result = getProximasReunioes();
			else
				$result = getProximasReunioesOrganizacao( $id );
			
			
				
			if( $result != NULL){
				 	echo " <ul class='regular-ul2'>";
				while($row = mysql_fetch_array($result))
				{
					if( $page == 1){
							$class = "editR";
							$info = '<li><a href="entidade.php?id='.$row['idOrg'].'">'.$row['nomeOrg']."</a>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; ". $row['data'] ."&nbsp;&nbsp; ";
						}
					else
					{
							$class = "editR2";
							$info = '<li>'.$row['assunto']."<span class='blue-color2'> ". $row['data'] ." </span>";
			
					}
							echo  $info;
							echo "<span class='blue-color2'>".$row['hora']."</span>";
							echo '<div class="'.$class.'"><a href="editReuniao.php?id=' .$row['idReuniao'] .' " ><img src="images/icons/table/actions-edit.png"></a>'.
							"&nbsp;&nbsp;&nbsp;<a href='javascript:void(0)'><img id='" .$row['idReuniao'] ."' src='images/16x16/screen.png' onclick ='popupReuniao(this.id)'></a></div>".
							"  <p>Faltam ".$row[0] ." dias</p></li>";			
				}
				echo "</ul>";
			}
			else
				echo "<h1 class='titleH1'>Não há reuniões marcadas</h1>";
				
			
	}
	
	
	
	function getProximasReunioesOrganizacaoAll( $idOrg )
	{
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db(DB_DATABASE, $con);
		
		
		$result = mysql_query("select DATEDIFF(data,now()),r.* from reuniao r where r.idOrg = $idOrg  order by data DESC ");

		if( mysql_num_rows($result) != 0 )
		 {
			
			return ( $result );
			
		}
		else
			return NULL; // not valid
	}
	
	
	function tabelaReunioes( $idOrg )
	{
	
		$result =  getProximasReunioesOrganizacaoAll( $idOrg );
		
		if( $result != NULL)
		{
			
			echo '<table>'.
							
								'<thead>'.
							
									'<tr>'.
										'<th> </th>'.
										'<th>Assunto</th>'.
										'<th>Participantes</th>'.
	                                    '<th>Objectivo</th>'.
										'<th>Data</th>'.
										'<th>Feedback</th>'.
										'<th>Actions</th>'.
										
									'</tr>'.
							
								'</thead>'.
		
								
								"<tbody>";
							while($row = mysql_fetch_array($result))
							{		
									//reunioes passadas
									echo "<tr>";
									
									if( $row[0] <= 0 )
										echo "<td class='old'><a href='javascript:void(0)'><img id='" .$row['idReuniao'] ."' src='images/16x16/search.png' onclick ='popupReuniao(this.id)'></a></td>";

									else
										echo "<td class='recent'><a href='javascript:void(0)'><img id='" .$row['idReuniao'] ."' src='images/16x16/search.png' onclick ='popupReuniao(this.id)'></a></td>";
									
										echo         '<td >'.$row['assunto'] .'</td>'.
													 '<td >'.$row['participantes'] .'</td>'.
													  
					                                 '<td>',$row['objectivo'] ,'</td>'.
					                                 '<td><a href="#">',$row['data'] , ' ',$row['hora'], '</a></td>'.
					                                 '<td >'.$row['feedback'] .'</td>'.
												  '<td>',
												  	'<a href="editReuniao.php?id=' .$row['idReuniao'] .' " class="table-actions-button ic-table-edit"></a>';								 	
												  	if( strlen($row['feedback']) > 0)
												  		$f = " ".$row['feedback']. " ";
												  	else
												  		$f = 'S';
												  	echo "<a href='javascript:addFeedBack(".$row['idReuniao'] .")' class='table-actions-button ic-table-addF'></a>".
												   '</td>'.
										     '</tr>';
							}
							
							
					echo "</tbody>",
							
				"</table>";
			}
			else
				echo "<h1 class='titleH1'>Não há reuniões</h1>";


	}
	
	
	function validaFormReuniao( $array )
	{
		
	
		//if( strlen($array['nome']) == 0)
			//return 1;
			
		$regexData ="/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/"; 
		
		//echo $array['hora'],"<br>";
		// verifica hora HH:MM
		if( preg_match("/(?:[01][0-9]|2[0-4]):[0-5][0-9]/",$array['hora'] ) === 0)
		{
			echo "error horas";
		}
		
		// Date mask YYYY-MM-DD
		if(preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", $array['data']) === 0)
				echo "error date";
				
		
		//verifica sector de actividade
			
	}
	
	
	function login($username,$password)
	{
		//$user = getUtilizador($username);
		$user = new User('','','','','');
		
		$user->login($username,$password);
		
		echo "<h1 class='titleH1'>Novembro</h1>".
								
							   " <ul class='regular-ul2'>".
										"<li>".$row['nomeOrg']."  ". $row['data'] ."</li>".
										"<li>ProcterGamble  12-11-2012</li>".
										"<li>ProcterGamble  12-11-2012</li>".
										"<li>IPJ  12-11-2012</li>".
								"</ul>".
									
								"<div class='stripe-separator'><!-- --></div>".
								
								"<h1 class='titleH1'>Outubro</h1>".
								
								"<ul class='regular-ul2'>".
										"<li>Instituto Português da Juventude  12-10-2012</li>".
										"<li>ProcterGamble  12-10-2012</li>".
										"<li>ProcterGamble  12-10-2012</li>".
										"<li>IPJ  12-10-2012</li>".
								"</ul>";
		
	}
	
	function verificaMail( $org)
	{
		if( $org->getEmail() != '')
		{
			echo  '<input type="submit" value="Enviar Email" class="round blue ic-right-arrow" />';

		}
		else
			echo "<h1 class='titleH1'>Não tem email!!</h1>";
	}
	
	
?>