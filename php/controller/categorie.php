<?php
    @session_start();
    // require_once("functions.php");
    

    if(isset($_GET['supprimer'])){
        require_once("../classe/classeCategorie.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Categorie();
        foreach($str as $ide){
            $a= $objet->deleteCategorie($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeCategorie.php');
        $Categorie = new Categorie();

        echo $Categorie->addCategorie($_POST['libelle']);
    }
    else if(isset($_POST['modifier'])){
       
    }else{
        echo 2;
    }
?>