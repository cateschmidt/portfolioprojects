<?php
// Create select List
$classificationList = '<select name="classificationId">';
$classificationList .= '<option> Choose a Classification </option>';
foreach ($classifications as $classification) {
    $classificationList .= "<option value = '$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classification['classificationId'] === $classificationId) {
            $classificationList .= ' selected ';
        }
    } elseif (isset($invInfo['classificationId'])) {
        if ($classification['classificationId'] === $invInfo['classificationId']) {
            $classificationList .= ' selected ';
        }
    }
    $classificationList .= ">$classification[classificationName]</option>";
}

$classificationList .= "</select>";
?>

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PHP Motors Add Vehicle">
    <title>PHP Motors<?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                            echo "Modify $invInfo[invMake] $invInfo[invModel]";
                        } elseif (isset($invMake) && isset($invModel)) {
                            echo "Modify $invMake $invModel";
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
            <h1><?php if (isset($invInfo['invMake']) && isset($invInfo['invModel'])) {
                    echo "Modify $invInfo[invMake] $invInfo[invModel]";
                } elseif (isset($invMake) && isset($invModel)) {
                    echo "Modify $invMake $invModel";
                } ?></h1>
            <p>*All Fields are Required</p>

            <form action="/phpmotors/vehicles/index.php" method="post">
                <label>Classification</label><br>
                <?php
                echo $classificationList;
                ?><br><br>
                <label for='invMake'>Make</label><br>
                <input type="text" name="invMake" id="invMake" <?php if (isset($invMake)) {
                                                                    echo "value='$invMake'";
                                                                } elseif (isset($invInfo['invMake'])) {
                                                                    echo "value='$invInfo[invMake]'";
                                                                } ?>required><br><br>
                <label for='invModel'>Model</label><br>
                <input type="text" name="invModel" id="invModel" <?php if (isset($invModel)) {
                                                                        echo "value='$invModel'";
                                                                    } elseif (isset($invInfo['invModel'])) {
                                                                        echo "value='$invInfo[invModel]'";
                                                                    } ?>required><br><br>
                <label for='invDescription'>Description </label><br>
                <textarea name="invDescription" id="invDescription" rows="3" cols="25" maxlength="30" placeholder="Please enter description here." required><?php if (isset($invDescription)) {
                                                                                                                                                                echo "$invDescription";
                                                                                                                                                            } elseif (isset($invInfo['invDescription'])) {
                                                                                                                                                                echo "$invInfo[invDescription]";
                                                                                                                                                            } ?></textarea><br><br>
                <label for='invImage'>Image Path</label><br>
                <input type="text" name="invImage" value="/phpmotors/images/no-image.png" id="invImage" <?php if (isset($invImage)) {
                                                                                                            echo "value='$invImage'";
                                                                                                        } elseif (isset($invInfo['invImage'])) {
                                                                                                            echo "value='$invInfo[invImage]'";
                                                                                                        } ?>required><br><br>
                <label for='invThumbnail'>Thumbnail Path</label><br>
                <input type="text" name="invThumbnail" value="/phpmotors/images/no-image.png" id="invThumbnail" <?php if (isset($invThumbnail)) {
                                                                                                                    echo "value='$invThumbnail'";
                                                                                                                } elseif (isset($invInfo['invThumbnail'])) {
                                                                                                                    echo "value='$invInfo[invThumbnail]'";
                                                                                                                } ?>required><br><br>
                <label for='invPrice'>Price</label><br>
                <input type="text" name="invPrice" id="invPrice" pattern="\d+(\.\d{2})?" <?php if (isset($invPrice)) {
                                                                                                echo "value='$invPrice'";
                                                                                            } elseif (isset($invInfo['invPrice'])) {
                                                                                                echo "value='$invInfo[invPrice]'";
                                                                                            } ?> required><br><br>
                <label for='invStock'># In Stock</label><br>
                <input type="text" name="invStock" id="invStock" <?php if (isset($invStock)) {
                                                                        echo "value='$invStock'";
                                                                    } elseif (isset($invInfo['invStock'])) {
                                                                        echo "value='$invInfo[invStock]'";
                                                                    } ?> required><br><br>
                <label for='invColor'># Color</label><br>
                <input type="text" name="invColor" id="invColor" <?php if (isset($invColor)) {
                                                                        echo "value='$invColor'";
                                                                    } elseif (isset($invInfo['invColor'])) {
                                                                        echo "value='$invInfo[invColor]'";
                                                                    } ?>required><br><br>

                <input type="submit" name="submit" id="regbtn" value="Update Vehicle">
                <input type="hidden" name="action" value="updateVehicle">
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