<?php
    @session_start();
    // require_once("functions.php");

    // function matricule($table, $champs){
    //     require_once('../classes/classeConnexion.php');
    //     $requete = Connection::Connexion()->query("SELECT $champs FROM $table ORDER BY $champs DESC LIMIT 0,1;");
    //     $result = "0";
    //     foreach ($requete as $donne) 
    //         $result = $donne[0];
    //     if($result == "0")
    //         return ("0");
    //     else
    //         return($result);
    // }

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
    }else if(isset($_POST['ajouter'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
            
        echo $Utilisateur->addUtilisateur($_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['idRole'], $_POST['login'], $_POST['motDePasse']);
        
    }else if(isset($_POST['modifier'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
        // if ($Utilisateur->emailExist2($_POST['email'], $_POST['modifier']) == false && $Utilisateur->loginExist2($_POST['login'], $_POST['modifier']) == false) {
            
            $Utilisateur = new Utilisateur($_POST['modifier'], $_POST['prenom'], $_POST['nom'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['idRole'], $_POST['login'], $_POST['motDePasse']);
            $res = $Utilisateur->updateUtilisateur();
            if($res == 1){
                echo 10;
            }else{
                echo $res;
            }
        // }
        // else if ($Utilisateur->loginExist2(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['modifier'])) == true) {
        //      echo 2;
        // }
        // else if ($Utilisateur->emailExist2(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['modifier'])) == true){
        //     echo 3;
        // }
    }
?>