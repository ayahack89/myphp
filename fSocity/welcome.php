
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
    
        background-color: black;
        color: white;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      
        font-size: 1.5rem;
    }
   
    .main .header{
        background-color: blue;
      padding: 10px;
      width: 97.5%;
      color: aliceblue;
      text-align: center;
      font-size: 2rem;
      font-weight: bolder;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .main{
        border: 5px outset white;
        width: 55%;
        padding-bottom: 10px;
    }
</style>
<body>
    <center>
    <div class="main">
<div class="header">Welcome to fSocity</div> <br> 
Your name is <?php echo $_POST["name"]; ?><br>
Your email address is <?php echo $_POST["email"]; ?><br>
Your password is <?php echo $_POST["password"]; ?><br>
You are now a member of fSocity.
</div>
    </center>
</body>
</html>


 