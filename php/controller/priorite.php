<?php
    // @session_start();
    // require_once("functions.php");
    

    if(isset($_GET['supprimer'])){
        require_once("../classe/classePriorite.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Priorite();
        foreach($str as $ide){
            $a= $objet->deletePriorite($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classePriorite.php');
        $Priorite = new Priorite();

        echo $Priorite->addPriorite($_POST['libelle']);
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classePriorite.php');
        $Priorite = new Priorite();

        echo $Priorite->updatePriorite($_POST['modifier'], $_POST['libelle']);
    }else{
        echo 2;
    }
?>