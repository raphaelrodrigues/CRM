<?

	require_once ('connect.php');
	require_once ('user.class.php');
	require_once ('Organizacao.class.php');
	require_once ('Reuniao.class.php');
	function listaUtilizadores()
	{
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db("teste", $con);
        $result = mysql_query("select * from login order by activo");
		 
		 if( mysql_num_rows($result)!=0)
		 {
			while($row = mysql_fetch_array($result))
			{
						echo "<tbody>";
	
						echo		"<tr>";
						echo		"<td>".$row['user']."</td>";
						echo		"<td><a href='#'>".$row['pass']."</a></td>";
						echo        "<td>José</td>";
						echo        "<td>21-11-2012</td>";
						if( !$row['activo'] ){
							echo            "<td>Em espera</td>";
							echo			"<td>";
							echo			"<a href='#' class='confirmation-box2' onclick ='apagarRegisto()'></a>";
							
						}
						else{
							echo            "<td>Activo</td>";
							echo			"<td>";
							echo		"	<a href='#' class='error-box2'  '></a>";
							
						}
						
						echo			"</td>";
						echo		"</tr>";
			}
		}
		
		popUpEliminar();
	
	}
	
	
	
	function popUpEliminar($idEntidade)
	{
								   echo "<div id='light' class='white_content'>".
														  "<div class='login1'>"
									 ." <form name='login1' action='delete.php' method='POST' >"
									 ."<a href='#' class='button1'>Close</a>"
										." <input type='submit' value='Login' id='enviar1'>"
									  ."</form>"
									  
									  ."</center>"
								  ."</div>"
														  ."<a href='javascript:void(0)' onclick='hideL()'>".$idEntidade."</a></div>";
							
							echo "<div id='fade' class='black_overlay'></div>";
	}
	
	function popUpInfoEntidade()
	{
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
	}
	
	
	function popUpFormulario()
	{
								   echo "<div id='light' class='white_contentF'>".
														  
														  "<a href='javascript:void(0)' onclick='hideL()'>".$idEntidade."</a></div>";
							
							echo "<div id='fade' class='black_overlay'></div>";
	}
	
	
	
	function popUpInfoReuniao()
	{
								   echo "<div id='light' class='white_content'>".
														  "<div class='login1'>"
									 
										."<p>Titulo </p> Mip<br> "
										."<p>Assunto</p>Falar sobre o Mip <br> "
										."<p>Descriçao</p> Possivel ajuda com t-shirts<br> "
										."<p>Notas</p> Para a proxima falar sobre ....<br> "
										."<p>Data da Reunião</p> 12-01-2013"
										."<p>Proximas Reunioes</p> 30-12-2012  1-01-2013<br> "
									  
									  ."</center>"
								  ."</div>"
														  ."<a href='javascript:void(0)' onclick='hideL()'>".$idEntidade."</a></div>";
							
							echo "<div id='fade' class='black_overlay'></div>";
	}
	
	function popUpEmail()
	{
			 echo "<div id='light' class='white_content'>".
														  "<div class='login1'>"
								   ."<center><p>Login</p>"
									 ." <form name='login1' action='delete.php' method='POST' >"
										  ."<input name='user'  type='text'  size='20' value='Username'  onclick='this.value = &#39;&#39;'"
													  ."onblur='if(this.value ==&#39;&#39;) this.value=&#39;Username &#39;' id='user'>"
													  
										  ."<input name='pass'  type='password'  size='20' value='Password' onclick='this.value = &#39;&#39;' "
													  ."onblur='if(this.value ==&#39;&#39;) this.value=&#39;Password &#39;'id='password'>"
													."  <br />"
										." <input type='submit' value='Login' id='enviar1'>"
									  ."</form>"
									  
									  ."</center>"
								  ."</div>"
														  ."<a href='javascript:void(0)' onclick='hideL()'>Hide</a></div>";
							
							echo "<div id='fade' class='black_overlay'></div>";
	}
	
	
	
	function getUtilizador($username)
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db("teste", $con);
		$result = mysql_query("select * from login where user= '$username'");

		
		if( mysql_num_rows($result) != 0 )
		 {
			
			$row = mysql_fetch_array($result);
			$user = new User($row['user'],$row['pass'],$row['activo']);
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
        mysql_select_db("teste", $con);
		
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
        mysql_select_db("teste", $con);
		
		$result = mysql_query("select idOrg from organizacao where nome = '". $nomeOrg."'");
		
		
		if( mysql_num_rows($result) != 0 )
		 {
			
			$row = mysql_fetch_array($result);
			return $row['idOrg'];
			
			
		}
		else
			return NULL; // not valid
			
			
	}
	
	
	/************REUNIOES*********************/
	
	/**
	** Devolve a uma instancia de uma organizacao a partir do ID
	**/
	function getReuniao( $idReuniao )
	{
		
		//procurar processo ja feito
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db("teste", $con);
		
		$result = mysql_query("select * from reuniao where idReuniao = $idReuniao");
		
		
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
		
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        mysql_select_db("teste", $con);
		
		
		$result = mysql_query("select DATEDIFF(data,now()),r.* from reuniao r where DATEDIFF(r.data,now()) BETWEEN 0 AND 30 order by data limit 10");
		
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
        mysql_select_db("teste", $con);
		
		
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
        mysql_select_db("teste", $con);
		
		
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
        mysql_select_db("teste", $con);
		
		
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
				echo "<h1 class='titleH1'>Novembro</h1>";
				 	echo " <ul class='regular-ul2'>";
				while($row = mysql_fetch_array($result))
				{
					echo  "<li class='caixa'><a href='entidade.php?q=".$row['idOrg']."'>".$row['nomeOrg']."</a> ". $row['data'] ."</li>";			
				}
				echo "</ul>";
			}
			else
				echo "<h1 class='titleH1'>Não há reunioes marcadas</h1>";
	}
	
	/*
	* Imprime o resultado das proximas reunioes 
	* se $id = 0 referente a todas as organizacoes 
	* se $id != 0 referente a um id de uma empresa
	*/
	function listaProximasReunioes( $id)
	{
			if( $id == 0 )
				$result = getProximasReunioes();
			else
				$result = getProximasReunioesOrganizacao( $id );
			
			$hora ="16:30";
			if( $result != NULL){
				echo "<h1 class='titleH1'>Novembro</h1>";
				 	echo " <ul class='regular-ul2'>";
					
				while($row = mysql_fetch_array($result))
				{
					echo  "<li class='caixa'><a href='entidade.php?q=".$row['idOrg']."'>".$row['nomeOrg']."</a> ". $row['data'] ." ";
							
							if( $hora != ' ')
								echo $hora;
					
							echo "<a onClick='parent.location='editOrganizacao.php?q=18'' class='table-actions-button ic-table-edit'>".
							"</a><img src='images/icones16x16/check_mark.png'>".
							"</a>  <p>Faltam ".$row[0] ." dias</p></li>";			
				}
				echo "</ul>";
			}
			else
				echo "<h1 class='titleH1'>Não há reunioes marcadas</h1>";
				
			
	}
	
	
	
	
	function validaFormReuniao( $array )
	{
		
		
		
		//if( strlen($array['nome']) == 0)
			//return 1;
			
		$regexData ="/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/"; 
		
		echo $array['hora'],"<br>";
		// verifica hora HH:MM
		if( preg_match("/(?:[01][0-9]|2[0-4]):[0-5][0-9]/",$array['hora'] ) === 0)
		{
			echo "eeror horas";
		}
		
		// Date mask YYYY-MM-DD
		if(preg_match("/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/", $array['data']) === 0)
				echo "eeror date";
				
		
		//verifica sector de actividade
			
	}
	
	
	function login($username,$password)
	{
		//$user = getUtilizador($username);
		$user = new User();
		
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
	
	
	
	
?>