<?php
@ini_set('default_charset', 'UTF-8');
 
require_once('SQLiteConnection.php');

$pdo = new SQLiteConnection();
$db = $pdo->connect();
/*
if ($db != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';
  */

$ret = $pdo->modUserRole("nyahon2", 0);

$pdo->delUser("nyahon23");
$ret = $pdo->getRole("nyahon");
?>
