<?php 

$dsn = 'mysql:host=mysql1.njit.edu;dbname=vmc23';
$username = 'vmc23';
$password = '8LVD4HgK8';

//PDO

try {
    $conn = $db = newPDO($dsn, $username, $password);
    echo "Connected";
}
catch(PDOException $e){
    $error = $e->getMessage();
	echo "Connection failed";
}

?>
