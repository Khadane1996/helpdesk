<?php
    // @session_start();
    // require_once("functions.php");
    

    if(isset($_GET['supprimer'])){
        require_once("../classe/classeUtilisateur.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Utilisateur();
        foreach($str as $ide){
            $a= $objet->deleteUtilisateur($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();

        echo $Utilisateur->addRole($_POST['libelle']);
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();

        echo $Utilisateur->updateRole($_POST['modifier'], $_POST['libelle']);
    }else{
        echo 2;
    }
?>