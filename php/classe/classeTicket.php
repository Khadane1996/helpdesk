<?php 
	require_once('classeConnexion.php');
	// CLASSE TICKET 

	/** Attributs de la classe "Ticket" **/
	
	class Ticket {
		private $idTicket;
		private $description;
		private $idPriorite;
		private $idCategorie;
		private $idAuteur;
		private $idAssigne;
		private $idStatus;


		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idTicket= "";
				$this->description= "";
				$this->idPriorite= "";
				$this->idCategorie= "";
				$this->idAuteur= "";
				$this->idAssigne= "";
				$this->idStatus= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idTicket= func_get_arg(0);
				$this->description= func_get_arg(1);
				$this->idPriorite= func_get_arg(2);
				$this->idCategorie= func_get_arg(3);
				$this->idAuteur= func_get_arg(4);
				$this->idAssigne= func_get_arg(5);
				$this->idStatus= func_get_arg(6);

			}

		}
		

		/** Getter et Setter de l'attribut "idTicket" **/
		public function getIdTicket(){
			return $this->idTicket;
		}
		public function setIdTicket($idTicket){
			$this->idTicket = $idTicket;
		}


		/** Getter et Setter de l'attribut "description" **/
		public function getDescription(){
			return $this->description;
		}
		public function setDescription($description){
			$this->description = $description;
		}
		

		/** Getter et Setter de l'attribut "idPriorite" **/
		public function getIdPriorite(){
			return $this->idPriorite;
		}
		public function setIdPriorite($idPriorite){
			$this->idPriorite = $idPriorite;
		}
	

		/** Getter et Setter de l'attribut "idCategorie" **/
		public function getIdCategorie(){
			return $this->idCategorie;
		}
		public function setIdCategorie($idCategorie){
			$this->idCategorie = $idCategorie;
		}

		
		/** Getter et Setter de l'attribut "idAuteur" **/
		public function getIdAuteur(){
			return $this->idAuteur;
		}
		public function setIdAuteur($idAuteur){
			$this->idAuteur = $idAuteur;
		}
		

		/** Getter et Setter de l'attribut "idAssigne" **/
		public function getIdAssigne(){
			return $this->idAssigne;
		}
		public function setIdAssigne($idAssigne){
			$this->idAssigne = $idAssigne;
		}

					
		/** Getter et Setter de l'attribut "idStatus" **/
		public function getIdStatus(){
			return $this->idStatus;
		}
		public function setIdStatus($idStatus){
			$this->idStatus = $idStatus;
		}
				




		// Insertion des valeurs 
		/** Fonctions CRUD **/

		public function addTicket($description, $idAuteur, $idPriorite, $idCategorie, $idAssigne, $idStatus) {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO ticket(idTicket, description,idAuteur, idPriorite, idCategorie, idAssigne, idStatus)  
						VALUES (?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $description);
			$requete->bindValue(3, $idAuteur);
			$requete->bindValue(4, $idPriorite);
			$requete->bindValue(5, $idCategorie);
			$requete->bindValue(6, $idAssigne);
			$requete->bindValue(7, $idStatus);
			$res = $requete->execute();
			return($res);
		}


		// Modification des valeurs
		// public function updateTicket() {
		

		// 	$requete = Connexion::Connect()->prepare('UPDATE ticket SET idPriorite = ?, idCategorie = ?, idAuteur = ?, idAssigne = ?, idStatus = ?, login = ?, motDePasse = ? WHERE idTicket = ?
		// 				');
		// 	$requete->bindValue(1, $this->getDescription());
		// 	$requete->bindValue(2, $this->getIdPriorite());
		// 	$requete->bindValue(3, $this->getIdCategorie());
		// 	$requete->bindValue(4, $this->getIdAuteur());
		// 	$requete->bindValue(5, $this->getIdAssigne());
		// 	$requete->bindValue(6, $this->getIdStatus());	
		// 	$requete->bindValue(7, $this->getIdTicket());

		// 	$res = $requete->execute(); 
		// 	return($res);
		// }
	
		// Liste des Tickets
		public function listTicket(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM vticket");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		// Liste des Tickets ouverts
		public function listTicketOuvert(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM vticket where idStatus='1'");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		// Liste des Tickets fermés
		public function listTicketFerme(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM vticket where idStatus='2'");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}
	    
	    

	  
	  




		
		
	}
			

 ?>