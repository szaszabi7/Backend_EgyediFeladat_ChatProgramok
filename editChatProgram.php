<?php 

    require_once 'db.php';
    require_once 'ChatProgram.php';


    $chatId = $_GET['id'] ?? null;
    $chatName = $_POST['name'] ?? "";
    $chatLaunchDate = $_POST['launchDate'] ?? "";
    $chatNumberOfUsers = $_POST['numberOfUsers'] ?? 0;
    $chatAvailableForAndroid = $_POST['availableForAndroid'] ?? "";
    $chatRatingOnGooglePlay = $_POST['ratingOnGooglePlay'] ?? 0;
    $chatAvailableForiOS = $_POST['availableForiOS'] ?? "";
    $chatRatingOnAppStore = $_POST['ratingOnAppStore'] ?? 0;

    if ($chatId === null) {
        header('Location: index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
        ChatProgram::chatUpadte($chatName, $chatLaunchDate, $chatNumberOfUsers, $chatAvailableForAndroid,
        $chatRatingOnGooglePlay, $chatAvailableForiOS, $chatRatingOnAppStore, $chatId);
        header('Location: index.php');
    }

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Edit Chat Program</title>
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
            <input type="submit" value="Szerkeszt" id="editGomb">
        </form>
    </div>
</body>
</html>