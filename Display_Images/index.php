<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Uploade and Display Images...</title>
</head>
<style>
     .container {
          width: 500px;
          margin: 0 auto;
          padding: 10px;
          background-color: transparent;
          border: 4px dotted black;
          border-radius: 10px;
          margin-top: 10%;
     }

     h1 {
          text-align: center;
          font-family: 'Courier New', Courier, monospace;
     }

     form {
          display: flex;
          flex-direction: column;
     }

     input[type="file"] {
          border: 2px solid black;
          padding: 8px;
          width: 50%;
          font-size: 1rem;
          margin-left: 25%;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
     }

     input[type="submit"] {
          width: 20%;
          padding: 5px;
          font-size: 1rem;
          margin-top: 20px;
          margin-left: 25%;
          font-family: 'Courier New', Courier, monospace;
          font-weight: bolder;
          background-image: linear-gradient(yellow, green);
          border: 1px solid black;
          border-radius: 5px;
          transition: all 4ms ease-in;

     }

     input[type="submit"]:hover {
          cursor: pointer;
          transform: translateY(2%);

     }
</style>

<body>
     <?php
     if (isset($_FILES['image'])) {
          // echo "<pre>";
          // print_r($_FILES['image']);
          // echo "</pre>";
     
          $file_name = $_FILES['image']['name'];
          $fill_path = $_FILES['image']['full_path'];
          $file_type = $_FILES['image']['type'];
          $temp_name = $_FILES['image']['tmp_name'];
          $error = $_FILES['image']['error'];
          $file_size = $_FILES['image']['size'];

          move_uploaded_file($temp_name, "uploade/" . $file_name);
          header("Location: uploade.php");
     }

     ?>


     <div class="container">

          <form action="index.php" method="post" enctype="multipart/form-data">
               <h1>Uploade A Image</h1>
               <input type="file" name="image" id="uimg">
               <input type="submit" value="Uploade" name="submit">
          </form>
     </div>

</body>

</html>