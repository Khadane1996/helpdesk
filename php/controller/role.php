<?php
    @session_start();
    require_once("functions.php");
    

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
        $motDePasse = sha1($_POST['motDePasse']);
        if ($Utilisateur->emailExist($_POST['email']) == false && $Utilisateur->loginExist($_POST['login']) == false) {
            
            $Utilisateur = new Utilisateur(NULL, $_POST['nomComplet'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['idRole'], $_POST['login'], $motDePasse);
            echo $Utilisateur->addUtilisateur();

        }
        else if ($Utilisateur->loginExist($_POST['login']) == true) {
             echo 2;
        }
        else if ($Utilisateur->emailExist($_POST['email']) == true){
            echo 3;
        }
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
        if ($Utilisateur->emailExist2($_POST['email'], $_POST['modifier']) == false && $Utilisateur->loginExist2($_POST['login'], $_POST['modifier']) == false) {
            
            $Utilisateur = new Utilisateur($_POST['modifier'], $_POST['nomComplet'], $_POST['email'], $_POST['adresse'], $_POST['telephone'], $_POST['idRole'], $_POST['login'], $_POST['motDePasse']);
            $res = $Utilisateur->updateUtilisateur();
            if($res == 1){
                echo 10;
            }else{
                echo $res;
            }
        }
        else if ($Utilisateur->loginExist2(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['modifier'])) == true) {
             echo 2;
        }
        else if ($Utilisateur->emailExist2(htmlspecialchars($_POST['email']), htmlspecialchars($_POST['modifier'])) == true){
            echo 3;
        }
    }
    else{
        if(isset($opt)){
            $opt = explode("-", $opt);
            $option = $opt[0];
            if($option == "ajouter"){
                include('php/view/utilisateur/ajouter.php');
            }else if($option == "modifier"){
                require_once('php/classe/classeUtilisateur.php');

                include('php/view/utilisateur/modifier.php');
            }else if($option=="supprimer"){
               require_once('php/classe/classeUtilisateur.php');

                include('php/view/utilisateur/liste.php');
            }
            else if($option=="details"){
                include('php/view/utilisateur/details.php');
            }else if($option=="liste.php"){
                include('php/view/utilisateur/liste.php');
            }else if($option=="liste2"){
                include('php/view/utilisateur/liste2.php');
            }else if($option=="listerh"){
                include('php/view/utilisateur/listerh.php');
            }else if($option=="listedesactive"){
                include('php/view/utilisateur/listedesactive.php');
            }else if($option=="listerhdesactive"){
                include('php/view/utilisateur/listerhdesactive.php');
            }
        }
        else{
            include('php/view/utilisateur/liste.php');
        }
    }
?>