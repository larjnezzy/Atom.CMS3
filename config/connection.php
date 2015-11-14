<?php

# Database Connection Here...

try {
  $db['host'] = 'localhost';
  $db['name'] = 'atom_cms3';
  $db['user'] = 'atom_cms';
  $db['pass'] = 'thepassword';
  $dbc = new PDO("mysql:host=$db[host];dbname=$db[name]", "$db[user]", "$db[pass]");
  
}
catch(PDOException $e) {
    echo $e->getMessage();
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    
}

?>