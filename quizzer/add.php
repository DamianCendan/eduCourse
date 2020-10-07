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
   <form method="post" action="add.php">
    <p>
      <label>Question Number: </label>
      <input type="number" name="question_number"/>
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
