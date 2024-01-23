<?php 
include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");



?>



















<div class="popular-row">

<form action="submit.php" method="POST">
<h2>test1</h2>
        <?php


$host= 'localhost';
 $user = 'root';
 $password = '';
 $db_name = 'day13';
 $con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_errno()){
    echo "failed".mysqli_connect_errno();
}


        // Получить список вопросов из базы данных
        $sql = "SELECT * FROM questions";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {



            while ($row = mysqli_fetch_assoc($result)) {
                $question_id = $row['id'];
                $question_text = $row['question_text'];
                if($row['test_id']==1){
                echo '<p>' . $question_text . '</p>';

                // Получить список вариантов ответов для каждого вопроса
                $sql_answers = "SELECT * FROM answers WHERE question_id = $question_id";
                $result_answers = mysqli_query($con, $sql_answers);

                if (mysqli_num_rows($result_answers) > 0) {
                    while ($row_answer = mysqli_fetch_assoc($result_answers)) {
                        $answer_id = $row_answer['id'];
                        $answer_text = $row_answer['answer_text'];

                        echo '<input type="radio" name="answer[' . $question_id . ']" value="' . $answer_id . '" required>';
                        echo '<label for="' . $answer_id . '">' . $answer_text . '</label>';
                        echo '<br>';
                    }
                }
              }
            }
        }







        
        ?>

        <input type="submit" value="Отправить">
    </form>

    <form action="submit.php" method="POST">


<h2>test2</h2>




<?php 

$sql = "SELECT * FROM questions";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {



    while ($row = mysqli_fetch_assoc($result)) {
        $question_id = $row['id'];
        $question_text = $row['question_text'];
        if($row['test_id']==0){
        echo '<p>' . $question_text . '</p>';

        // Получить список вариантов ответов для каждого вопроса
        $sql_answers = "SELECT * FROM answers WHERE question_id = $question_id";
        $result_answers = mysqli_query($con, $sql_answers);

        if (mysqli_num_rows($result_answers) > 0) {
            while ($row_answer = mysqli_fetch_assoc($result_answers)) {
                $answer_id = $row_answer['id'];
                $answer_text = $row_answer['answer_text'];

                echo '<input type="radio" name="answer[' . $question_id . ']" value="' . $answer_id . '" required>';
                echo '<label for="' . $answer_id . '">' . $answer_text . '</label>';
                echo '<br>';
            }
        }
      }
    }
}




?>
    





    <input type="submit" value="Отправить">
    </form>






</div>
<br>
</div>




</div>



 