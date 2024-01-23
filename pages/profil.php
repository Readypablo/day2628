<?php include("header.php");
require('bd_connect/db.php');
include("bd_connect/auth_session.php");







$sql3 = "SELECT user_answers.id,user_answers.user_id,user_answers.question_id,user_answers.answer_id,
answers.answer_text, answers.is_correct,
questions.question_text, questions.questions_ball 
FROM user_answers INNER JOIN questions on user_answers.question_id= questions.id JOIN answers on user_answers.answer_id = answers.id";
$result = $con->query($sql3);


for($data = []; $row = mysqli_fetch_assoc($result); $data[]=$row)
{

}








?>



<div class="form">
<h2 >профиль</h2>
      Имя:<?php echo   $_SESSION['user_name_us']; ?> <br>
      Фамилия:<?php echo   $_SESSION['user_name_last']; ?><br>
 
    <a href="bd_connect/logout.php">Выход</a>
</div>









<?php 




foreach($data as $elem)  {

    if($_SESSION['first_name']== $elem['user_id']){


        
                $question_id = $elem['questions_ball'];
                $question_text = $elem['question_text'];
          
                echo '<div class="quest">ВОПРОС<label>  ' . $question_text . '</label>';
              
                // Получить список вариантов ответов для каждого вопроса

              
                        $answer_id = $elem['id'];
                        $answer_text = $elem['answer_text'];
                        $correct_text = $elem['is_correct'];
                
                        echo 'Ваш ОТВЕТ <label for="' . $answer_id . '">' . $answer_text . '</label>';
           
                          
                        if($correct_text ==1){
                            echo 'результат: ВЕРНО';
                            echo '<br>';
                            echo '<br>';
                        }else{
                            echo 'результат: НЕВЕРНО';
                            echo '<br>';
                            echo '<br>';
                        }
                        echo '</div>';
                     
                    
                
                    }
            }
        





?>










     
     <script >
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}



</script>