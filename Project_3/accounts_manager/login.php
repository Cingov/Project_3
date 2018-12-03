<?php 

require "database.php"

if(isset($_POST['login'])){

$email = filter_input(INPUT_POST, "email");
$pass = filter_input(INPUT_POST, "password");


//Check for empty fields
	if (empty($email) || empty($pass)) {
		echo("Field is empty");
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

		
}
header("Location: .?action=user_Qlist.php");

?>
