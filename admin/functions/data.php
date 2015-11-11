<?php

function data_setting_value($dbc, $id){

  $stmt = $dbc->query("SELECT * FROM settings WHERE id = '$id'");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
  $data = $stmt->fetch();
  
  return $data['value'];  
  
}

function data_user($dbc, $id) {
		
	if(is_numeric($id)) {
		$cond = "WHERE id = '$id'";
	} else {
		$cond = "WHERE email = '$id'";
	}
	
  $stmt = $dbc->query("SELECT * FROM users $cond");
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
  $data = $stmt->fetch();
	
	$data['fullname'] = $data['first'].' '.$data['last'];
	$data['fullname_reverse'] = $data['last'].', '.$data['first'];
	
	
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