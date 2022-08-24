<?php 
	require_once('classeConnexion.php');
	// CLASSE UTILISATEUR 

	/** Attributs de la classe "Utilisateur" **/
	
	class Utilisateur {
		private $idUtilisateur;
		private $prenom;
		private $nom;
		private $email;
		private $adresse;
		private $telephone;
		private $idRole;
		private $login;
		private $motDePasse;

		
		/** Constructeur ... **/
		public function __construct(){
			//récupération du nombre d'arguments
			$nb= func_num_args();

			// S'il n'y a pas de paramètre, on initialise les variables à une valeur nulle
			if ($nb == 0) {
				$this->idUtilisateur= "";
				$this->prenom= "";
				$this->nom= "";
				$this->email= "";
				$this->adresse= "";
				$this->telephone= "";
				$this->idRole= "";
				$this->login= "";
				$this->motDePasse= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idUtilisateur= func_get_arg(0);
				$this->prenom= func_get_arg(1);
				$this->nom= func_get_arg(2);
				$this->email= func_get_arg(3);
				$this->adresse= func_get_arg(4);
				$this->telephone= func_get_arg(5);
				$this->idRole= func_get_arg(6);
				$this->login= func_get_arg(7);
				$this->motDePasse= func_get_arg(8);

			}

		}
		

		/** Getter et Setter de l'attribut "idUtilisateur" **/
		public function getIdUtilisateur(){
			return $this->idUtilisateur;
		}
		public function setIdUtilisateur($idUtilisateur){
			$this->idUtilisateur = $idUtilisateur;
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
	

		/** Getter et Setter de l'attribut "email" **/
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}

		
		/** Getter et Setter de l'attribut "adresse" **/
		public function getAdresse(){
			return $this->adresse;
		}
		public function setAdresse($adresse){
			$this->adresse = $adresse;
		}
		

		/** Getter et Setter de l'attribut "telephone" **/
		public function getTelephone(){
			return $this->telephone;
		}
		public function setTelephone($telephone){
			$this->telephone = $telephone;
		}

					
		/** Getter et Setter de l'attribut "idRole" **/
		public function getIdRole(){
			return $this->idRole;
		}
		public function setIdRole($idRole){
			$this->idRole = $idRole;
		}
				

		/** Getter et Setter de l'attribut "login" **/
		public function getLogin(){
			return $this->login;
		}
		public function setLogin($login){
			$this->login = $login;
		}
		
		/** Getter et Setter de l'attribut "motDePasse" **/
		public function getMotDePasse(){
			return $this->motDePasse;
		}
		public function setMotDePasse($motDePasse){
			$this->motDePasse = $motDePasse;
		}



		//Recherche d'un élément de la table Utilisateur**/
		public function rechercheUtilisateur($id){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM utilisateur WHERE idUtilisateur = \"$id\" ");
			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}

		public function is_sha1($str) {
		    return (bool) preg_match('/^[0-9a-f]{40}$/i', $str);
		}
		// Insertion des valeurs 
		/** Fonctions CRUD **/
		public function addUtilisateur() {

			
			$requete = Connexion::Connect()->prepare('INSERT INTO utilisateur(idUtilisateur, nom, email, adresse, telephone, idRole, login, motDePasse)  
						VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdUtilisateur());
			$requete->bindValue(2, $this->getPrenom());
			$requete->bindValue(3, $this->getNom());
			$requete->bindValue(4, $this->getEmail());
			$requete->bindValue(5, $this->getAdresse());
			$requete->bindValue(6, $this->getTelephone());
			$requete->bindValue(7, $this->getIdRole());
			$requete->bindValue(8, $this->getLogin());
			$requete->bindValue(9, $this->getMotDePasse());


			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateUtilisateur() {
			if($this->is_sha1($this->getMotDePasse()))
				$password = $this->getMotDePasse();
			else
				$password = sha1($this->getMotDePasse());
			

			$requete = Connexion::Connect()->prepare('UPDATE utilisateur SET nom = ?, email = ?, adresse = ?, telephone = ?, idRole = ?, login = ?, motDePasse = ? WHERE idUtilisateur = ?
						');
			$requete->bindValue(1, $this->getPrenom());
			$requete->bindValue(2, $this->getNom());
			$requete->bindValue(3, $this->getEmail());
			$requete->bindValue(4, $this->getAdresse());
			$requete->bindValue(5, $this->getTelephone());
			$requete->bindValue(6, $this->getIdRole());
			$requete->bindValue(7, $this->getLogin());
			$requete->bindValue(8, $password);
			$requete->bindValue(9, $this->getIdUtilisateur());

			$res = $requete->execute(); 
			return($res);
		}
		// Suppression des valeurs
		public function deleteUtilisateur($code) {
			$requete = Connexion::Connect()->prepare('DELETE FROM utilisateur  WHERE idUtilisateur = ?');
			$requete->bindValue(1, $code);
			$res = $requete->execute();
			return($res);
		}
		// Liste des utilisateurs 
		public function listUtilisateur(){
			$list = array();
			$requete = Connexion::Connect()->query('SELECT * FROM vutilisateur');
			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function listRole(){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT libelle FROM role");

			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function emailExist($email){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM utilisateur WHERE email = \"$email\" AND email <> '' ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }

	    public function emailExist2($email, $idUtilisateur){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM utilisateur WHERE email = \"$email\" 
	        	AND idUtilisateur != \"$idUtilisateur\" AND idUtilisateur <> ''
	        ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }

	    public function loginExist($login){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT login FROM utilisateur WHERE login = \"$login\" AND login <> '' ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }

	    public function loginExist2($login, $idUtilisateur){
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT login FROM utilisateur WHERE login = \"$login\" 
	        	AND idUtilisateur != \"$idUtilisateur\" AND idUtilisateur <> ''
	        ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }

	    public function isLogged($login, $mdp){
	        $list = array();
	        /*On crypte le mot de passe avant la vérification car il est crypté dan sla base de données
			*On exécute la requete
	        */
	        $mdp = sha1($mdp);
	        $requete = Connexion::Connect()->query("SELECT motDePasse FROM vutilisateur WHERE login = \"$login\" AND motDePasse = \"$mdp\" ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			/*Si la taille du taille du tableau est différente de 0, l'vutilisateur est donc conecté. on revoie true*/
	        if(count($list) != 0){
	            return true;
	        }
	        /*Sinon on renvoi false*/
	         else
	            return false;     
	    }

	    public function isActivated($login, $mdp){
	        $list = array();
	        /*On crypte le mot de passe avant la vérification car il est crypté dan sla base de données
			*On exécute la requete
	        */
	        $mdp = sha1($mdp);
	        $requete = Connexion::Connect()->query("SELECT motDePasse FROM vutilisateur WHERE login = \"$login\" AND motDePasse = \"$mdp\" AND etat = 1 ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			/*Si la taille du taille du tableau est différente de 0, l'vutilisateur est donc conecté. on revoie true*/
	        if(count($list) != 0){
	            return true;
	        }
	        /*Sinon on renvoi false*/
	         else
	            return false;     
	    }

	    public function detailsUtilisateur($login, $mdp){
			$list = array();

			$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur WHERE login = \"$login\" AND motDePasse = \"$mdp\" ");

			foreach ($requete as $donnee){
				$list[] = $donnee;
			}
			return $list;
		}
		public function loginEmployeExist($email, $telephone){ // $login
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM utilisateur WHERE email = \"$email\" 

	        	AND telephone != \"$telephone\"

	        	

	        ");
	        /*On parcours le résultat*/
	        foreach ($requete as $donnee){
	            $list[] = $donnee;
			}
			 if(count($list) != 0){
	            return true;
	        }
	         else
	            return false;    
	    }
		
	}
			
 ?>

			

