<?php
/*
First we want to check if the submit button was press
*/
//First connect to the database
include 'database.php'; 
?>
<?php 
  if (isset($_POST['submit'])) {  //This submit comes from the name:submit in this page form 
    //echo 'Submit was clicked'; //This is a test
    //Get the post variables
    $question_number = $_POST['question_number'];
    //echo $question_number; die(); //This is a test
    $question_text = $_POST['question_text'];
    $correct_choice = $_POST['correct_choice'];
    /*
    Now we need the choices and is best to get them 
    in an array
    */
    //Choices array
    $choices = array(); //This initialize the array
    /*Now we have to enter the array pare values*/
    $choices[1] = $_POST['choice1'];
    $choices[2] = $_POST['choice2'];
    $choices[3] = $_POST['choice3'];
    $choices[4] = $_POST['choice4'];
    $choices[5] = $_POST['choice5'];
    
    /*
    Now we have to do the query to insert the data
    into the database
    */
    //Question query
    //First we storage the query into a variable $query
    $query = "INSERT INTO `questions` (question_number, text)
              VALUE ('$question_number', '$question_text')";
    //Now we run the query
    $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    //Now we are going to validate the input
    if ($insert_row) {
      //Now we can iterate through the $choices array()
      foreach($choices as $choice => $value) {
        //First we are going to check if the value is there
        //if the $value is not empty continue to the next
        if($value != '') {
          //Now we will check if it is the right answer
          if($correct_choice == $choice) {
            $is_correct = 1;
          } else {
            $is_correct = 0;
          }
          //Now that we know what answer is correct
          //We will make the query to the database
          //First we put the query in a variable
          $query = "INSERT INTO `choices` (question_number, is_correct, text)
                   VALUES ('$question_number', '$is_correct', '$value')";
          //Run the query
          $insert_row = $mysqli->query($query) or die($mysqli->error.__LINE__);
          
          //Validate the input
          if ($insert_row) {
            continue;
          } else {
            die('Error : ('.$mysqli->errno . ') '. $mysqli->error);
          }
        }
      }
      /*
      Now when we get out of the loop 
      we are going to set a message
      */
      $msg = 'Question has been added';
    }
  }
  
  /*
  We want it to add the total of question in the database 
  to the Question Number
  */
  /*We want to get the total of questions*/
    /*
    * Get total of questions
    */
    $query = "SELECT * FROM `questions`";
    //Get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1;
?>

<!DOCTYPE html>
<!-- This is the language -->
<html lang="en">
<head>
<!-- This is the declaration the encoding protocol -->
<meta charset="UTF-8"/>

<!-- This is to make the site compatible with Internet Explorer when use BootStrap-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    
<!-- This is for responsive websites -->
<meta name="viewport" content="width=device-width, initial-scale=1">
 
<!-- This is the title of the page -->
<title>PHP Quizzer</title>
  
<!-- This is how to insert a Favicon in your website -->
<!--<link rel="icon" type="image/png" href="img/CUBE-FAVICON.png"/>-->
  
<!-- This is how to activate icons in your website form Font Awesome -->
<!--<script src="https://kit.fontawesome.com/8132883c87.js" crossorigin="anonymous"></script>-->

<!-- This will add JQuery to the page -->
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<!-- Latest compiled and minified CSS for Bootsrtap-->
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->
    
<!-- Latest compiled JavaScript for Bootsrtap -->
  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->
  
<!-- This your css style sheet -->
<link rel="stylesheet" href="css/style.css" type="text/css">

<style>

/* Here you can add some css */
 
</style>
  
</head>
<body>

<header>
  <div class="container">
    <h1>PHP Quizzer</h1>    
  </div>
</header>
<main>
  <div class="container">
   <h2>Add A Question</h2>
   <!--
   Here we are going to output the msg variable
   That will tell that a question has been added
   -->
   <?php 
    if (isset($msg)) {
      echo '<p>'. $msg. '</p>';
    }
   ?>
   <form method="post" action="add.php">
    <p>
      <label>Question Number: </label>
      <!--Here we are inserting the total of question
      in the value of the input-->
      <input type="number" value="<?php echo $next; ?>" name="question_number"/>
    </p>
    <p>
      <label>Question Text: </label>
      <input type="text" name="question_text"/>
    </p>
    <p>
      <label>Choice #1: </label>
      <input type="text" name="choice1"/>
    </p>
    <p>
      <label>Choice #2: </label>
      <input type="text" name="choice2"/>
    </p>
    <p>
      <label>Choice #3: </label>
      <input type="text" name="choice3"/>
    </p>
    <p>
      <label>Choice #4: </label>
      <input type="text" name="choice4"/>
    </p>
    <p>
      <label>Choice #5: </label>
      <input type="text" name="choice5"/>
    </p>
    <p>
      <label>Correct Choice Number: </label>
      <input type="number" name="correct_choice"/>
    </p>
    <p>      
      <input type="submit" name="submit" value="Submit"/>
    </p>
   </form>
  </div>
</main>
<footer>
  <div class="container">
    copyright &copy; 2020, PHP Quizzer
  </div>
</footer>

</body>
</html>
