<? 

		include ('function.php');
		fazConexao();
		
		
		if( !isset($_POST['nome']) && !isset($_POST['nif']) && !isset($_POST['cidade']) && !isset($_POST['sectorActividade'])){
				header('Location:editOrganizacao.php?error=2');
		}
		
		$idOrg = $_POST['idOrg'];
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
		

		$op=array(
				'idOrg' => $idOrg,
				'tipo' => $corporate,
				'nome' => $nome,
				'cidade' => $cidade,
				'telefone' => $telefone,
				'email' => $email,
				'nif' => $nif,
				'nomeResp' => $nomeResp,
				'contactoResp' => $contactoResp,
				'emailResp' => $emailResp,
				'sectorActividade' => $sectorActividade,
				'descricao' => $descricao
				
			);
		
		$org = new Organizacao( $op );
		$org->print1();
	
		$r = $org->actualiza();
		
		if( $r == -1) 
		{
			header("Location: editOrganizacao.php?error='$idOrg'");
		}
		else
			header('Location: entidade.php?id=$idOrg&sucess=1');
		
	?>