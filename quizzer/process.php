<?php include 'database.php';?>
<?php 
/*We need a session variable, so we need to 
start the session
We have to have this in every file we are going to use the session
*/
session_start(); ?>
<?php
  //Check if session score is set
  if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0; //Set session to zero
  } 
  
  /*Next we need to get the answers
  that will be submit it by the customer
  and they are store in the super global
  array post
  */
  //if post is submit
  if ($_POST) {
    
    //echo 'Ive been submitted'; //This is to check
    
    /*Now we have to get the question number from the 
    question.php file through the hidden input name number
    and the choice from the input name choice*/
    $number = $_POST['number'];
    $selected_choice = $_POST['choice'];
    
    //echo $number.'<br/>'; echo $selected_choice; //This is to check that we are getting the variables
    //print_r($_POST); //This is to check all the variable in the $_POST array
    
    /*Another number we want to get is the nect question number
    to be able to redirect the customer to the next question */
    $next = $number+1;
    
    /*We want to get the total of questions*/
    /*
    * Get total of questions
    */
    $query = "SELECT * FROM `questions`";
    //Get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    
    /*Now we want to get the correct answer for the question */
    /*This is a general convention to do before any query*/
    /*
    * Get correct choice
    */
    $query = "SELECT * FROM `choices`
                WHERE question_number = $number AND is_correct = 1";
    
    /*Now we need to store the query in to a variable*/
    //Get result
    $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
    
    /*Now we want to get the row from the database*/
    //Get row
    $row = $result->fetch_assoc();
    
    //Set the correct choice
    $correct_choice = $row['id'];
    
    /*Now we can make the comparison*/
    //Compare
    if ($correct_choice == $selected_choice) {
      //Anser is correct
      $_SESSION['score']++; //add one to the $_SESSION['score'] variable
    }
    //echo $total; //This for testing 
    //echo $number; //This for testing
    //die(); //This for testing
    /*Now we want to check if this is the last question to stop
    or continue*/
    if ($number == $total) {
      header("Location: final.php");
      exit();
    } else {
      header("Location: question.php?n=".$next);
    }
    
  }