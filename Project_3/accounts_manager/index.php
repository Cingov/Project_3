<?php

require('../model/database.php');
require('../model/questions_db.php');
require('../model/accounts_db.php');

$action = filter_input(INPUT_GET, 'action');
	if ($action == NULL) {
		$action = 'list_users';
}

if ($action == 'list_users') {
    $user_id = filter_input(INPUT_GET, 'user_id', 
            FILTER_VALIDATE_INT);
    if ($user_id == NULL || $user_id == FALSE) {
        $user_id = 1;
}
    $users = get_users();
    $user_name = get_user_by_name($user_id);
    include('registration.php');    
} 
?>
