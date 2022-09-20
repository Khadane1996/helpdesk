<?php 

	@session_start();

	require_once('classeConnexion.php');
	// CLASSE INSCRIPTION

	/** Attributs de la classe "Messagerie" **/
	
	class Messagerie {
		private $idMessagerie;
		private $prenom;
		private $nom;

		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idMessagerie= "";
				$this->prenom= "";
				$this->nom= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idMessagerie= func_get_arg(0);
				$this->prenom= func_get_arg(1);
				$this->nom= func_get_arg(2);
			}

		}
		
		/** Getter et Setter de l'attribut "idMessagerie" **/
		public function getIdMessagerie(){
			return $this->idMessagerie;
		}
		public function setIdMessagerie($idMessagerie){
			$this->idMessagerie = $idMessagerie;
		}

		/** Getter et Setter de l'attribut "prenom" **/
		public function getPrenom(){
			return $this->prenom;
		}
		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}
		
		/** Getter et Setter de l'attribut "nom" **/
		public function getNom(){
			return $this->nom;
		}
		public function setNom($nom){
			$this->nom = $nom;
		}
		
		//Recherche d'un élément de la table Messagerie**/
		// public function rechercheMessagerie($id){
		// 	$list = array();
		// 	$requete = Connexion::Connect()->query("SELECT * FROM veleve WHERE idEleve = \"$id\" AND classe = 'CRH' ");
		// 	//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
		// 	foreach ($requete as $donnee){
		// 		$list[] = $donnee;
		// 	}
		// 	return $list;
		// }

        ////////////////////////////////// Admin début

        public function listMessagerie(){
            $list = array();
                $requete = Connexion::Connect()->query("SELECT * FROM messagerie");
            //On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
            foreach ($requete as $donnee){
                $list[] = $donnee;
            }
            return $list;
            
        }

		public function addMessagerie($destinataire, $objet, $message, $pieceJointe) {
			
			$db = Connexion::Connect();

			try {  			
				$db->beginTransaction();

				$requete = $db->prepare('INSERT INTO messagerie(idMessagerie, destinataire, objet, message, pieceJointe, dateEnvoi)  
							VALUES (?, ?, ?, ?, ?, ?)');
				$requete->bindValue(1, NULL);
				$requete->bindValue(2, $destinataire);
                $requete->bindValue(3, $objet);
				$requete->bindValue(4, $message);
				$requete->bindValue(5, $pieceJointe);
				$requete->bindValue(6, date('d/m/Y'));
				$res = $requete->execute();

                $db->commit();
					
				return($res);
				
				} catch (Exception $e) {
				  $db->rollBack();
				  echo "Failed: " . $e->getMessage();
				}
		}

		////////////////////////////////// Admin fin

	}
			
 ?>