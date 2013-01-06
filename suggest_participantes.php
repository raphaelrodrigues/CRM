<?
	
	require_once ('connect.php');
	
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_DATABASE, $con);
	
	$rs = mysql_query('select user from login where user like "'. mysql_real_escape_string($_REQUEST['term']) .'%"');
	
	
	
	$data = array();
	if ( $rs && mysql_num_rows($rs) )
	{
		while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
		{
			$data[] = array(
				'value' => $row['user']
			);
		}
	}
	
	//$data[] = array('value' => 'Aiesecer');
	$data[] = array('value' => 'Membros da Organizaçao');
	
	echo json_encode($data);
	flush();
	  
  ?>