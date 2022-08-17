<?php

    /*Permet de se connecter avec la base de données*/

    class Connexion{



        public static function Connect(){

            $conn = NULL;

            try{

                /*On essaie d'etablir la connexion*/ 

<<<<<<< HEAD
                    $conn = new PDO("mysql:host=localhost;dbname=autoecoles", "root", "");

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
=======
                $conn = new PDO("mysql:host=localhost;dbname=helpdesk", "root", " ");

                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
>>>>>>> main

                } catch(PDOException $e){

                    /*Si elle echoue, on recupere l'erreur et on l'affiche*/

                    echo 'ERROR: ' . $e->getMessage();

                    }    

                return($conn);

        }

    }

<<<<<<< HEAD
?>
=======
?>
>>>>>>> main
