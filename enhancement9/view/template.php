<!DOCTYPE html>
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


    <h1>Content Title Here</h1>

    <hr>
    <!-- <footer> -->
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
    <!-- </footer> -->
</main>
</body>

</html>