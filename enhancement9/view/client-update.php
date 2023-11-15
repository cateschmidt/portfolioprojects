<?php
if (!$_SESSION['loggedin']) {
    //   href="/phpmotors/accounts/index.php";
    header('Location:/phpmotors/index.php');
}
?>
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
            echo $navList; ?>
        </nav>


        <div id="container">
            <h1 id="update-title">Update your Account</h1>

            <p>*By submitting this form, you will be changing your current account information</p>


            <?php
            // Prepare for errors
            if (isset($message)) {
                echo $message;
            }
            ?>
            


                <form method="post" action="/phpmotors/accounts/index.php">

                    <label for='fname'>First Name</label><br>
                    <input name='clientFirstname' id="fname" type="text" <?php if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                echo "value='" . $_SESSION['clientData']['clientFirstname'] . "'";
                                                                            } ?> required><br><br>
                    <label for='lname'>Last Name</label><br>
                    <input name="clientLastname" id="lname" type="text" <?php if (isset($_SESSION['clientData']['clientLastname'])) {
                                                                            echo "value='" . $_SESSION['clientData']['clientLastname'] . "'";
                                                                        } ?> required><br><br>
                    <label for='email'>Email</label><br>
                    <input name="clientEmail" id="email" type="email" <?php if (isset($_SESSION['clientData']['clientEmail'])) {
                                                                            echo "value='" . $_SESSION['clientData']['clientEmail'] . "'";
                                                                        } ?> required><br><br>
                    <button type="submit">Update Account Info</button>
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="Update">
                    <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                    echo $_SESSION['clientData']['clientId'];
                                                                }?>">
                    <br><br>

                    <?php
                    // Prepare for errors
                    if (isset($message)) {
                        echo $message;
                    }
                    ?>


                </form>
                </div>

                <div id="container2">

                <h1 id="update-password">Update your Password</h1>

                <p>*By submitting this form, you will be changing your current password</p>

                <form method="post" action="/phpmotors/accounts/index.php">

                    <label for='password'>Password</label><br>
                    <span class="pass-description">** Password must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>
                    <input name="clientPassword" type="password" id='password' placeholder="Password" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"><br><br>
                    <button type="submit">Update Password</button>
                    <!-- Add the action name - value pair -->
                    <input type="hidden" name="action" value="updatepassword">
                    <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                    echo $_SESSION['clientData']['clientId'];
                                                                }?>">


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