<?php
if ($_SESSION['clientData']['clientLevel'] < 2) {
    header('location: /phpmotors/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Motors Add Vehicle">
    <title>PHP Motors<?php if (isset($invInfo['invMake'])) {
                            echo "Delete $invInfo[invMake] $invInfo[invModel]";
                        } ?></title>
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
            <h1><?php if (isset($invInfo['invMake'])) {
                    echo "Delete $invInfo[invMake] $invInfo[invModel]";
                } ?></h1>

            <p>*All Fields are Required</p>
            <p>Confirm Vehicle Deletion. The delete is permanent.</p>

            <form action="/phpmotors/vehicles/index.php" method="post">
                <label>Classification</label><br>
                <br><br>
                <label for='invMake'>Make</label><br>
                <input type="text" readonly name="invMake" id="invMake" <?php
                                                                        if (isset($invInfo['invModel'])) {
                                                                            echo "value='$invInfo[invModel]'";
                                                                        } ?>required><br><br>
                <label for='invModel'>Model</label><br>
                <input type="text" readonly name="invModel" id="invModel" <?php
                                                                            if (isset($invInfo['invDescription'])) {
                                                                                echo $invInfo['invDescription'];
                                                                            }
                                                                            ?>required><br><br>
                <label for='invDescription'>Description </label><br>
                <textarea read only name="invDescription" id="invDescription" rows="3" cols="25" maxlength="30" placeholder="Please enter description here." required><?php if (isset($invInfo['invDescription'])) {
                                                                                                                                                                            echo "Delete $invInfo[invDescription] $invInfo[invModel]";
                                                                                                                                                                        } ?></textarea><br><br>

                <input type="submit" name="submit" id="regbtn" value="Delete Vehicle">
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="
<?php if (isset($invInfo['invId'])) {
    echo $invInfo['invId'];
} elseif (isset($invId)) {
    echo $invId;
} ?>
">

            </form><br>
        </div>

        <hr>
        <!-- <footer> -->
        <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php'; ?>
        <!-- </footer> -->
    </main>
</body>

</html>