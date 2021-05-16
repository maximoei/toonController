<?php

session_start();

$PASSWORD_VERSION = 1; // Change this when changing password (also in php/api.php)

function isRemembered() {
    if (isset($_COOKIE['toon_remember'])) {
        $rememberedData = unserialize(file_get_contents('data/remember.dat'));
        if (!is_array($rememberedData)) {
            $rememberedData = array();
        }
        $rememberId = $_COOKIE['toon_remember'];
        if (isset($rememberedData[$rememberId]) && $rememberedData[$rememberId] > $PASSWORD_VERSION) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }   
}

function isLoggedin() {
    return (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) || isRemembered();
}
?>
<!DOCTYPE HTML>
<html>
    <head>  
        <title>Toon Controller</title>

        <link type="text/css" rel="stylesheet" href="css/normalize.css"> 
<link rel="apple-touch-icon" href="img/app-icon.png">
<link rel="apple-touch-startup-image" href="img/app-splash.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="white">
  <meta name="apple-mobile-web-app-title" content="Toon Controller">

        <script type="text/javascript" src="js/jquery.js"></script>
        <?php

//        if (isLoggedin()) {
            echo '<link type="text/css" rel="stylesheet" href="css/app.css"><script type="text/javascript" src="js/app.js"></script>';
  //      } else {
    //        echo '<link type="text/css" rel="stylesheet" href="css/login.css"><script type="text/javascript" src="js/login.js"></script>';
      //  }

        ?>
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
    </head>

    <body>
        <?php
    //    if (isLoggedin()) {
            // Include app
            include('pages/app.html');
  //      } else {
            // Include login
//            include('pages/login.html');
//        }
        ?>  
        
    </body>


</html>
