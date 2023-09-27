
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css"
      integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv"
      crossorigin="anonymous"
    />

    <title>Welcome</title>
  </head>
  <body>
    <!-- navbar start  -->
    <nav class="navbar-dark bg-primary py-4 h3 text-center mb-0">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1"
          >Tech Trivia 2023 Registartion Form</span
        >
      </div>
    </nav>
    <!-- navbar - end  -->
    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
     $email = $_POST['email'];
     $password = $_POST['password'];
     echo "
     <div class='alert alert-warning alert-dismissible fade show mt-0 justify-content-between pb-1' role='alert'>
     <p class='mx-5'>
     <strong>Succesfully Registered!</strong> Your email is $email and password ******** has been submitted successfully!</p>
     <button type='button' class='btn-close mx-3' data-bs-dismiss='alert' aria-label='Close'></button>
 </div>
";
} 
?>

    <!-- form start  -->

  

    <div class="container mt-5 mx-5 px-5">
      <h1 class="h3 mx-5 px-5">Please enter your email and password</h1>
      <form action="index.php" method="post" class="mx-5 px-5">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label"
            >Email address</label
          >
          <input
            type="email"
            class="form-control"
            id="exampleInputEmail1"
            aria-describedby="emailHelp"
            name="email"
          />
          <div id="emailHelp" class="form-text">
            We'll never share your email with anyone else.
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            id="exampleInputPassword1"
            name="password"
          />
          <div id="emailHelp" class="form-text">
            Your password should be 8 digits mixed up with alphabet, special charecters, numbers.
          </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <!-- form end  -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
