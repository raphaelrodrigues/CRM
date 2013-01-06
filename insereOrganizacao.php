<? 

		include ('Organizacao.class.php');
		include ('function.php');
		fazConexao();
		
		if( !isset($_POST['nome']) && !isset($_POST['nif']) && !isset($_POST['cidade']) && !isset($_POST['sectorActividade'])){
				header('Location:nova_organizacao.php?error=1');
		}
		
		$nome = mysql_real_escape_string($_POST['nome']);
		$telefone = mysql_real_escape_string($_POST['telefone']);
		$cidade = mysql_real_escape_string($_POST['cidade']);
		$email = mysql_real_escape_string($_POST['email']);
		$nif = mysql_real_escape_string($_POST['nif']);
		$morada = mysql_real_escape_string($_POST['morada']);
		$nomeResp = mysql_real_escape_string($_POST['nomeResp']);
		$contactoResp = mysql_real_escape_string($_POST['contactoResp']);
		$emailResp = mysql_real_escape_string($_POST['emailResp']);
		$sectorActividade = mysql_real_escape_string($_POST['sectorActividade']);
		$descricao = mysql_real_escape_string($_POST['descricao']);
		$site = mysql_real_escape_string($_POST['site']);
		$corporate = mysql_real_escape_string($_POST['radio']);
		
		
		
		//get da data de criacao
		$timeStamp = $_SERVER['REQUEST_TIME'];
		$dateString = date('Y-m-d', $timeStamp  );
		
		
		$op=array(
				'nome' => $nome,
				'tipo' => $corporate,
				'cidade' => $cidade,
				'telefone' => $telefone,
				'email' => $email,
				'nif' => $nif,
				'nomeResp' => $nomeResp,
				'contactoResp' => $contactoResp,
				'morada' => $morada,
				'emailResp' => $emailResp,
				'sectorActividade' => $sectorActividade,
				'descricao' => $descricao,
				'site' => $site,
				'dataCriacao' => $dateString
			);
		
		//validaFormOrganizacao( $op );
		
		$org = new Organizacao( $op );
		
		
		$r = $org->insere();
		
		
		if( $r == -1) 
		{
			header('Location: nova_organizacao.php?error=1');
		}
		else
			header('Location: dashboard.php?sucess=1');
		
		
		
		//echo $org->getNome() ."  TIPO ".$org->getTipo();
		
		//echo "Inseriu com sucesso";
	?>