<?php
    @session_start();
    // require_once("functions.php");
    

    if(isset($_GET['supprimer'])){
        require_once("../classe/classeStatus.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Status();
        foreach($str as $ide){
            $a= $objet->deleteStatus($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeStatus.php');
        $Status = new Status();

        echo $Status->addStatus($_POST['libelle']);
    }
    else if(isset($_POST['modifier'])){
       
    }else{
        echo 2;
    }
?>