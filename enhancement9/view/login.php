<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="PHP Motors Login Page">
  <title>CSE 340 PHP Motors Login Page</title>
  <!--link stylesheets-->
  <link rel="stylesheet" type="text/css" href="/phpmotors/css/small.css">
  <link rel="stylesheet" type="text/css" href="/phpmotors/css/large.css">

</head>

<body>
  <main>
    <!-- <header> -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
    <!-- </header> -->
    <nav id="page_nav">
      <?php //require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; 
      echo $navList; ?>
    </nav>


    <h1>Sign In</h1>
    <div id="container">

      <?php
      // Prepare for errors
      // if (isset($message)) {
      //   echo $message;
      // }
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
       }
      ?>
      <form action="/phpmotors/accounts/index.php" method="post">
        <br>
        <label for='email'>Email</label><br>
        <input name="email" id="email" type="email" required><br><br>
        <label for='password'>Password</label><br>
        <span>** Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
        <input name="password" id='password' type="password" placeholder="Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
        <button type="submit">Sign in</button><br>
        <input type="hidden" name="action" value="login">

        <a id="c-register" href="/phpmotors/accounts/index.php?action=register-view">Not a member yet? Sign Up!</a><br>
      </form><br>
    </div>

    <br>
    <br>
    <hr>
    <!-- <footer> -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    <!-- </footer> -->
  </main>
</body>

</html>