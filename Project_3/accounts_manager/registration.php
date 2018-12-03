<?php 

require "database.php"

if(isset($_POST['login'])){

$first = filter_input(INPUT_POST, "first");
$last = filter_input(INPUT_POST, "last");
$birth = filter_input(INPUT_POST, "birth");
$email = filter_input(INPUT_POST, "email");
$pass = filter_input(INPUT_POST, "password");

//Check for empty fields
	if (empty($first)) {
		$error="field is empty";
		echo($error); 
}	
	else if (empty($last)) {
		echo($error); 
}	
	else if (empty($birth)) {
		echo($error); 
}	
	else if (empty($email)) {
		echo($error); 
}
	else if (empty($pass)){ 
		echo($error); 
}
//check for @ in email
	else if (strpos($email, '@') < 0) {
	$error = "Email needs @";
	echo($error);
}  
//check if password less than 8 char
	else if (strlen($pass) < 8) {
		$error = "Password must exceed 8 characters";
		echo($error);
}	
	else {
		echo "valid";
}

//Execute

if ($fname != "") || ($lname !="") || ($birth != "") 
|| ($email != "") || ($pass != ""){
	$query = 'INSERT INTO accounts (userID, fname, lname, birth, email, pass)
              VALUES (:user_id, :fname, :lname, :birth, :email, :pass)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':fname', $fname);
	$statement->bindValue(':lname', $lname);
    $statement->bindValue(':birth', $birth);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $statement->closeCursor();
}
else{
	echo"user already exists";
}
}
header("Location: .?action=user_Qlist.php");

?>
