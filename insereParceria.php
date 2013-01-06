<? 
		include ('function.php');
		fazConexao();
		$idOrg = mysql_real_escape_string( $_POST['idOrg'] );
		$nomeOrg = mysql_real_escape_string( $_POST['nomeOrg'] );
		
		
		
		$tipo = mysql_real_escape_string($_POST['tipo']);
		$descricao = mysql_real_escape_string($_POST['descricao']);
		$dataIni = mysql_real_escape_string($_POST['dataIni']);
		$dataFim = mysql_real_escape_string($_POST['dataFim']);
		
		
		$user = mysql_real_escape_string($_POST['user']);
		
		
		//get da data de criacao
		$timeStamp = $_SERVER['REQUEST_TIME'];
		$dateString = date('Y-m-d', $timeStamp  );
		
		
		if( $dataIni != ''){
			$dataIni = mysql_real_escape_string($dataIni);
			$dataIni  =  strtotime($dataIni );
			$dataIni  = date('Y-m-d',$dataIni );
		}
		
		if( $dataFim != ''){
			$dataFim = mysql_real_escape_string($dataFim);
			$dataFim  =  strtotime($dataFim );
			$dataFim  = date('Y-m-d',$dataFim );
		}
		
		$op = array(
				'idOrg' => $idOrg,
				'nomeOrg' => $nomeOrg,
				'tipo' => $tipo,
				'descricao' => $descricao,
				'dataIni' => $dataIni,
				'dataFim' => $dataFim,
				'utilizador' =>  $user,
				'dataCriacao' => $dateString,
				'estado' => 'D'
		);

		print_r ($op);
		echo "<br>";
		
		$parceria = new Parceria( $op );
		
		$r = $parceria->insere();
		
		
		if( $r == -1) 
		{
			echo "erro";
			//header('Location: entidade.php?id='.$idOrg.'&sucess=2');
		}
		else
		{
			echo "deu";
			//header('Location: entidade.php?id='.$idOrg.'&sucess=1');
		}

		
		
		
		
	?>