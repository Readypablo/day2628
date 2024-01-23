
<?php 
include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");
?>



<?php



if (!$con) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answers = $_POST['answer'];

    foreach ($answers as $question_id => $answer_id) {
        // Вставить ответы пользователя в таблицу "user_answers"
        $name = $_SESSION["first_name"];
        $sql_insert = "INSERT INTO user_answers (user_id, question_id, answer_id) VALUES ($name, $question_id, $answer_id)";
        mysqli_query($con, $sql_insert);
    }

    echo 'Ответы успешно сохранены!';
}
?>


<!-- $sql3 = "SELECT user_answers.id,user_answers.user_id,user_answers.question_id,user_answers.answer_id,
answers.answer_text, answers.is_correct,
questions.question_text, questions.questions_ball 
FROM user_answers INNER JOIN questions on user_answers.question_id= questions.id JOIN answers on user_answers.answer_id = answers.id";
$result = $con->query($sql3);
 -->
