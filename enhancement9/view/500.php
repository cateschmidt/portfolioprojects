<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Motors Error Page">
    <title>CSE 340 PHP Motors Error Page</title>
    <!--link stylesheets-->
    <link rel="stylesheet" href="css/small.css">
    <link rel="stylesheet" href="css/large.css">
</head>

<body>
    <main>
        <!-- <header> -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'; ?>
        <!-- </header> -->
        <!-- <nav id="page_nav"> -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'; ?>
        <!-- </nav> -->


        <h1>Server Error</h1>
        <p>Sorry our server seems to be experiencing some technical difficulties</p>
        <hr>
        <!-- <footer> -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        <!-- </footer> -->
    </main>
</body>

</html>