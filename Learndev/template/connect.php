<?php  
    session_start();
    require "database.php";

    if(isset($_POST['mail']) && isset ($_POST['mdp']))
    {
        $mail = $_POST['mail'];
        $mdp = $_POST['mdp'];

        $check = $database->prepare('SELECT pseudo, mail, mdp FROM inscription WHERE mail = :mail');
        $check->execute(
            array(':mail' => $mail),
        );
        $data = $check->fetch();
        $row = $check->rowCount();
        
        if($row == 1)
        {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                if($data['mdp'] === $mdp)
                {
                    $_SESSION['user'] = $data['pseudo'];
                    header('Location:../index.php');

                }else header('Location:../connexion.php?login_err=mdp');
            }else header('Location:../connexion.php?login_err=mail');
        }else header('Location:../connexion.php?login_err=already');
    }else header('Location:../inscription.php');