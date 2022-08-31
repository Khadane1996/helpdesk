<?php 
	require_once('classeConnexion.php');
	// CLASSE TICKET

	/** Attributs de la classe "ticket" **/
	
	class Ticket {
		private $idTicket;
		private $description;


		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idTicket= "";
				$this->description= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idTicket= func_get_arg(0);
				$this->description= func_get_arg(1);
			}

		}
		

		/** Getter et Setter de l'attribut "idTicket" **/
		public function getidTicket(){
			return $this->idTicket;
		}
		public function setidTicket($idTicket){
			$this->idTicket = $idTicket;
		}


		/** Getter et Setter de l'attribut "description" **/
		public function getDescription(){
			return $this->description;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		



		public function addTicket($description) {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO ticket(idTicket, description)  
						VALUES (?, ?)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $description);
			$res = $requete->execute();
			return($res);
		}

		// Liste des Tickets
		public function listTicket(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM ticket");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function deleteTicket($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM ticket WHERE idTicket = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

		// Modification des valeurs
		public function updateTicket($idTicket,$description) {
			$requete = Connexion::Connect()->prepare('UPDATE ticket SET description = ? WHERE idTicket = ?
						');
			$requete->bindValue(1, $description);
			$requete->bindValue(2, $idTicket);
			$res = $requete->execute(); 
			return($res);
		}
		
	}
			
 ?>