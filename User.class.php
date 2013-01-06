<?
	include ('connect.php');
	include('Mail.class.php');
	/**
	 * Classe do utilizador do sistema
	 *
	 * @param string $user -Username do user
	 * @param string $pass -Password do User(MIN 5 caracteres);
	 * @email string $email- Mail do user
	 * @var boolean Usa um cookie para melhorar a segurança? 
	 */
	class User
	{
		private $user;
		private $pass;
		private $email;
		private $cookie; 
		private $sessaoIniciada;
		private $activo;
		private $verificado;
		private $dataRegisto;
		private $permissoes;
		private $salt;
		/** 
		 * Armazena as mensagens de erro 
		 * @var string 
		 */ 
		private $erro ; 
		private $mysql;

		
		
		function __construct($a,$b,$c,$d,$e)
		{
	
			$this->user=$a;
			$this->pass= $b;
			$this->email = $c;
			$this->nome = $d;
			$this->dataRegisto = $e;
			$this->erro ='';
			$this->salt ='';
			$this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		}
		
		
		
		/**GETS*/
		
		public function getUser()
		{
			return $this->user;
		}
		
		
		public function getPass()
		{
			return $this->pass;
		}
		
		public function getEmail()
		{
			return $this->email;
		}
		
		public function getNome()
		{
			return $this->nome;
		}
		
		public function getDataRegisto()
		{
			return $this->dataRegisto;
		}
		
		public function getPermissoes()
		{
			return $this->permissoes;
		}
		
		//Checks if there is a login cookie
		public function autenticar()
		{
			
			 if( isset($_COOKIE['ID_my_site']) )
			 {
				$username = $_COOKIE['ID_my_site']; 
			
				$pass = $_COOKIE['Key_my_site'];
				
				$this->user = $username;
				//echo $pass, " " , $username," stuff";
				$query = $this->mysql->query("SELECT pass,permissao FROM login WHERE user = '$username'");
				
				while( $info = $query->fetch_array(MYSQLI_ASSOC) ) 	
				{
					if ($pass != $info['pass']) 
							return -1;
					else
					{	
						
						$this->initSession( $username, $pass, $info['permissao'] );
						return 0;
					}
				}
			 }
			 return -1;
		}
		
		public function initSession( $username, $password, $permissao)
		{
			session_start();
			$_SESSION['user'] = $username;
			$_SESSION['pwd'] = $password;
			$_SESSION['perm'] = $permissao;
						
		}
		
		public function setCookies ($hour )
		{
				setcookie(ID_my_site, $_COOKIE['ID_my_site'], $hour); 
	
				setcookie(Key_my_site, $_COOKIE['Key_my_site'], $hour);
		}
		
		/**
		 * Login
		 *
		 */
		public function login($user, $pass, $remember)
		{
			
			$r = 0;
			$sql = "select user,pass,activo,salt,permissao from login where user = '".$user."'";
			
			$query = $this->mysql->query($sql);
			
			if ($this->mysql->affected_rows > 0)
			{
				
				$row = $query->fetch_array(MYSQLI_ASSOC);
				//se password forem diferentes sai
				if( strcmp($this->encriptaPwd( $pass , $row['salt'] ) ,$row['pass']) ){
					return -1;	
				}
					
				
				//conta nao esta activa
				if( $row['activo'] == 0 )	
					$r = 1;
				else
				{
					
					//inicia o session
					$this->initSession( $row['user'] , $row['pass'] ,$row['permissao']);
					
					if ( $remember == 1 ) {
						//set the cookies for 1 day, ie, 1*24*60*60 secs
						$hour = time() + 1*24*60*60;
						setcookie(ID_my_site, $row['user'], $hour); 
	
						setcookie(Key_my_site, $row['pass'], $hour);	
					}
					
				}
			}
			else
				$r = 1;
			
			if( $r == 1 )
				return 1;
			else
				return 0;
		}
		
		
		
		
		public function logout()
		{
			  $past = time() -  3600; 

			 //this makes the time in the past to destroy the cookie 
			  $_SESSION = array(); //destroy all of the session variables
			  session_destroy();
			  
			 setcookie(ID_my_site, '', $past); 
			
			 setcookie(Key_my_site, '', $past); 
			
			 header("Location: login_page.php"); 

		}
		
		/**
		 * Valida se um user existe
		 *
		 * @param string $user - O user que será validado
		 * @param string $mail - O mail que sear validado
		 * @return 0/1 - Se o user existe ou não
		 */
		public function validaUtilizador() {
	
			// Procura por utilizadores com mesmo mail e usernamae
			$sql = "SELECT user,email from login where user = '".$this->user."' or email = '".$this->email."'";
			
			$result = $this->mysql->query( $sql );
			
			
			if (!$result) {
   				 die('Invalid queryVal: ' . mysql_error());
				 return -1;
			}
			else
				return ($this->mysql->affected_rows > 0) ? 0 : 1;				// Se houver apenas um user, retorna true
			
		}
		
		/**
		 * Verifica se um user existe
		 *
		 * @return 0/1 - Se o user existe ou não
		 */
		public function verificaUsername( $username ) {
	
			// Procura por utilizadores com mesmo mail e usernamae
			$sql = "SELECT user from login where user = '".$username."'";
			
			$result = $this->mysql->query( $sql );
			
			
			if (!$result) {
   				 die('Invalid queryVal: ' . mysql_error());
				 return -1;
			}
			else
				return ($this->mysql->affected_rows > 0) ? 1 : 0;			// Se houver  um user, retorna 0 senao 1
			
		}		
		
		
		
		public function novoUtilizador()
		{
			
			//verifica se email ou utilizador ja existe
			if( $this->validaUtilizador() == 0 ){
					$this->addErro("Username ou Email já existem!");
					return -1;
			}
			else
			{
				
				$this->salt =  $this->generateSalt(15);
				$passwordCod = $this->encriptaPwd( $this->pass , $this->salt );
				$sql = "INSERT INTO `login`( `user`, `pass`, `nome`, `email`,`dataRegisto`, `activo`, `salt`) VALUES ('$this->user','$passwordCod','$this->nome','$this->email','$this->dataRegisto',0,'$this->salt')";
				
				echo $sql;
				$result = $this->mysql->query( $sql );
				
				if (!$result) {
					 die('Invalid query: ' . mysql_error());
					 return -1;
				}
				else
					return 0;
				
			}
		}
		
		
	
		
		public function activaUtilizador($username)
		{
			
			$update_query = "UPDATE `login` set `activo`= 1 WHERE user = '".$username."'";
			
			$query = $this->mysql->query($update_query);
			
			if (!$query) {
					 die('Invalid query: ' . mysql_error());
					 return -1;
				}
				else {
					
					$mail = new Mail("raphaeljr28@gmail.com","raphaeljr28@gmail.com","Activação de conta","A sua conta foi activada!");
					$mail->enviar();
					return 0;
				}
		}
		
		public function desactivaUtilizador( $username )
		{
			
			$update_query = "UPDATE `login` set `activo`= 0 WHERE user = '".$username."'";
			
			$query = $this->mysql->query($update_query);
			
			if (!$query) {
					 die('Invalid query: ' . mysql_error());
					 return -1;
				}
				else
					return 0;
		}
		
		
		
	
		public function mudaPassword( $user, $passActual, $newPassword1, $newPassword2)
		{
			
			if( $this->validaPassword($user, $passActual) == 0)
			{
				if (strcmp($newPassword1, $newPassword2) == 0)
				{
					$salt = $this->generateSalt(10);
					$digest = $this->encriptaPwd( $newPassword1 , $salt );
					$update_query = "update login set `pass`= '".$digest."' , `salt`= '". $salt."' WHERE `user` ='$this->user' ";
					//echo $update_query;
					$query = $this->mysql->query($update_query);
					
					
					if (!$query) {
						 die('Invalid query: ' . mysql_error());
						 return -1;
					}
					else{
						setcookie(Key_my_site, $digest , $hour);
						return 0;
					}
				}
			}
			
			return -1;
		}
		
		
		public function validaPassword($user, $passActual)
		{
			
			// Procura por utilizadores com mesmo mail e usernamae
			
			$sql = "SELECT user,pass,salt from login where user = '".$this->user."'";
			
			
			$result = $this->mysql->query( $sql );
			
			if ($this->mysql->affected_rows > 0)
			{
				$row=$result->fetch_array(MYSQLI_ASSOC);
				
				return ( !strcmp($row['user'],$user) && !strcmp($row['pass'], $this->encriptaPwd( $passActual , $row['salt'] ) ) ) ? 0 : 1;
			}
			else
				return 1;

				
			
		}
		
		
		
		/**
		 * encriptação para codificar uma senha
		 *
		 * @param string $senha - A senha que será codificada
		 * @return string - A senha já codificada
		 */

		public function encriptaPwd( $password , $salt )
		{
			// Cria um hash
			$hash = md5($password.$salt);
			 
			// Encripta esse hash 1000 vezes
			for ($i = 0; $i < 1000; $i++) {
				$hash = md5($hash);
			}
			return $hash;	
		}
		
		function randomString($length) {
			
			$s = ""; 
			$letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; 
	
			for($i=0;$i < $length;$i++) {
				$char = $letters[mt_rand(0, strlen($letters)-1)]; 
				$s .= $char; //Add it to the string
			}
			return $s;
		}
	
		
		function generateSalt($max) {
	        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*?";
	        $i = 0;
	        $salt = "";
	        while ($i < $max) {
	            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
	            $i++;
	        }
	        return $salt;
        }


				
		public function enviaPasswordMail()
		{
				 // Email the new password to the person.
				$message = "G'Day!
				 
				Your personal account for the Project Web Site
				has been created! To log in, proceed to the
				following address:
				 
				http://www.example.com/
				 
				Your personal login ID and password are as follows:
				 
				userid: $_POST[newid]
				password: $newpass
				 
				You aren't stuck with this password! You can change it at any time after you have logged in.
				 
				If you have any problems, feel free to contact me at <you@example.com>.
				 
				-Your Name
				Your Site Webmaster
				";
				 
				mail($_POST['newemail'],"Your Password for Your Website",
				$message, "From:Your Name <you@example.com>");
				$newpass = substr(md5(time()),0,6);
		}
		
		public function getErros()
		{
			echo $this->erro;
		}
		
		public function addErro($erroS)
		{
			$this->erro .= " ". $erroS;
		}
		
		
	}
		