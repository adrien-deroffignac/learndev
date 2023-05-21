<?php
require "template/database.php";

$requete2 = $database->prepare("SELECT * FROM inscription ");

$requete2->execute();

$AllInscriptions = $requete2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learndev</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/a0be64ca8f.js" crossorigin="anonymous"></script>

</head>
<?php require "template/navigation.php"; ?>
<body>
    <nav class="navbar">
        <div class="container">
            <h2 class="learn">LearnDev</h2>
            <a href="/inscription.php"><h2>S'inscrire</h2></a>
        </div>
    </nav>
    <main>
    <?php   
        if(isset($_GET['login_err']))
        {
            $err = $_GET['login_err'];

            switch($err)
            {
                case 'mdp':
                ?> 
                    <div class="err-message">Erreur mot de passe incorrect</div>
                    <?php
                    break;
                
                case 'mail':
                ?> 
                    <div class="err-message">Erreur mail incorrect</div>
                    <?php
                    break;
                
                case 'already':
                ?> 
                    <div class="err-message">Erreur</div>
                    <?php
                    break;
            }
        }
        ?>
        <div class="connexion">
        <h1>Connexion</h1>
            <br>
            <form class="form" method="POST" action="template/connect.php">
                <br>
                <p>Email</p>
                <input type="email" name="mail" placeholder="Email@gmail.com" required/>
                <br><br>
                <div class="mdp"><p>Mot de passe</p>
                <a href="#">Mot de passe oublié?</a>
                </div>
                <input type="password" name="mdp" placeholder="Mot de passe" required/>
                <br>
                <button type="submit">Se connecter</button>
            </form>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>