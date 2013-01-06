<?
	include ('connect.php');
	function paginateOrganizacao()
	{
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_DATABASE , $con);
		// Salva o que foi buscado em uma variável
		$busca = $_GET['consulta'];
		// Usa a função mysql_real_escape_string() para evitar erros no MySQL
		$busca = mysql_real_escape_string($busca);
		
		$opt='';
		if( isset($_GET['opt']) )
		{
			$opt = mysql_real_escape_string($_GET['opt']);
			// Monta a consulta MySQL para saber quantos registros serão encontrados
			
			$sql = "SELECT COUNT(*) AS total FROM `organizacao` WHERE `".$opt."` LIKE '%".$busca."%'";
		}
		else
			$sql = "SELECT COUNT(*) AS total FROM `organizacao` WHERE `nome` LIKE '%".$busca."%'";
		
		
		$numRegistoPerPagina = 10;
		// ============================================
		
		
		
		
		// Executa a consulta
		$query = mysql_query($sql);
		
		// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
		$total = mysql_result($query, 0, 'total');
		
		if( $total == 0)
		{
			echo "Sorry, mas não há resultados para a tua procura!Tenta outra vez!";
			return 1;	
		}
		// Calcula o máximo de paginas
		$paginas =  (($total % $numRegistoPerPagina) > 0) ? (int)($total / $numRegistoPerPagina) + 1 : ($total / $numRegistoPerPagina);
		//echo "deu ",mysql_num_rows($query),' total ',$total,'<br>';
		
	
		// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
		if (isset($_GET['pagina'])) {
			$pagina = (int)$_GET['pagina'];
		} else {
			$pagina = 1;
			echo "";
		}
		$pagina = max(min($paginas, $pagina), 1);
		$inicio = ($pagina - 1) * $numRegistoPerPagina;
		// ============================================
		
		// Monta outra consulta MySQL, agora a que fará a busca com paginação
		
		if( isset($_GET['opt']) )
		{
			$opt = mysql_real_escape_string($_GET['opt']);
			// Monta a consulta MySQL para saber quantos registros serão encontrados
			
		$sql = "SELECT * FROM `organizacao` WHERE  ((`".$opt."` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `".$opt."` ASC LIMIT ".$inicio.", ".$numRegistoPerPagina ;
		}
		else
			$sql = "SELECT * FROM `organizacao` WHERE  ((`nome` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `idOrg` DESC LIMIT ".$inicio.", ".$numRegistoPerPagina ;
		
		// Executa a consulta
		$query = mysql_query($sql);
		
		
		

		// ============================================
		
		
		// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
		//echo stripslashes("onclick='location.href='edit.php?q='39' class='table-actions-button ic-table-edit'>");


		echo "<table id='tabelaEntidades'>".
						"<thead>".
								"<tr onClick='return false'>".
									"<th> </th>".
									"<th>Nome</th>".
                                    "<th>Tipo</th>".
									"<th>Contacto</th>".
									"<th>Sector</th>".
									"<th>Cidade</th>".
									"<th>Email</th>".
									"<th>Actions</th>".
								"</tr>".
							
							"</thead>".
	
						    "<tbody>";
		while ($resultado = mysql_fetch_assoc($query)) {
				//verifica qual o tipo
				if( $resultado['tipo'] == 1)
					$tipo = "Corp";
				else
					$tipo = "Non-Corp";
							echo "<tr>".
									"<td><a href='javascript:void(0)'><img id='".$resultado['idOrg']."' src='images/16x16/search.png' onclick ='popupOrganizacao(this.id)'></a></td>".
									'<td><a href="entidade.php?id=' .$resultado['idOrg'] .' " >' . $resultado['nome']. '</td>'.
                                    "<td>". $tipo ."</td>".
									"<td>". $resultado['telefone']."</td>".
									"<td>". $resultado['sectorActividade']."</td>".
									"<td>". $resultado['cidade']."</td>".
									"<td><a href='#'>". $resultado['email']."</a></td>".
									"<td>".
										'<a href="editOrganizacao.php?id=' .$resultado['idOrg'] .' " class="table-actions-button ic-table-edit"></a>'.
										"<a href='#' class='table-actions-button ic-table-delete'></a>".
									"</td>".
                                    "<td style='display:none'>Ronaldo</td>".
								"</tr>";
								
		}
		echo "</tbody>"
		    ."</table>";
		
		// Começa a exibição dos resultados
		echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
		// ============================================
		
		$n = 5;
		$var = $n - 1;
		
		
		if( isset($_GET['opt'])) {	
			// Começa a exibição dos paginadores
			if ($total > 0) 
				for($n = 1; $n <= $paginas; $n++) 
					echo '<a href="?consulta='.$_GET['consulta'].'&opt='.$_GET['opt'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
					
		}
		else
			if ($total > 0) 
				for($n = 1; $n <= $paginas; $n++) 
						echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';		

	}
	
	
	
	
	?>