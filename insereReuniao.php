<? 
		
		include ('Reuniao.class.php');
		include ('function.php');
		fazConexao();
		$nomeOrg = mysql_real_escape_string( $_POST['nome'] );
		
		
		$idOrg = getIdOrg( $nomeOrg );
		
		if( $idOrg == NULL)
			echo "NULL";
		
		$assunto = mysql_real_escape_string($_POST['assunto']);
		$data = mysql_real_escape_string($_POST['data']);
		$hora = mysql_real_escape_string($_POST['hora']);
		
		$participantes = mysql_real_escape_string($_POST['participantes']);
		$objectivo = mysql_real_escape_string($_POST['objectivo']);
		$feedback = mysql_real_escape_string($_POST['feedback']);
		
		$user = $_POST['user'];
		
		
		//get da data de criacao
		$timeStamp = $_SERVER['REQUEST_TIME'];
		$dateString = date('Y-m-d', $timeStamp  );
		
		
		if( $data != ''){
			$data = mysql_real_escape_string($data);
			$data =  strtotime($data);
			$data = date('Y-m-d',$data);
		}
		else
			$data = $dateString;
		
		
		$op = array(
				'idOrg' => $idOrg,
				'nomeOrg' => $nomeOrg,
				'assunto' => $assunto,
				'data' => $data,
				'hora' => $hora,
				'participantes' => $participantes,
				'objectivo' => $objectivo,
				'feedback' => $feedback,
				'utilizador' =>  $user,
				'dataCriacao' => $dateString,
				'estado' => 'A'
				
			);
		
		
		//validaFormReuniao( $op );
		
		$reuniao = new Reuniao( $op );
		
		$r = $reuniao->insere();
		
		
		if( $r == -1) 
		{
			header('Location: entidade.php?id='.$idOrg.'&sucess=2');
		}
		else
		{
			header('Location: entidade.php?id='.$idOrg.'&sucess=1');
		}

		
		
		
		
	?>