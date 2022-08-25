<?php 
	require_once('classeConnexion.php');
	// CLASSE STATUS 

	/** Attributs de la classe "status" **/
	
	class Status {
		private $idStatus;
		private $libelle;


		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idStatus= "";
				$this->libelle= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idStatus= func_get_arg(0);
				$this->libelle= func_get_arg(1);
			}

		}
		

		/** Getter et Setter de l'attribut "idStatus" **/
		public function getidStatus(){
			return $this->idStatus;
		}
		public function setidStatus($idStatus){
			$this->idStatus = $idStatus;
		}


		/** Getter et Setter de l'attribut "libelle" **/
		public function getLibelle(){
			return $this->libelle;
		}
		public function setLibelle($libelle){
			$this->libelle = $libelle;
		}
		



		public function addStatus($libelle) {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO status(idStatus, libelle)  
						VALUES (?, ?)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $libelle);
			$res = $requete->execute();
			return($res);
		}

		// Liste des status
		public function listStatus(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT libelle FROM status");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		
		
	}
			

 ?>

			

