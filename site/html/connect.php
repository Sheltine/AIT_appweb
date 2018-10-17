<?php
@ini_set('default_charset', 'UTF-8');
 
require_once('SQLiteConnection.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 echo "step1";
$pdo = new SQLiteConnection();
$db = $pdo->connect();
echo "step2";
if ($db != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';
  
$pdo->addMail("02.04.18", "Sheltine", "Marinou", "coucou", "comment vas-tu?");

//$ret = $pdo->addUser("nyahon23", "hashit", "true","1");
//echo "done adding user: ".$ret;

$ret = $pdo->modUserRole("nyahon2", 0);
echo "\nRET: ".$ret;

$pdo->delUser("nyahon23");
$ret = $pdo->getRole("nyahon");
echo $ret;
?>
