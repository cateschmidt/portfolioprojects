<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Motors Template">
    <title><?php echo $classificationName;?> vehicles | PHP Motors, Inc.</title> <!--link stylesheets-->
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


        <h1 class="class-view"><?php echo $classificationName;?> vehicles</h1>

        <?php if (isset($message)) {
            echo $message;
        }
        ?>
        <?php if (isset($vehicleDisplay)) {
            echo $vehicleDisplay;
        } ?>

        <hr>
        <!-- <footer> -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        <!-- </footer> -->
    </main>
</body>

</html>