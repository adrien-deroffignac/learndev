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
            <a href="/connexion.php"><h2>Se connecter</h2></a>
        </div>
    </nav>
    <main>
    <?php   
        if(isset($_GET['reg_err']))
        {
            $err = $_GET['reg_err'];

            switch($err)
            {
                case 'success':
                ?> 
                    <div class="success">Inscription réussie !</div>
                    <?php
                    break;
                
                case 'mail':
                ?> 
                    <div class="err-message">Mail non valide</div>
                    <?php
                    break;
                
                case 'longueur_pseudo':
                ?> 
                    <div class="err-message">Pseudo trop long</div>
                    <?php
                    break;

                case 'longueur_nom':
                ?> 
                    <div class="err-message">Nom trop long désolé 😭</div>
                    <?php
                    break;

                case 'already':
                ?> 
                    <div class="err-message">Compte déjà existant</div>
                    <?php
                    break;
            }
        }
        ?>
        <div class="inscrire">
        <h1>Inscription</h1>
            <br>
            <form class="form" method="POST" action="template/insert2.php">
                <br>
                <input type="text" name="nom" placeholder="Nom" required/>
                <br><br>
                <input type="text" name="pseudo" placeholder="Pseudo" required/>
                <br><br>
                <input type="email" name="mail" placeholder="Email@gmail.com" required/>
                <br><br>
                <input type="password" name="mdp" placeholder="Mot de passe" required/>
                <br><br>
                <button type="submit">S'inscrire</button>
            </form>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>