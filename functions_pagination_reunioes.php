<?
	require_once ('connect.php');
	function paginateReunioes()
	{
		$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		mysql_select_db(DB_DATABASE , $con);
		
		$sql = "SELECT COUNT(*) AS total FROM `reuniao` ";
		
		
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
		
		
		$sql = "SELECT * FROM `reuniao`  ORDER BY `idReuniao` DESC LIMIT ".$inicio.", ".$numRegistoPerPagina ;
		
		// Executa a consulta
		$query = mysql_query($sql);
		
		
		

		// ============================================
		
		
		// <p>Resultados 1 - 20 de 138 resultados encontrados para 'minha busca'</p>
		//echo stripslashes("onclick='location.href='edit.php?q='39' class='table-actions-button ic-table-edit'>");


		echo '<table>'.
							
								'<thead>'.
							
									'<tr>'.
										'<th> </th>'.
										'<th>Organização</th>'.
										'<th>Assunto</th>'.
										'<th>Participantes</th>'.
	                                    '<th>Objectivo</th>'.
										'<th>Data</th>'.
										'<th>Actions</th>'.
										
									'</tr>'.
							
								'</thead>'.
		
								
								"<tbody>";
							while($row = mysql_fetch_array($query))
							{		
									//reunioes passadas
									echo "<tr>";
									
									if( $row[0] <= 0 )
										echo "<td class='old'><a href='javascript:void(0)'><img src='images/16x16/search.png' onclick ='verL()'></a></td>";

									else
										echo "<td class='recent'><a href='javascript:void(0)'><img src='images/16x16/search.png' onclick ='verL()'></a></td>";
									
										echo         '<td >'.$row['idOrg'] .'</td>'.
													 '<td >'.$row['assunto'] .'</td>'.
													 '<td >'.$row['participantes'] .'</td>'.
					                                 '<td>',$row['objectivo'] ,'</td>'.
					                                 '<td><a href="#">',$row['data'] , ' ',$row['hora'], '</a></td>'.
												  '<td>',
												  	'<a href="editReuniao.php?id=' .$row['idReuniao'] .' " class="table-actions-button ic-table-edit"></a>'.								 
												  	'<a href="#" class="table-actions-button ic-table-delete"></a>'.
												   '</td>'.
										     '</tr>';
							}
							
							
					echo "</tbody>",
							
				"</table>";
		
		// Começa a exibição dos resultados
		echo "<p>Resultados ".min($total, ($inicio + 1))." - ".min($total, ($inicio + $_BS['PorPagina']))." de ".$total." resultados encontrados para '".$_GET['consulta']."'</p>";
		// ============================================
		
		$n = 5;
		$var = $n - 1;
			// Começa a exibição dos paginadores
			if ($total > 0) 
				for($n = 1; $n <= $paginas; $n++) 
					echo '<a href="?consulta='.$_GET['consulta'].'&opt='.$_GET['opt'].'&pagina='.$n.'">'.$n.'</a>&nbsp;&nbsp;';
	
	}
	
	
	
	?>