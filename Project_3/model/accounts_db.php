<?php

//get list of users
function get_users() {
    global $db;
    $query = 'SELECT * FROM accounts
              ORDER BY userID';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;    
}
//get one user
function get_user_by_name($user_id) {
    global $db;
    $query = 'SELECT * FROM accounts
              WHERE userID = :user_id';    
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();    
    $user = $statement->fetch();
    $statement->closeCursor();    
    $user_name = $user['userName'];
    return $user_name;
}
//create new user
function add_user($user_id, $first, $last, $birth, $email, $pass) {
    global $db;
    $query = 'INSERT INTO accounts
                 (userID, fname, lname, birth, email, pass)
              VALUES
                 (:user_id, :fname, :lname, :birth, :email, :pass)';
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':fname', $fname);
	$statement->bindValue(':lname', $lname);
    $statement->bindValue(':birth', $birth);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':pass', $pass);
    $statement->execute();
    $statement->closeCursor();

?>
