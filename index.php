<?php 

require_once 'db.php';
require_once 'ChatProgram.php';

$chatAdatok = ChatProgram::osszes();

if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    $deleteId = $_POST['deleteId'] ?? '';

  if ($deleteId !== '') {
    ChatProgram::chatDelete($deleteId);
    header('Location: index.php');
  }
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
    <title>Chat Programok</title>
</head>
<body>
    <h1>Chatprogramok</h1>
    <div class="container">
        <?php 
            foreach ($chatAdatok as $chat) {
            echo "<div class='adatok'>";
                echo "<div class='content'>";
                    echo "<h3>" . $chat -> getName() . "</h3>";
                    echo "<table>";
                        echo "<p>Launch Date: <span class='adat'>" . $chat -> getLaunchDate() ->format('Y-m-d') . "</span></p>";
                        echo "<p>Number Of Users in 2021: <span class='adat'>" . $chat -> getNumberOfUsers() . "</span></p>";
                        echo "<p>Available For Android: <span class='adat'>" . $chat -> getAvailableForAndroid() . "</span></p>";
                        echo "<p>Rating On Google Play: <span class='adat'>" . $chat -> getRatingOnGooglePlay() . "</span></p>";
                        echo "<p>Available For iOS: <span class='adat'>" . $chat -> getAvailableForiOS() . "</span></p>";
                        echo "<p>Rating On App Store: <span class='adat'>" . $chat -> getRatingOnAppStore() . "</span></p>";
                        echo "<div>";
                            echo "<div style='display: inline-block'>";
                                echo "<button><a href='editChatProgram.php?id=" . $chat -> getId() . "&name=" . $chat -> getName() . "'>Edit</a></button>";
                                //echo "<a href='editChatProgram.php?id=" . $chat -> getId() . "'>Szerkesztés</a>";
                            echo "</div>";
                            echo "<div style='display: inline-block; margin-left: 0.2em'>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='deleteId' value='" . $chat -> getId() . "'>";
                                echo "<button type='submit'>Delete</button>";
                            echo "</div>";
                        echo "</div>";
                        echo "</form>";
                    echo "</table>";
                echo "</div>";
            echo "</div>";
            }
        ?>
    </div>
    <div class="container" id="chatLink">
        <button>
            <a href="addChatProgram.php">Add New Chat Programs</a>
        </button>
    </div>
</body>
</html>