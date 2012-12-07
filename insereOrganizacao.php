<? 

		include ('Organizacao.class.php');
		include ('function.php');
		
		
		if( !isset($_POST['nome']) && !isset($_POST['nif']) && !isset($_POST['cidade']) && !isset($_POST['sectorActividade'])){
				header('Location:nova_organizacao.php?error=1');
		}
				 
		$nome = $_POST['nome'];
		$telefone = $_POST['telefone'];
		$cidade = $_POST['cidade'];
		$email = $_POST['email'];
		$nif = $_POST['nif'];
		$morada = $_POST['morada'];
		$nomeResp = $_POST['nomeResp'];
		$contactoResp = $_POST['contactoResp'];
		$emailResp = $_POST['emailResp'];
		$sectorActividade = $_POST['sectorActividade'];
		$descricao = $_POST['descricao'];
		$site = $_POST['site'];
		
		//get da data de criacao
		$timeStamp = $_SERVER['REQUEST_TIME'];
		$dateString = date('Y-m-d', $timeStamp  );
		
		
		$op=array(
				'nome' => $nome,
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