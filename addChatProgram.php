<?php 

require_once 'db.php';
require_once 'ChatProgram.php';

$chatAdatok = ChatProgram::osszes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    
    $chatName = $_POST['name'] ?? "";
    $chatLaunchDate = new DateTime($_POST['launchDate']);
    $chatNumberOfUsers = $_POST['numberOfUsers'] ?? 0;
    $chatAvailableForAndroid = $_POST['availableForAndroid'] ?? "";
    $chatRatingOnGooglePlay = $_POST['ratingOnGooglePlay'] ?? 0;
    $chatAvailableForiOS = $_POST['availableForiOS'] ?? "";
    $chatRatingOnAppStore = $_POST['ratingOnAppStore'] ?? 0;

    $saveWeather = new ChatProgram($chatName, $chatLaunchDate, $chatNumberOfUsers, $chatAvailableForAndroid,
    $chatRatingOnGooglePlay, $chatAvailableForiOS, $chatRatingOnAppStore);
    $saveWeather -> chatAdd();
    header('Location: index.php');
}

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
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="post">
                <div>
                    Name: <input type="text" name="name" placeholder="Name">
                </div> 
                <div>
                    Launch Date: <input type="date" name="launchDate">
                </div>
                <div>
                    Number Of Users: <input type="number" name="numberOfUsers" placeholder="100000000">
                </div>
                <div>
                    Available For Android:  <select name="availableForAndroid">
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                </div>
                <div>
                    Rating On Google Play: <input type="number" step="0.1" name="ratingOnGooglePlay" placeholder="1,0">
                </div>
                <div>
                    Available For iOS:  <select name="availableForiOS">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                </div>
                <div>
                    Rating On App Store: <input type="number" step="0.1" name="ratingOnAppStore" placeholder="1,0">
                </div>
                <input type="submit" value="Add To Database" id="addGomb">
        </form>
    </div>
</body>
</html>