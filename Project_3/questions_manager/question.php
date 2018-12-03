<?php 

require "database.php"


if(isset($_POST['question'])){

//Retrieve values
$name = $_POST["qName"];
$body = $_POST["qBody"];
$skill = $_POST["qSkill"];
$skillsArray = explode(',', $skill);

//Check for empty fields
if (empty($name) || empty($body) || empty($skill)) {
	echo("Field is empty");
}
//check at least 3 char 
else	if (strlen($name) < 3) {
		$error = "Not enough information";
		echo($error);
}
//check less than 500 char
	else if (strlen($body) > 500) {
	$error = "Exceeds number of characters";
	echo($error);
}
//display skills in array
	else if (count($skillsArray) < 2 ) {
		echo 'add more skills';
	}	else {
		echo 'all valjd';
		foreach($skillsArray as $key => $value) {
			echo $key. '=' .$value . '<br>';
		}
}
//insert new question to db


 
} 
?>
