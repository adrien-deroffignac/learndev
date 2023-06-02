<?php require "database.php";

  if(isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['mail']) && isset($_POST['mdp']))
  { 
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];
    $mdp = $_POST['mdp'];
    
    $check = $database->prepare('SELECT nom, pseudo, mail, mdp FROM inscription WHERE mail = ?');
        $check->execute(['$mail']);
        $data = $check->fetch();
        $row = $check->rowCount();


    if ($row == 0)
    {
      if(strlen($nom) <= 100)
      {
        if(strlen($pseudo) <= 100)
        {
          if(filter_var($mail, FILTER_VALIDATE_EMAIL))
          {
            $insert2 = $database->prepare('INSERT INTO inscription(nom, pseudo, mail, mdp) VALUES (:nom, :pseudo, :mail, :mdp)');
            $insert2->execute([
              'nom' => $nom,
              'pseudo' => $pseudo,
              'mail' => $mail,
              'mdp' => $mdp,
            ]);
            header('Location:../inscription.php?reg_err=success');
          }else header('Location:../inscription.php?reg_err=mail');
        }else header('Location:../inscription.php?reg_err=longueur_pseudo');
      }else header('Location:../inscription.php?reg_err=longueur_nom');
    }else header('Location:../inscription.php?reg_err=already');
  }
