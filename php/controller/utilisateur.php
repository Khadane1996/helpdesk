<?php
    @session_start();
    require_once("functions.php");
    function matricule($table, $champs){
        require_once('../classes/classeConnexion.php');
        $requete = Connection::Connexion()->query("SELECT $champs FROM $table ORDER BY $champs DESC LIMIT 0,1;");
        $result = "0";
        foreach ($requete as $donne) 
            $result = $donne[0];
        if($result == "0")
            return ("0");
        else
            return($result);
    }

    function sendEmailResetPassword($sujet, $mailDestinataire, $contenu){
        if(mail($mailDestinataire, $sujet, $contenu)){
            echo 1;
        }
        else{
            echo 0;
        }
    }

    if(isset($_GET['changerEtat'])){
        require_once("../classe/classeUtilisateur.php");
        $Id= htmlspecialchars($_GET['changerEtat']);
        $etat= htmlspecialchars($_GET['etat']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Utilisateur();
        foreach($str as $ide){
            $a= $objet->changeState($ide, $etat);
        }
        echo $a;
        // header("location: index.php");
    }else if(isset($_GET['resetPassword'])){
        require_once("../classe/classeUtilisateur.php");
        $Id= htmlspecialchars($_GET['resetPassword']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Utilisateur();
        foreach($str as $ide){
            $a= $objet->resetPassword($ide);
        }
        $res = explode("$", $a);
        //echo $res[0];
        $sujet = "Reinitialisation de votre mot de passe ";
        $mailDestinataire = $res[2];
		// echo $res[2];
        $contenu = "Votre nouveau mot de passe est : ".$res[1];
        sendEmailResetPassword($sujet, $mailDestinataire, $contenu);
        // header("location: index.php");
    }else if(isset($_GET['supprimer'])){
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
    }else if(isset($_POST['updateProfile'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
        if ($Utilisateur->isLogged(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['motDePasseActuel']))) {
            $Utilisateur = new Utilisateur();
            echo $Utilisateur->updateProfile(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['motDePasseActuel']), htmlspecialchars($_POST['motDePasse']));
        }
        else {
             echo 2;
        }
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
    else if(isset($_GET['read'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
        $list = $Utilisateur->listUtilisateur();
        $nombreElementPage = 3;
        $nombrePage = ceil(count($list)/$nombreElementPage);

        $debut = 1;
        $list2 = $Utilisateur->listUtilisateurApi($debut, $nombreElementPage);
      
        $retour["success"] = true;
        $retour["pages"] = $nombrePage;
        $retour["users"] = $list2;
        echo json_encode($retour, JSON_PRETTY_PRINT);
        
    }else if(isset($_GET['send'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
        $motDePasse = sha1($_POST['motDePasse']);
        if ($Utilisateur->emailExist(htmlspecialchars($_POST['email'])) == false && $Utilisateur->loginExist(htmlspecialchars($_POST['login'])) == false) {
            
            $Utilisateur = new Utilisateur(NULL, htmlentities(htmlspecialchars($_POST['nomComplet']), ENT_SUBSTITUTE), htmlspecialchars($_POST['email']), htmlentities(htmlspecialchars($_POST['adresse']), ENT_SUBSTITUTE), htmlspecialchars($_POST['telephone']), htmlspecialchars($_POST['idRole']), htmlspecialchars($_POST['login']), $motDePasse);
            $res = $Utilisateur->addUtilisateur();
            if($res == 1){
                $list = $Utilisateur->listUtilisateur();
                $retour["success"] = true;
                $retour["users"] = $list;
                echo json_encode($retour, JSON_PRETTY_PRINT);
            }else{
                echo $res;
            }

        }
        else if ($Utilisateur->loginExist(htmlspecialchars($_POST['login'])) == true) {
             echo 2;
        }
        else if ($Utilisateur->emailExist(htmlspecialchars($_POST['email'])) == true){
            echo 3;
        }
    }else if(isset($_GET['role'])){
        require_once('../classe/classeUtilisateur.php');
        $Utilisateur = new Utilisateur();
        $list = $Utilisateur->listRole();

        $retour["success"] = true;
        $retour["roles"] = $list;
        echo json_encode($retour, JSON_PRETTY_PRINT);
        
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