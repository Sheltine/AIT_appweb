<?php
@ini_set('default_charset', 'UTF-8');
 
require_once('SQLiteConnection.php');
 
echo "step1";
$pdo = new SQLiteConnection();
$db = $pdo->connect();
echo "step2";
if ($db != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';
    
    
$ret = $pdo->addUser("nyahon2", "hashit", "true","1");
echo "done adding user: ".$ret;

$ret = $pdo->modUser("nyahon2", "true","1");
?>
