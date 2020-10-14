<?php
  include 'database.php';
?>
<?php session_start(); ?>
<!--Here we are going to do all our queries -->
<?php
  //Set question number_format
  /*
  Store the super global $_GET['n'] that is in 
  the URL in $number
  */
  $number = (int) $_GET['n'];  
  
  //Here we are going to put the queries
  
  /*
  This is to get the question form the database
  to insert it into this web page
  */
  $query = "SELECT * FROM `questions` 
              WHERE question_number = $number";
              
  //Here we get the result from the query or die if there is not connection
  $result = $mysqli->query($query) or die($mysqli->error.__LINE__);
  //Here we storage the text from the database into $question
  $question = $result->fetch_assoc();
  
  
  /*We want to get the total of questions*/
    /*
    * Get total of questions
    */
    $query = "SELECT * FROM `questions`";
    //Get results
    $results = $mysqli->query($query) or die($mysqli->error.__LINE__);
    $total = $results->num_rows;
    $next = $total+1;
  
  
  
  /*
  This is to get the choices form the database
  to insert it into this web page
  */
  $query = "SELECT * FROM `choices` 
              WHERE question_number = $number";
  //Get results
  $choices = $mysqli->query($query) or die($mysqli->error.__LINE__);  
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
   <div class="current">Question <?php echo $question['question_number']; ?> of <?php echo $total; ?></div>
   <p class="question">
    <!--Here is where we insert the data from the database-->
    <?php echo $question['text']; ?> 
   </p>
   <form method="post" action="process.php">
    <ul class="choices">
      <?php while($row = $choices->fetch_assoc()) :?>     
      <li><input name="choice" type="radio" value="<?php echo $row['id'];?>"/><?php echo $row['text'];?></li>
      <!--<li><input name="choice" type="radio" value="1"/>Private Home Page</li>
      <li><input name="choice" type="radio" value="1"/>Personal Home Page</li>
      <li><input name="choice" type="radio" value="1"/>Personal Hypertext Preprocessor</li>-->
      <?php endwhile; ?>
    </ul>
    <input type="submit" value="Submit" />
    <!--We have to add a hidden input to pass the 
    question number to the process.php-->
    <input type="hidden" name="number" value="<?php echo $number; ?>"/>
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
