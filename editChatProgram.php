<?php 

    require_once 'db.php';
    require_once 'ChatProgram.php';

    $chatNameHiba = false;
    $chatNameHibaUzenet = '';
    $chatNumberOfUsersHiba = false;
    $chatNumberOfUsersHibaUzenet = '';
    $chatRatingOnGooglePlayHiba = false;
    $chatRatingOnGooglePlayHibaUzenet = '';
    $chatRatingOnAppStoreHiba = false;
    $chatRatingOnAppStoreHibaUzenet = '';
    
    $chatId = $_GET['id'] ?? null;
    $chatName = $_GET['name'];
    $chatLaunchDate = $_POST['launchDate'] ?? "";
    //$chatNumberOfUsers = $_POST['numberOfUsers'] ?? 0;
    $chatAvailableForAndroid = $_POST['availableForAndroid'] ?? "";
    //$chatRatingOnGooglePlay = $_POST['ratingOnGooglePlay'] ?? 0;
    $chatAvailableForiOS = $_POST['availableForiOS'] ?? "";
    //$chatRatingOnAppStore = $_POST['ratingOnAppStore'] ?? 0;

    if ($chatId === null) {
        header('Location: index.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST['name'])) {
            $chatNameHiba = true;
            $chatNameHibaUzenet = "Nem adtál meg nevet";
        } else {
            $chatName = htmlspecialchars($_POST['name'], ENT_QUOTES);
        }

        if (empty($_POST['numberOfUsers'])) {
            $chatNumberOfUsersHiba = true;
            $chatNumberOfUsersHibaUzenet = "Nem adtál meg adatot";
        } elseif ($_POST['numberOfUsers'] < 0) {
            $userHiba = true;
            $userHibaUzenet = "A felhasználók száma nem lehet kisebb 0-nál";
        } else {
            $chatNumberOfUsers = htmlspecialchars($_POST['numberOfUsers'], ENT_QUOTES);
        }

        if (empty($_POST['ratingOnGooglePlay'])) {
            $chatRatingOnGooglePlayHiba = true;
            $chatRatingOnGooglePlayHibaUzenet = "Nem adtál meg adatot";
        } elseif ($_POST['ratingOnGooglePlay'] < 0) {
            $chatRatingOnGooglePlayHiba = true;
            $chatRatingOnGooglePlayHibaUzenet = "Az értékelés nem lehet kisebb 0-nál";
        } else {
            $chatRatingOnGooglePlay = htmlspecialchars($_POST['ratingOnGooglePlay'], ENT_QUOTES);
        }

        if (empty($_POST['ratingOnAppStore'])) {
            $chatRatingOnAppStoreHiba = true;
            $chatRatingOnAppStoreHibaUzenet = "Nem adtál meg adatot";
        } elseif ($_POST['ratingOnAppStore'] < 0) {
            $chatRatingOnAppStoreHiba = true;
            $chatRatingOnAppStoreHibaUzenet = "Az értékelés nem lehet kisebb 0-nál";
        } else {
            $chatRatingOnAppStore = htmlspecialchars($_POST['ratingOnAppStore'], ENT_QUOTES);
        }

        if (!$chatNameHiba && !$chatNumberOfUsersHiba && !$chatRatingOnGooglePlayHiba && !$chatRatingOnAppStoreHiba) {
            ChatProgram::chatUpadte($chatName, $chatLaunchDate, $chatNumberOfUsers, $chatAvailableForAndroid,
            $chatRatingOnGooglePlay, $chatAvailableForiOS, $chatRatingOnAppStore, $chatId);
            header('Location: index.php');
        }
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
    <script src="main.js"></script>
    <title>Edit Chat Program</title>
</head>
<body>
    <div class="container">
        <h1>Edit <?php echo $chatName?></h1>
        <form method="post">
            <div>
                Name: <input type="text" name="name" placeholder="Name" id="chatname">
                <div class='errormessage'><?php echo $chatNameHibaUzenet; ?></div>
            </div>
            <div>
                Launch Date: <input type="date" name="launchDate">
            </div>
            <div>
                Number Of Users: <input type="number" name="numberOfUsers" placeholder="100000000" id="numberofusers">
                <div class='errormessage'><?php echo $chatNumberOfUsersHibaUzenet; ?></div>
            </div>
            <div>
                Available For Android:  <select name="availableForAndroid">
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
            </div>
            <div>
                Rating On Google Play: <input type="number" step="0.1" name="ratingOnGooglePlay" placeholder="1,0" id="ratingandroid" max="5">
                <div class='errormessage'><?php echo $chatRatingOnGooglePlayHibaUzenet; ?></div>
            </div>
            <div>
                Available For iOS:  <select name="availableForiOS">
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
            </div>
            <div>
                Rating On App Store: <input type="number" step="0.1" name="ratingOnAppStore" placeholder="1,0" id="ratingapple" max="5">
                <div class='errormessage'><?php echo $chatRatingOnAppStoreHibaUzenet; ?></div>
            </div>
            <input type="submit" value="Edit" id="editGomb">
        </form>
    </div>
</body>
</html>