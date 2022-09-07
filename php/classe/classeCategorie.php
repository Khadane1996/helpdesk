<?php 

		@session_start();

	require_once('classeConnexion.php');
	// CLASSE CATEGORIE 

	/** Attributs de la classe "categorie" **/
	
	class Categorie {
		private $idCategorie;
		private $libelle;


		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idCategorie= "";
				$this->libelle= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idCategorie= func_get_arg(0);
				$this->libelle= func_get_arg(1);
			}

		}
		

		/** Getter et Setter de l'attribut "idCategorie" **/
		public function getidCategorie(){
			return $this->idCategorie;
		}
		public function setidCategorie($idCategorie){
			$this->idCategorie = $idCategorie;
		}


		/** Getter et Setter de l'attribut "libelle" **/
		public function getLibelle(){
			return $this->libelle;
		}
		public function setLibelle($libelle){
			$this->libelle = $libelle;
		}
		



		public function addCategorie($libelle) {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO categorie(idCategorie, libelle)  
						VALUES (?, ?)');
			$requete->bindValue(1, NULL);
			$requete->bindValue(2, $libelle);
			$res = $requete->execute();
			return($res);
		}

		// Liste des categories
		public function listCategorie(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM categorie");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function deleteCategorie($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM categorie WHERE idCategorie = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}

		// Modification des valeurs
		public function updateCategorie($idCategorie,$libelle) {
			$requete = Connexion::Connect()->prepare('UPDATE categorie SET libelle = ? WHERE idCategorie = ?
						');
			$requete->bindValue(1, $libelle);
			$requete->bindValue(2, $idCategorie);
			$res = $requete->execute(); 
			return($res);
		}
		
	}
			
 ?>