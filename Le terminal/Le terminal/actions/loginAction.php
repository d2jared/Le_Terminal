<?php

require('actions/database.php');

//validation du formulaire
if(isset($_POST['validate'])){

    //vérifier si l'utilisateur a bien complété tout les champs 
    if(!empty($_POST['pseudo']) AND !empty($_POST['password'])){

        //données de l'utilisateur existe déja sur le site
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_password = htmlspecialchars($_POST['password']);

        //vérifie si l'utilisateur existe (si le pseudo est correct)
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0) {

            //récuperer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            //verfier si le mot de passe est correct
            if(password_verify($user_password, $usersInfos['mdp'])) {

                //authentifier l'utilisateur sur le site et récuperer ses données dans les variables globales sessions
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //rediriger l'utilisateur vers la page d'acceuil
                header('Location: index.php');

            }else {
                $errorMsg = "Votre mot de passe est incorrect";
            }

        }else {
            $errorMsg = "Votre pseudo est incorrect";
        }

    }else{
        $errorMsg = "Veuillez compléter tous les champs...";
    }
}