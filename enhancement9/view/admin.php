<?php
if(!$_SESSION['loggedin']){
    //   href="/phpmotors/accounts/index.php";
         header('Location:/phpmotors/index.php');
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
    echo $navList;?>
    </nav>


    <h1><?php echo $_SESSION['clientData']['clientFirstname'];?> <?php echo $_SESSION['clientData']['clientLastname'];?></h1>
    <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>
    <p id='login-message'>You are logged in.</p>
          <div class='loginNames'>
            <ul>
              <li>First name: <?php echo $_SESSION['clientData']['clientFirstname'];?></li>
              <li>Last name: <?php echo $_SESSION['clientData']['clientLastname'];?></li>
              <li>Email: <?php echo $_SESSION['clientData']['clientEmail'];?></li>
            </ul>                      
          </div>
        <h2>Account Management</h2>
        <p>Use the link below to manage your account information</p>
        <p><a href="/phpmotors/accounts/index.php?action=Update">Update your Account</a></p> 


        <?php if($_SESSION['clientData']['clientLevel'] > 1):?>
          <h2>Vehicle Management</h2>
          <p>Use the link below to manage your vehicles</p>
          <p><a href="/phpmotors/vehicles/index.php">Manage your vehicles</a></p> 
        <?php endif ?>
    <hr>
    <!-- <footer> -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    <!-- </footer> -->
</main>
</body>

</html>