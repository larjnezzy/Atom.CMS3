<?php

include('../../config/connection.php');

$stmt = $dbc->prepare("UPDATE navigation SET id = '$_POST[id]', label = ?, url = ?, status = $_POST[status] WHERE id = '$_POST[openedid]'");

$stmt->bindParam(1, $_POST['label']);
$stmt->bindParam(2, $_POST['url']);

$stmt->execute();

if ($stmt->rowCount() > 0) {
	
	echo 'Saved';
	
	
} else {
	
	echo 'Error';

}


?>