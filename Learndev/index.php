<?php
require "template/database.php";

session_start();
    if(!isset($_SESSION['user']))
        header('Location:inscription.php');

if (!isset($_GET["datedetri"])) {
  $_GET["datedetri"] = "croissant";
}

$tri = $_GET["datedetri"];

if ($tri == "decroissant") {
  $tri = "ASC";
} elseif ($tri == "croissant") {
  $tri = "DESC";
}

$requete = $database->prepare("SELECT * FROM tweets ORDER BY date $tri");

$requete->execute();

$allTweets = $requete->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LearnDev</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a0be64ca8f.js" crossorigin="anonymous"></script>
</head>
    <nav class="navbar">
        <div class="container">
            <h2 class="learn">LearnDev</h2>
        <form class="recherche" method="POST" action="template/search.php">
        <a href="#"><h2><?php echo $_SESSION['user']; ?></h2></a>
        <input type="text" name="search" placeholder="Rechercher" required/>
        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        </div>
    </nav>

<?php require "template/navigation.php"; ?>
<body>
    <div class="ecrire">
        <form class="form" method="POST" action="template/insert.php">
            <input type="text" name="tweeter" placeholder="Quoi de neuf?" required/>
            <button type="submit">Envoyer</button>
        </form>

        <form method="GET">
        <select name="datedetri">
            <option value="croissant">Plus récent</option>
            <option value="decroissant" >Plus ancien</option>
        </select>
        <button type="submit">Appliquer</button>
        </form>
    </div>
    
    <main>
    <?php foreach ($allTweets as $tweet) { ?>
        <div class="tweet">
        <p><?= $tweet["tweet"] ?></p>
        <form action="template/delete.php" method="POST">
            <input type="hidden" name="supp" value="<?= $tweet["id"] ?>">
            <br>
            <p>Fait le <?= $tweet["date"] ?> par <?= $tweet['user_id']?></p>
            <br>

            <button type="submit"><i class="fa-solid fa-trash"></i></button>
        </form>
    </div>
    <?php } ?>
    <div class="tweet-rapide">
        <div id="boite-tweet-rapide" style="display: none">
            <form class="form" method="POST" action="template/insert.php">
                <input type="text" name="tweeter" placeholder="Quoi de neuf?" required/>
                <button type="submit">Envoyer</button>
            </form>
        </div>
        <button id="bouton-tweet-rapide" onclick="tweetRapide()">
            <i class="fa-solid fa-pen-nib"></i>
        </button>
    </main>
    <script src="script.js"></script>
</body>
</html>
   