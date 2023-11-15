<?php
/*
 * Proxy connection to the phpmotors database
 */
function phpmotorsConnect(){
    $server = "localhost:3308";
    $dbname = "phpmotors";
    $username = "iClient";
    $password = "ariel2019!";
    $dsn = "mysql:host=$server;dbname=$dbname";
    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

 // Create the actual connection object and assign it to a variable
try {
$link = new PDO($dsn, $username, $password, $options);
// if(is_object($link)){
   //  echo "It Worked!";
//   }
return $link;
 } catch(PDOException $e){
    echo "It didn't work, error!" , $e -> getMessage();
   header("Location:/phpmotors/500.php");
   //exit;
 }
}
phpmotorsConnect();
