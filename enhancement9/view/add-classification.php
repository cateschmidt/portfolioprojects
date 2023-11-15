<?php
if (isset($message)) { 
 echo $message; 
} 
if (isset($classificationList)) { 
 echo '<h2>Vehicles By Classification</h2>'; 
 echo '<p>Choose a classification to see those vehicles</p>'; 
 echo $classificationList; 
}
?><!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="PHP Motors Template">
  <title>CSE 340 PHP Motors Homepage Template</title>
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




    <div id="container">
      <?php
      if (isset($message)) {
        echo $message;
      }
      ?>
      <h1>Add Classification</h1>
      <p>* All Fields are Required</p>
      <form action="/phpmotors/vehicles/index.php" method="post">
        <label for='classificationName'>Classificaton Name</label><br>
        <input name="classificationName" id="classificationName" type="text" placeholder="Allowed only up to 30 characters" maxlength="30" <?php if (isset($classificationName)) {
                                                                                                                                                                echo "value='$classificationName'";
                                                                                                                                                              } ?> required><br><br>
        <input type="submit" name="submit" id="regbtn" value="Register">
        <input type="hidden" name="action" value="addclassification">
      </form>
    </div>

    <hr>
    <!-- <footer> -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    <!-- </footer> -->
  </main>
</body>

</html>