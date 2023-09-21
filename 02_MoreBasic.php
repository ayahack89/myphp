<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MY php2</title>
</head>
<style>
     *{
          margin: 0;
          padding: 0;
          box-sizing: border-box;
          
     }
     .container{
        background-color:gray;
        color: black;
        font-family: Arial, Helvetica, sans-serif;
         max-width: 80%;
        padding: 23px;
        margin: auto;
     }
</style>
<body>
     <div class="container">
          
          <h1>Let's learn about php.</h1>
          <p>Your party status is here - </p>
          
          <?php
          //If else
          echo "<br>";
           $age = 22;
           if($age>18){
               echo "You can go to the party";
           }
           else if($age == 7){
               echo "You are 7 years old.";
           }
           else{
               echo "You can not go to the party";
           }
          ?>

          <?php
          //Array
          echo "<br>";
          $languages = array("Python", "C++", "php", "NodeJs" );
          echo $languages[2];
          echo "<br>";
          echo "The length of array is,";
          echo count($languages);
          ?>
          <?php
          // While loops
          echo "<br>";
          $i=0;
          while ($i <= 10) {
               echo "<br>Itteration: ";
               echo $i;
               $i++;
          } 
          echo "<br>";
          ?>
          <?php
          echo "<br>";
          echo "<h4>Print array using while loop.</h4>";
          echo "<br>";
          $friends = array("Agnik", "Vivek", "Jeet", "Shivam");
          $x = 0;
          while($x < count($friends)){
               echo "<br> frnd: ";
               echo $friends[$x];
               echo $x++;
          } 
          ?>
          <?php
          //do while loop 
          echo "<br>";
          $a=0;
          do{
               echo "<br>Itteration: ";
               echo $languages[$a];
               $a++;
          } while ($a < count($languages));
          echo "<br>";

          ?>
          <?php 
          //For loop
          for ($i=0; $i <10 ; $i++) {
               echo "<br> the value of a is: ";
               echo $i;

          }
          echo "<br>";
          ?>
          <?php
          foreach ($friends as $myfriends){
               echo "<br> YoY! boys : ";
               echo $myfriends;
          }
          echo"<br>";
          ?>
          <?php
          // Functions
          function print5(){
               echo 5;

          } 
          echo print5();
          echo "<br>";
          ?>
          <?php
          function numCountUsingLoop(){
               echo 10;
          }
          $o = 0;
          while ($o < 11){
               echo "<br>";
               echo (numCountUsingLoop() + $o);
               $o++;
          }
          echo "<br>";
          ?>
          <?php
          function print_numbers($number){
               $sum = $number + 10;
               echo $sum;
          } 
          echo "<br>";
          echo print_numbers(20);
          echo "<br>";
          ?>
          <?php
          $str = "This";
          echo $str."<br>";
          $lenn = strlen($str);
          echo "The length of this string is ". $lenn; 
          echo "<br> The number of words in this string is ".str_word_count($str). ". The end.";
          echo "<br>";
          $secondStrr = "Ayanabha Chatterjee.";
          echo "<br> the reverse string is". strrev($secondStrr);
          ?>

     </div>
     
</body>
</html>