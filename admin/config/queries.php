<?php

	switch ($page) {
		
		case 'dashboard':
		
		break;
		
		case 'pages':

			if(isset($_POST['submitted']) == 1) {
				
				$title = mysqli_real_escape_string($dbc, $_POST['title']);
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$header = mysqli_real_escape_string($dbc, $_POST['header']);
				$body = mysqli_real_escape_string($dbc, $_POST['body']);
				
				if(isset($_POST['id']) != '') {
					$action = 'updated';
					$q = "UPDATE posts SET user = $_POST[user], slug = '$_POST[slug]', title = '$title', label = '$label', header = '$header', body = '$body' WHERE id = $_GET[id]";
				} else {
					$action = 'added';							
					$q = "INSERT INTO posts (type, user, slug, title, label, header, body) VALUES (1, $_POST[user], '$_POST[slug]', '$title', '$label', '$header', '$body')";
				}
				
				
				$r = mysqli_query($dbc, $q);
				
				if($r){
					
					$message = '<p class="alert alert-success">Page was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Page could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_post($dbc, $_GET['id']); }
			
		break;
		
		case 'users':

			if(isset($_POST['submitted']) == 1) {
				
				
				
				if($_POST['password'] != '') {
					
					if($_POST['password'] == $_POST['passwordv']) {
						
						$password = sha1($_POST['password']);
						$verify = true;
						
					} else {
						
            
						$verify = false;
						
					}					
					
				} else {
						
					$verify = false;	
					
				}
				
				$data = new User($_POST['first'],$_POST['last'],$_POST['email'],$_POST['status']);
        
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
          
					
          if($verify == true) {
           $stmt = $dbc->prepare("UPDATE users SET first = :first, last = :last, email = :email, password = '$password', status = :status WHERE id = $_GET[id]");
          }else{
           $stmt = $dbc->prepare("UPDATE users SET first = :first, last = :last, email = :email, status = :status WHERE id = $_GET[id]"); 
          }
          $stmt->execute((array)$data);
          
				} else {
					
					$action = 'added';
					$stmt = $dbc->prepare("INSERT INTO users (first, last, email, password, status) VALUES (:first, :last, :email, :password, :status)");
					
					if($verify == true) {
						$stmt->execute((array)$data);
					}

				}
				

				
				if ($stmt->rowCount() > 0) {
					
					$message = '<p class="alert alert-success">User was '.$action.'!</p>';

				} else {

					$message = '<p class="alert alert-danger">User could not be '.$action;
					if($verify == false) {
						$message .= '<p class="alert alert-danger">Password fields empty and/or do not match.</p>';
					}
				
				}
							
			}
			
			if(isset($_GET['id'])) { $opened = data_user($dbc, $_GET['id']); }
			
		break;
			
		case 'navigation':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$url = mysqli_real_escape_string($dbc, $_POST['url']);
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE navigation SET id = '$_POST[id]', label = '$label', url = '$url', position = $_POST[position], status = $_POST[status] WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($dbc, $q);
					
				} 
				

				
				if($r){
					
					$message = '<p class="alert alert-success">Navigation Item was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Navigation Item could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
	
		
		break;
		
		case 'settings':
		
			if(isset($_POST['submitted']) == 1) {
				
				$label = mysqli_real_escape_string($dbc, $_POST['label']);
				$value = mysqli_real_escape_string($dbc, $_POST['value']);
				
				if(isset($_POST['id']) != '') {
					
					$action = 'updated';
					$q = "UPDATE settings SET id = '$_POST[id]', label = '$label', value = '$value' WHERE id = '$_POST[openedid]'";
					$r = mysqli_query($dbc, $q);
					
				} 
				

				
				if($r){
					
					$message = '<p class="alert alert-success">Setting was '.$action.'!</p>';
					
				} else {
					
					$message = '<p class="alert alert-danger">Setting could not be '.$action.' because: '.mysqli_error($dbc);
					$message .= '<p class="alert alert-warning">Query: '.$q.'</p>';
					
				}
							
			}
	
		
		break;		
		
		default:
			
		break;
	}




?>