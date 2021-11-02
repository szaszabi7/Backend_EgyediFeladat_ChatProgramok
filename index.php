<?php 

require_once 'db.php';
require_once 'ChatProgram.php';

$chatAdatok = ChatProgram::osszes();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script src="main.js"></script>
    <title>Chat Programok</title>
</head>
<body>
    <div class="container">
        <?php 
            foreach ($chatAdatok as $chat) {
            echo "<div class='adatok'>";
            echo "<div class='content'>";
            echo "<h3>" . $chat -> getName() . "</h3>";
            echo "<p>Launch Date: " . $chat -> getLaunchDate() . "</p>";
            echo "<p>Number Of Users in 2021: " . $chat -> getNumberOfUsers() . "</p>";
            echo "<p>Available For Android: " . $chat -> getAvailableForAndroid() . "</p>";
            echo "<p>Rating On Google Play: " . $chat -> getRatingOnGooglePlay() . "</p>";
            echo "<p>Available For iOS: " . $chat -> getAvailableForiOS() . "</p>";
            echo "<p>Rating On App Store: " . $chat -> getRatingOnAppStore() . "</p>";
            echo "<a href='editChatProgram.php?id=" . $chat -> getId() . "'>Szerkesztés</a>";
            echo "</div>";
            echo "</div>";
            }
        ?>
    </div>
</body>
</html>