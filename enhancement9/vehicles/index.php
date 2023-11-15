<?php
//This is the vehicles controller

// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
// Get the PHP Motors model for use as needed
require_once '../model/vehicles-model.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';
// Get the uploads model
require_once '../model/uploads-model.php';
//Get the functions.php for use as needed
require_once '../library/functions.php';

//Get the array of classifications
$classifications = getClassifications();
//call the createNav function to create the navigation
$navList = createNav($classifications);

// // Build a navigation bar using the $classifications array
// $navList = '<ul>';
// $navList .= "<li><a href='/phpmotors/view/home.php' title='View the PHP Motors home page'>Home</a></li>";
// foreach ($classifications as $classification) {
//     $navList .= "<li><a href='/phpmotors/index.php?action=" . urlencode($classification['classificationName']) . "' title='View our $classification[classificationName] product line'>$classification[classificationName]</a></li>";
// }
// $navList .= '</ul>';

// //This is for drop down down 
$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}
// // Create select List
// $classificationList = '<select name="classificationId">';
// $classificationList .= '<option> Choose a Classification </option>';
// foreach ($classifications as $classification) {
//     $classificationList .= "<option value = '$classification[classificationId]'> $classification[classificationName]</option>" ;
// }
// $classificationList .= "</select>";

$action = filter_input(INPUT_GET, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_POST, 'action');
}


switch ($action) {
    // Code to deliver the views will be here

  case 'addclassification':
    // Filter and store the data
    $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    // Check for missing data
    if (empty($classificationName)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/add-classification.php';
      exit;
    }
    // Send the data to the model
    $regOutcome = classification($classificationName);
    // Check and report the result
    if ($regOutcome === 1) {
      $message = "<p>Thanks for registering $classificationName.</p>";
      header("Location:/phpmotors/vehicles/");
      exit;
    } else {
      $message = "<p>Sorry $classificationName, but the registration failed. Please try again.</p>";
      include '../view/vehicle-management.php';
      exit;
    }
    break;


  case 'classification':
    include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-classification.php';
    break;
  case 'add-vehicle':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
    // Check for missing data
    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
      $message = '<p>Please provide information for all empty form fields.</p>';
      include '../view/add-vehicle.php';
      exit;
    }
    // Send the data to the model
    $regOutcome = inventory(
      $invMake,
      $invModel,
      $invDescription,
      $invImage,
      $invThumbnail,
      $invPrice,
      $invStock,
      $invColor,
      $classificationId
    );

    // Check and report the result
    if ($regOutcome === 1) {
      $message = "<p>Thanks for adding the vehicle $invModel!</p>";
      include '../view/add-vehicle.php';
      exit;
    } else {
      $message = "<p>Sorry $invModel, but the registration failed. Please try again.</p>";
      include '../view/add-vehicle.php';
      exit;
    }
    break;
  case 'inventory':
    include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/add-vehicle.php';
    break;

    /* * ********************************** 
* Get vehicles by classificationId 
* Used for starting Update & Delete process 
* ********************************** */
  case 'getInventoryItems':
    // Get the classificationId 
    $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
    // Fetch the vehicles by classificationId from the DB 
    $inventoryArray = getInventoryByClassification($classificationId);
    // Convert the array to a JSON object and send it back 
    echo json_encode($inventoryArray);
    break;


  case 'mod':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-update.php';
    exit;
    break;


  case 'updateVehicle':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_ALLOW_FRACTION));
    $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

    // Check for missing data
    if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor) || empty($classificationId)) {
      $message = '<p>Please complete all information for the updated item! Double check the classification of the item.</p>';
      include '../view/vehicle-update.php';
      exit;
    }
    $updateResult = updateVehicle($classificationId, $invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $invId);
    if ($updateResult) {
      $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p>Error. The $invMake $invModel was not updated.</p>";
      include '../view/vehicle-update.php';
      exit;
    }

    break;

  case 'del':
    $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
    $invInfo = getInvItemInfo($invId);
    if (count($invInfo) < 1) {
      $message = 'Sorry, no vehicle information could be found.';
    }
    include '../view/vehicle-delete.php';
    exit;
    break;

  case 'deleteVehicle':
    // Filter and store the data
    $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);


    $deleteResult = deleteVehicle($invId);
    if ($deleteResult) {
      $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully deleted.</p>";
      $_SESSION['message'] = $message;
      header('location: /phpmotors/vehicles/');
      exit;
    } else {
      $message = "<p>Error. The $invMake $invModel was not updated.</p>";
      $_SESSION['message'] = $message;
      header ('location: /phpmotors/vehicles/');
      exit;
    }

    break;

  case 'vehicles-classification':
    $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $vehicles = getVehiclesByClassification($classificationName);
    if(!count($vehicles)){
      $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
    } else {
     $vehicleDisplay = buildVehiclesDisplay($vehicles);
    }
    // echo $vehicleDisplay;
    // exit;
    include '../view/classification.php';
    break;

    case 'vehicle-details':
      $invId=filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_NUMBER_INT);
      $vehicle=getInvItemInfo($invId);//in the Vehicles model
      $thumbnailImage=thumbnailImage($invId);
      // echo $vehicle;
      // exit;
      $vehicleDisplay= buildVehicleDetails($vehicle, $thumbnailImage);//in the functions.php
      include '../view/vehicle-detail.php';
      break;
    

  default:
    $classificationList = buildClassificationList($classifications);
    include $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/view/vehicle-management.php';
    break;
}
