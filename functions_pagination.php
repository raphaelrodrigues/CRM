<?
	require_once ('connect.php');
	function paginateOrganizacao()
	{
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db("teste", $con);
		// Salva o que foi buscado em uma variável
		$busca = $_GET['consulta'];
		// Usa a função mysql_real_escape_string() para evitar erros no MySQL
		$busca = mysql_real_escape_string($busca);
		
		// ============================================
		
		// Monta a consulta MySQL para saber quantos registros serão encontrados
		$sql = "SELECT COUNT(*) AS total FROM `organizacao` WHERE `nome` LIKE '%".$busca."%'";
		
		
		// Executa a consulta
		$query = mysql_query($sql);
		
		// Salva o valor da coluna 'total', do primeiro registro encontrado pela consulta
		$total = mysql_result($query, 0, 'total');
		// Calcula o máximo de paginas
		$paginas =  (($total % 20) > 0) ? (int)($total / 20) + 1 : ($total / 20);
		echo "deu ",mysql_num_rows($query),' total ',$total,'<br>';
	
	
		// Sistema simples de paginação, verifica se há algum argumento 'pagina' na URL
		if (isset($_GET['pagina'])) {
			$pagina = (int)$_GET['pagina'];
			} else {
			$pagina = 1;
			}
		$pagina = max(min($paginas, $pagina), 1);
		$inicio = ($pagina - 1) * 20;
		// ============================================
		
		// Monta outra consulta MySQL, agora a que fará a busca com paginação
		$sql = "SELECT * FROM `organizacao` WHERE  ((`nome` LIKE '%".$busca."%') OR ('%".$busca."%')) ORDER BY `idOrg` DESC LIMIT ".$inicio.", 20 ";
		// Executa a consulta
		$query = mysql_query($sql);
		

		// ============================================
		
		// Começa a exibição dos resultados
		echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
		// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
		//echo stripslashes("onclick='location.href='edit.php?q='39' class='table-actions-button ic-table-edit'>");

		while ($resultado = mysql_fetch_assoc($query)) {
			
							echo "<tr>".
									"<td><a href='javascript:void(0)'><img src='images/16x16/search.png'></a></td>".
									"<td>". $resultado['nome']. " ".$resultado['idOrg']."</td>".
                                    "<td>". $resultado['tipo']."</td>".
									"<td>". $resultado['telefone']."</td>".
									"<td><a href='#'>". $resultado['email']."</a></td>".
									"<td>".
										"<a onclick='location.href=\'edit.php?q='39'\' class='table-actions-button ic-table-edit'></a>".
										"<a href='#' class='table-actions-button ic-table-delete'></a>".
									"</td>".
                                    "<td style='display:none'>Ronaldo</td>".
								"</tr>";
		}
		
		// ============================================
		
		// Começa a exibição dos paginadores
		if ($total > 0) {
			for($n = 1; $n <= $paginas; $n++) {
				echo '<a href="?consulta='.$_GET['consulta'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
				}
		}
	}
	
	?>