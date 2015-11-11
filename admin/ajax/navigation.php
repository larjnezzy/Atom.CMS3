<?php

include('../../config/connection.php');

$stmt = $dbc->prepare("UPDATE navigation SET label = ?, url = ?, status = $_POST[status] WHERE id = '$_GET[id]'");

$stmt->bindParam(1, $_POST['label']);
$stmt->bindParam(2, $_POST['url']);

$stmt->execute();

if ($stmt->rowCount() > 0) {
	
	echo 'Saved';
	
} else {
	
	echo 'Error';

}

?>