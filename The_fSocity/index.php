<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/index.css">
    <title>Want to be a member of fSocity....</title>

   
  </head>
 
  <body>
    <div class="container background">
      <h1>Welcome To The fSocity</h1>
      
      <div class="form">
        <form action="savedata.php" method="post" name="myForm" onsubmit="return validateCheck()">
         
          <label for="Uname"
            >User Name: <br /><input
              type="text"
              name="Uname"
              id="Uname"
              placeholder="Enter your name"/>   </label
          ><br />
        
         <label for="password">  
          Password: <br>
          <input type="password" name="password" id="password" placeholder="Enter a strong password">
         </label><br>
         <span id="hide_password">YOUR PASSWORD LENGTH MUST BE IN 10 USING LETTERS[UPPER/LOWER] , SPACIAL CHARACTERS, DIGITS. </span>
         <label for="cpassword">  
          Confirm Password: <br>
          <input type="password" name="cpassword" id="cpassword" placeholder="Retype your password">
         </label><br>
         <span id="hide_cpassword">YOUR PASSWORD IS NOT MATCHED.</span>
        

         <label for="warning">
          <input type="checkbox" name="warning" id="warning"> Please enter your details very carefully.
         </label><br>
         <div class="btn">  
         <input type="submit" value="Submit" />
         </div>

        </form>
      </div>
      <footer>
      000fSocity 
    </footer>
    </div>
   

    <script>
      // form validation...
    
  
    function validateCheck(){
      //Get Element By FORMS...
      var name = document.forms['myForm']['Uname'].value;
      var password = document.forms['myForm']['password'].value;
      var cpassword = document.forms['myForm']['cpassword'].value;
      var checkbox = document.forms['myForm']['warning'];

      //Hide alerts
      hide_password = document.getElementById('hide_password');
      hide_cpassword = document.getElementById('hide_cpassword');
     
     
      
   
      //Name Validation
      if(name == ""){
        alert("⚠️PLEASE ENTER YOUR USER NAME!⚠️");
        return false;
      }

      //Password Validation
      //password
      if(password == ""){
        alert("⚠️PLEASE ENTER A PASSWORD!⚠️");
        return false;
      }
      if(password.length!= 10){
        hide_password.style.display = "block";
        return false;
      }
      //confirm password
      if(cpassword == ""){
        alert("⚠️PLEASE CONFIRM YOUR PASSWORD!⚠️");
        return false;
      }
      if(cpassword!==password){
        hide_cpassword.style.display = "block";
        return false;
      }


      //Check box varification...
       // Replace 'checkboxName' with the actual name or ID of your checkbox
    if (!checkbox.checked) {
      alert("⚠️PLEASE CHECK THE CHECKBOX!⚠️");
      return false;
   } else {
     return true;
  }

  
    
    
      }
    
      
      
      
    



    </script>
  </body>
</html>
