<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    
<header>

<img src="img/logo.png"  id="logotip">
<a href="index.php" class="link_log"><p>TravelPlanet</p></a>
</header>

<main>


<div class="menuhad">

<a href="pages/login.php" class="link_head">Вход</a>

<a href="pages/catalog.php" class="link_head">тесты</a>
<a href="pages/profil.php" class="link_head">Профиль</a>

</div>

<h1 class="zag">ТЕСТЫ</h1>



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
    





    </form>






</div>


</div>
</main>


</body>
</html>


<!-- https://phpandmysql.ru/mysql/kak-sdelat-test-na-php-i-mysql/ -->