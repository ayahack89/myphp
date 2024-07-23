<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <title>Test Website</title>
  </head>
  <!-- include() Vs require()
The only difference is that the include() statement generates a PHP alert but allows 
script execution to proceed if the file to be included cannot be found. At the same time, 
the require() statement generates a fatal error and terminates the script. -->

<!-- php, then in the case of the include_once(), the output will be shown with warnings about 
missing file, but at least the output will be shown from the index. php file. In the case of 
the require_once(), if the file PHP file is missing, then a fatal error will arise and no output 
is shown and the execution halts. -->
  <body>
    <?php include "header.php"; ?>
      <div class="container">
        <?php include "sidelist.php" ?>
        <div class="right-side-container">
          <h3>Welcome</h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore
            laboriosam veritatis ipsa quas ab magnam alias quis repellendus
            itaque, suscipit maxime, cum corrupti sequi voluptatibus. Aliquam
            omnis culpa fugiat vel.
          </p>
        </div>
      </div>
      <?php include "footer.php"; ?>
    </div>
  </body>
</html>
