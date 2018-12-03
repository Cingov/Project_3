<?php

//get all user quetsions
function get_questions($question_id) {
    global $db;
    $query = 'SELECT * FROM questions
              WHERE productID = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":questions_id", $question_id);
    $statement->execute();
    $allQ = $statement->fetch();
    $statement->closeCursor();
    return $allQ;
}

//get specific question
function get_one_question($oneQ_id) {
    global $db;
    $query = 'SELECT * FROM questions
              WHERE questions.questionID = :oneQ_id
              ORDER BY questionID';
    $statement = $db->prepare($query);
    $statement->bindValue(":oneQ_id", $oneQ_id);
    $statement->execute();
    $oneQ = $statement->fetchAll();
    $statement->closeCursor();
    return $oneQ;
}

//create a question
function add_question($question_id, $name, $body, $skill) {
    global $db;
    $query = 'INSERT INTO questions
                 (questionID, qName, qBody, qSkill)
              VALUES
                 (:question_id, :name, :body, :skill)';
    $statement = $db->prepare($query);
    $statement->bindValue(':question_id', $question_id);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':body', $body);
    $statement->bindValue(':skill', $skill);
    $statement->execute();
    $statement->closeCursor();
}

//delete a question
function delete_question($question_id) {
    global $db;
    $query = 'DELETE FROM questions
              WHERE questionID = :question_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':question_id', $question_id);
    $statement->execute();
    $statement->closeCursor();
}


?>
