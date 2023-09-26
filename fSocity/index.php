<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to fSocity</title>
  </head>
  <style>
    body {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    header {
      background-color: blue;
      padding: 5px;
      color: aliceblue;
      text-align: center;
      font-size: 1.6rem;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    .formCenter {
      display: flex;
      justify-content: center;
      align-items: center;
      border: 2px outset black;
      border-radius: 5px;
      background-color: rgb(215, 213, 213);
      max-width: 200px;
      height: 25vh;
      padding: 50px;
      padding-top: 80px;
      padding-bottom: 80px;
      padding-right: 70px;
      margin: auto;
      margin-top: 40px;
    }
    label {
      font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
        "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
      font-size: 1.2rem;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin: 5px;
      border: 2px inset black;
      border-radius: 5px;
    }
    .btn {
      padding-left: 7px;
      margin-top: 6px;
    }
    input[type="submit"] {
      padding: 8px;
      border: 5px outset blue;
      background-color: blue;
      color: white;
      font-size: 1.1rem;
      transition: all 3ms ease-in;
    }
    input[type="submit"]:hover {
      transform: translateY(-2%);
      cursor: pointer;
      background-color: rgba(0, 0, 255, 0.776);
      border: 5px outset rgba(0, 0, 255, 0.776);
    }
  </style>
  <body>
    <header>
      <h1>Welcome to fSocity</h1>
    </header>
    <div class="formCenter">
      <form action="welcome.php" method="post" class="form">
        <label for="name">Name:</label><br />
        <input
          type="text"
          name="name"
          id="name"
          placeholder="Enter your name"
          required
        /><br />
        <label for="email">Email:</label><br />
        <input
          type="email"
          name="email"
          id="email"
          placeholder="Enter your valid email"
          required
        /><br />
        <label for="password">Password:</label><br />
        <input
          type="password"
          name="password"
          id="password"
          placeholder="Enter a strong password"
          required
        /><br />
        <div class="btn">
          <input type="submit" value="LetsGo" />
        </div>
      </form>
    </div>
    <!-- <form>
      <label for="fname">First name:</label><br />
      <input type="text" id="fname" name="fname" /><br />
      <label for="lname">Last name:</label><br />
      <input type="text" id="lname" name="lname" />
    </form> -->

    <footer></footer>
  </body>
</html>
