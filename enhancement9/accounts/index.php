<?php


// This is the accounts controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
//Get the accounts model
require_once '../model/accounts-model.php';
//Get the funtions.php
require_once '../library/functions.php';
// Get the admin.php page
require_once '../library/functions.php';

// Get the array of classifications from DB using model
$classifications = getClassifications();

$navList = createNav($classifications);

// // Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/view/home.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
}

switch ($action) {
    case 'login-view':
        include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/login.php';
        break;

    case 'login':
        $clientEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $clientEmail = checkEmail($clientEmail);
        $clientPassword = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $passwordCheck = checkPassword($clientPassword);

        // Run basic checks, return if errors
        if (empty($clientEmail) || empty($passwordCheck)) {
            $message = '<p class="notice">Please provide a valid email address and password.</p>';
            include '../view/login.php';
            exit;
        }
        // echo 'inside login';
        // exit;

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $message = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }
        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        // Send them to the admin view
        header('Location: /phpmotors/accounts');
        exit;
        break;

    case 'register-view':
        include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/registration.php';
        break;

    case 'register':
        // echo 'You are in the register case statement.';
        // break;
        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

        // Checking for existing email address
        $existingEmail = checkExistingEmail($clientEmail);

        // Check for existing email address in the table
        if ($existingEmail) {
            $message = '<p class="notice">That email address already exists. Do you 
                        want to login instead?</p>';
            include '../view/login.php';
            exit;
        }



        // Check for missing data
        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }

        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            // $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            $_SESSION['message'] = "Thanks for registering $clientFirstname. Please use your email and password to login.";
            // include '../view/login.php';
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }

    case 'Logout':
        // We need to empty the session array
        $_SESSION = array();
        // Destroy the session
        session_destroy();
        // Go back to the main page
        header('Location:/phpmotors/index.php');
        break;

    case 'Update':
        
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_VALIDATE_INT));
        $clientEmail = checkEmail($clientEmail);
        // Check for email
        if ($clientEmail != $_SESSION['clientData']['clientEmail']){
            $existingEmail = checkExistingEmail($clientEmail);
            if ($existingEmail){
                $message = '<p class="notice">The email already exists.</p>';
                include '../view/client-update.php';
                exit;
        }
     }

        if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)){
            $messageUpdated = "<p>Please provide the information for all empty form fields</p>";
            include '../view/client-update.php';
            exit;
        }
       
        $updateResult = updateAccount( $clientFirstname, $clientLastname, $clientEmail, $clientId);
       
        if ($updateResult) {
          $message = "<p>Congratulations, the new information was successfully updated.</p>";
          // include '../view/vehicle-update.php';
          $_SESSION['message'] = $message;
    
        } else {
          $message = "<p>Error. The new information could not be updated at this time. Please try again later</p>";
          include '../view/client-update.php';
          exit;
        }
        $clientData = getClientbyid($clientId);
        $_SESSION['clientData'] = $clientData;
        header('location: /phpmotors/accounts/index.php');
          exit;
          break;


    case 'updatepassword':
       
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword',FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $clientId = trim(filter_input(INPUT_POST, 'clientId',FILTER_SANITIZE_NUMBER_INT));
        // Check for missing data
            $checkPassword = checkPassword($clientPassword);
            if(empty($checkPassword)){
              $message = '<p>Please provide information for all empty form fields.</p>';
              include '../view/client-update.php';
              exit;
            }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);      
        // Send the data to the model
        $updateOutcome = updatePassword($hashedPassword, $clientId);      
        // Check and report the result
        if($updateOutcome === 1){
          $_SESSION['message'] = "<p>Thanks for updating your password $clientFirstname. Please use your email and password to login.</p>";
          header ('location:/phpmotors/accounts/');
          exit;
        } else {
          $_SESSION['message'] = "<p>Sorry $clientFirstname, but the password update failed. Please try again.</p>";
          header ('location:/phpmotors/accounts/');
          exit;
        }
        break;
        


    default:
        include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/admin.php';
}
