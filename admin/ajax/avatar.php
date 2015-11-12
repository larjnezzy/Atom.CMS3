<?php

include('../../config/connection.php');
include('../classes/user.php');
include('../functions/data.php');
include('../functions/template.php');
include('../functions/sandbox.php');	

$id = $_GET['id'];	

$data = data_user($dbc, $id);

?>

<div class="avatar-container" style="background-image: url('../uploads/<?php echo $data['avatar']; ?>')"></div>