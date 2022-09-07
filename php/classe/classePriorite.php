<?php 
	@session_start();
	require_once('classeConnexion.php');
	// CLASSE PRIORITE 

	/** Attributs de la classe "priorite" **/
	
	class Priorite {
		private $idPriorite;
		private $libelle;


		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idPriorite= "";
				$this->libelle= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idPriorite= func_get_arg(0);
				$this->libelle= func_get_arg(1);
			}

		}
		

		/** Getter et Setter de l'attribut "idPriorite" **/
		public function getidPriorite(){
			return $this->idPriorite;
		}
		public function setidPriorite($idPriorite){
			$this->idPriorite = $idPriorite;
		}


		/** Getter et Setter de l'attribut "libelle" **/
		public function getLibelle(){
			return $this->libelle;
		}
		public function setLibelle($libelle){
			$this->libelle = $libelle;
		}
		



		public function addPriorite($libelle) {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO priorite(idPriorite, libelle)  
						VALUES (?, ?)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $libelle);
			$res = $requete->execute();
			return($res);
		}

		// Liste des Priorites
		public function listPriorite(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM priorite");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function deletePriorite($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM priorite WHERE idPriorite = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

		// Modification des valeurs
		public function updatePriorite($idPriorite,$libelle) {
			$requete = Connexion::Connect()->prepare('UPDATE priorite SET libelle = ? WHERE idPriorite = ?
						');
			$requete->bindValue(1, $libelle);
			$requete->bindValue(2, $idPriorite);
			$res = $requete->execute(); 
			return($res);
		}
		
	}
			
 ?>