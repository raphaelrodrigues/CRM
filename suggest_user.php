<?
	
	require_once ('connect.php');
	if ( !isset($_REQUEST['term']) )
		exit;
	
	$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    mysql_select_db(DB_DATABASE, $con);
	
	$rs = mysql_query('select user,pass from login where user like "'. mysql_real_escape_string($_REQUEST['term']) .'%"');
	
	
	
	$data = array();
	if ( $rs && mysql_num_rows($rs) )
	{
		while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
		{
			$data[] = array(
				'label' => $row['user'] .', '. $row['pass'] .' '. $row['user'] ,
				'value' => $row['user']
			);
		}
	}
	
	echo json_encode($data);
	flush();
	  
  ?>
		