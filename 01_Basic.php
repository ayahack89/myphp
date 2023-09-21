<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>MY php</title>
</head>
<style>
     .container{
          font-family: Arial, Helvetica, sans-serif;
     }
</style>
<body>
     <div class="container">
          This is my first php website.
          <br>
          <?php
          define('pi', 3.14);
          echo "fSocity!";
          // Single line comment.
          /*
          Multiline
          comments.
          */
         
          $variable = 34;
          $variable2 = 45;
          echo"<br>";
          $sum = $variable + $variable2;
          echo "The additon is, ".$sum. " YoY!";
          echo"<br>";
          $sub = $variable - $variable2;
          echo "The substraction is, ".$sub. " YoY!";
          echo"<br>";
          $mul = $variable * $variable2;
          echo "The multiplication is, ".$mul. " YoY!";
          echo"<br>";
          $div = $variable / $variable2;
          echo "The division is, ".$div. " YoY!";
          echo"<br>";
          // Swaping variable
          $var = 12;
          $temp = $var;
          echo "After swaping the variable is,".$temp."! Yeha";
          //Asignment opperators 
          echo "<br>";
          echo "Assignment operators.";
          echo "<br>";
          $temp +=  2;
          // $temp -=  2;
          // $temp *=  2;
          // $temp /=  2;
          echo "<br>";
          echo "The value of the new variable is,".$temp."yeeee!";
          echo "<br>";
          // Comparision operators
          echo var_dump(1==4);
          echo "<br>";
          echo var_dump(1!=4);
          echo "<br>";
          echo var_dump(1>=4);
          echo "<br>";
          echo var_dump(1<=4);
          echo "<br>";
          //Increment and decriment.
          echo $variable++;
          // echo $variable--;
          // echo $variable;
          echo "<br>";
          echo $variable;
          // Logical operatiors
          // and (&&)
          // or (||)
          // xor
          // not: !
          echo"<br>";
          $bol = (true) and (true);
          echo "<br>";
          echo var_dump($bol);
          /*Dat types;
           1.Strings
           2.Integer
           3.Float
           4.Boolean
           5.Array
           6.Object
           */
          echo"<br>";
          $v = "This is a string.";
          echo var_dump($v);
          echo"<br>";
          $I = 18;
          echo "This is a Integer.".$I;
          echo var_dump($I);
          echo"<br>";
          $flot = 445.8;
          echo "This is a floating number.".$flot;
          echo var_dump($flot);
          echo"<br>";
          $boool = true;
          echo "This is a boolean value.".$boool;
          echo var_dump($boool);
          echo "<br>";
          //Constant
          echo "This is an constant value: ";
          echo pi;


          ?>
         
     </div>
     
     
</body>
</html>