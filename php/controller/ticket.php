<?php
    // @session_start();
    // require_once("functions.php");
    

    if(isset($_GET['supprimer'])){
        require_once("../classe/classeTicket.php");
        $Id= htmlspecialchars($_GET['supprimer']);
        $str = explode("$", $Id);
        $a=0;
        $objet = new Ticket();
        foreach($str as $ide){
            $a= $objet->deleteTicket($ide);
        }
        echo $a;
        // header("location: index.php");
    }
    else if(isset($_POST['ajouter'])){
        require_once('../classe/classeTicket.php');
        $Ticket = new Ticket();

        echo $Ticket->addTicket($_POST['libelle']);
    }
    else if(isset($_POST['modifier'])){
        require_once('../classe/classeTicket.php');
        $Ticket = new Ticket();

        echo $Ticket->updateTicket($_POST['modifier'], $_POST['libelle']);
    }else{
        echo 2;
    }
?>