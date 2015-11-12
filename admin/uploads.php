<?php

include('../config/connection.php');
include('classes/user.php');
include('functions/data.php');
include('functions/template.php');
include('functions/sandbox.php');

$ds = DIRECTORY_SEPARATOR;  //1
$id = $_GET['id'];
$old = data_user($dbc, $id);

$storeFolder = '../uploads';   //2

$ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$newname = time();
$random = rand(100,999);
$name = $newname.$random.'.'.$ext;

 
$stmt = $dbc->prepare("UPDATE users SET avatar = ? WHERE id = $id");

$stmt->bindParam(1, $name);

$stmt->execute(); 
 
if ($stmt->rowCount() > 0) {
  
  echo 'Saved';
  
} else {
  
  echo 'Error';

}
 
if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          //3             
      
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
     
    $targetFile =  $targetPath. $name;  //5
 
    move_uploaded_file($tempFile,$targetFile); //6    
    
    $deleteFile = $targetPath.$old['avatar'];
	
    if($old['avatar'] != '') {
    	
		if(!is_dir($deleteFile)) {
			
			unlink($deleteFile);
			
		}

    }
  
}
?> 
