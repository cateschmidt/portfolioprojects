<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}

if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Motors Vehicle Management">
    <title>CSE 340 PHP Motors Vehicle Management</title>
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

        <br>
        <h1>Vehicle Management</h1>
        <br>
        <div id="container">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form id="class-names" action="login.php" method="post">
                <a id="first_link" href="/phpmotors/vehicles/index.php?action=classification">Add Classification</a><br><br>
                <a id="second_link" href="/phpmotors/vehicles/index.php?action=inventory">Add Vehicle</a><br>
            </form><br>
        </div>



        <?php
        if (isset($message)) {
            echo $message;
        }
        if (isset($classificationList)) {
            echo '<h2>Vehicles By Classification</h2>';
            echo '<p>Choose a classification to see those vehicles</p>';
            echo $classificationList;
        }
        ?>
        <noscript>
            <p><strong>JavaScript Must Be Enabled to Use this Page.</strong></p>
        </noscript>
        <table id="inventoryDisplay"></table>


        <hr>
        <!-- <footer> -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        <!-- </footer> -->
    </main>
    <script src="../javascript/inventory.js"></script>

</body>

</html>
<?php unset($_SESSION['message']); ?>
