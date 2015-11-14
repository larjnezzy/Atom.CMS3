<?php

# Database Connection Here...

try {
  $db['host'] = 'localhost'; // Host name
  $db['name'] = 'atom_cms3'; // Database name
  $db['user'] = 'atom_cms'; // Username
  $db['pass'] = 'thepassword'; // Password
  $dbc = new PDO("mysql:host=$db[host];dbname=$db[name]", "$db[user]", "$db[pass]");
  
}
catch(PDOException $e) {
    echo $e->getMessage();
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    
}

?>
