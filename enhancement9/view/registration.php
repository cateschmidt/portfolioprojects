<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="PHP Motors Registration Page">
  <title>CSE 340 PHP Motors Homepage Registration Page</title>
  <!--link stylesheets-->
  <link rel="stylesheet" href="/phpmotors/css/small.css">
  <link rel="stylesheet" href="/phpmotors/css/large.css">

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

    
    <div id="container">
    <h1 id="reg-title">Sign Up</h1>

      <?php
      // Prepare for errors
      if (isset($message)) {
        echo $message;
      }
      ?>
      <form method="post" action="/phpmotors/accounts/index.php">



        <form method="post" action="/phpmotors/accounts/index.php">

          <label for='clientFirstname'>First Name</label><br>
          <input name="clientFirstname" id="fname" type="text" required><br><br>
          <label for='clientLastname'>Last Name</label><br>
          <input name="clientLastname" id="lname" type="text" required><br><br>
          <label for='clientEmail'>Email</label><br>
          <input name="clientEmail" id="email" type="email" required><br><br>
          <label for='clientPassword'>Password</label><br>
          <span>** Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
          <input name="clientPassword" type="password" id='password' placeholder="Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
          <button type="submit">Register Now</button>
          <!-- Add the action name - value pair -->
          <input type="hidden" name="action" value="register">
          <br><br>

        </form>
    </div>

    <hr>
    <!-- <footer> -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    <!-- </footer> -->
  </main>
</body>

</html>