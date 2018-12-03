<?php

require('../model/database.php');
require('../model/questions_db.php');
require('../model/accounts_db.php');

$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'list_questions';
}

if ($action == 'list_questions') {
	$questions_id = filter_input(INPUT_GET, 'questions_id',
				FILTER_VALIDATE_INT);
	if ($questions_id == NULL || $questions_id == FALSE) {
        $questions_id = 1;
}
    $questions = get_questions();
    $oneQ = get_one_question($oneQ_id);
    include('questions.php');
}
	else if ($action == 'delete_question') {
		$question_id = filter_input(INPUT_GET, 'question_id', 
            FILTER_VALIDATE_INT); 
        delete_question($question_id);
        header("Location: .?question_id=$question_id");
}
	else if ($action == 'add_question') {
		$category_id = filter_input(INPUT_GET, 'question_id', 
            FILTER_VALIDATE_INT);
		$name = filter_input(INPUT_POST, 'name');
		$body = filter_input(INPUT_POST, 'body');
		$skill = filter_input(INPUT_POST, 'skill');
		add_product($question_id, $name, $body, $skill);
		header("Location: .?question_id=$question_id");
}
?> 	
			
    
