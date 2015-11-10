<?php

function data_setting_value($dbc, $id){

  $stmt = $dbc->query("SELECT * FROM settings WHERE id = '$id'");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
		
	$data = $stmt->fetch();
	
	return $data['value'];	
	
}

function data_post_type($dbc, $id) {
  
  $stmt = $dbc->query("SELECT * FROM post_types WHERE id = $id");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
  $data = $stmt->fetch();	
	
	return $data;
	
}

function data_post($dbc, $id) {
	
	if(is_numeric($id)) {
		$cond = "WHERE id = $id";
	} else {
		$cond = "WHERE slug = '$id'";
	}

  $stmt = $dbc->query("SELECT * FROM posts $cond");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
  $data = $stmt->fetch();
	
	$data['body_nohtml'] = strip_tags($data['body']);
	
	if($data['body'] == $data['body_nohtml']) {
		
		$data['body_formatted'] = '<p>'.$data['body'].'</p>';
		
	} else {
		
		$data['body_formatted'] = $data['body'];
		
	}
	
	return $data;
	
}

?>