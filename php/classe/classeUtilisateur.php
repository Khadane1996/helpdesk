<?php 
	require_once('classeConnexion.php');
	// CLASSE UTILISATEUR 

	/** Attributs de la classe "Utilisateur" **/
	
	class Utilisateur {
		private $idUtilisateur;
		private $nomComplet;
		private $email;
<<<<<<< HEAD
		private $adresse;
		private $telephone;
=======
>>>>>>> main
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
				$this->nomComplet= "";
				$this->email= "";
<<<<<<< HEAD
				$this->adresse= "";
				$this->telephone= "";
=======
>>>>>>> main
				$this->idRole= "";
				$this->login= "";
				$this->motDePasse= "";
			}

			/*Sinon s'il y a des paramètres on donne aux variables les valeurs des paramètres
					La fonction func_get_arg() recupère la valeur de l'argument à la position qui lui est donnée en paramètre*/
			if ($nb != 0) {
				$this->idUtilisateur= func_get_arg(0);
				$this->nomComplet= func_get_arg(1);
				$this->email= func_get_arg(2);
<<<<<<< HEAD
				$this->adresse= func_get_arg(3);
				$this->telephone= func_get_arg(4);
				$this->idRole= func_get_arg(5);
				$this->login= func_get_arg(6);
				$this->motDePasse= func_get_arg(7);
=======
				$this->idRole= func_get_arg(3);
				$this->login= func_get_arg(4);
				$this->motDePasse= func_get_arg(5);
>>>>>>> main
			}

		}
		
		/** Getter et Setter de l'attribut "idUtilisateur" **/
		public function getIdUtilisateur(){
			return $this->idUtilisateur;
		}
		public function setIdUtilisateur($idUtilisateur){
			$this->idUtilisateur = $idUtilisateur;
		}
		
		/** Getter et Setter de l'attribut "nomComplet" **/
		public function getNomComplet(){
			return $this->nomComplet;
		}
		public function setNomComplet($nomComplet){
			$this->nomComplet = $nomComplet;
		}
		
		/** Getter et Setter de l'attribut "email" **/
		public function getEmail(){
			return $this->email;
		}
		public function setEmail($email){
			$this->email = $email;
		}
<<<<<<< HEAD
		
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
=======
				
>>>>>>> main
		
		/** Getter et Setter de l'attribut "idRole" **/
		public function getIdRole(){
			return $this->idRole;
		}
		public function setIdRole($idRole){
			$this->idRole = $idRole;
		}
		
<<<<<<< HEAD
=======
		
>>>>>>> main
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
			$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur WHERE idUtilisateur = \"$id\" ");
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
<<<<<<< HEAD
			
			$requete = Connexion::Connect()->prepare('INSERT INTO utilisateur(idUtilisateur, nomComplet, email, adresse, telephone, idRole, login, motDePasse)  
						VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdUtilisateur());
			$requete->bindValue(2, $this->getNomComplet());
			$requete->bindValue(3, $this->getEmail());
			$requete->bindValue(4, $this->getAdresse());
			$requete->bindValue(5, $this->getTelephone());
			$requete->bindValue(6, $this->getIdRole());
			$requete->bindValue(7, $this->getLogin());
			$requete->bindValue(8, $this->getMotDePasse());
=======
			$requete = Connexion::Connect()->prepare('INSERT INTO utilisateur(idUtilisateur, nomComplet, email, idRole,  login, motDePasse)  
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
			$requete->bindValue(1, $this->getIdUtilisateur());
			$requete->bindValue(2, $this->getNomComplet());
			$requete->bindValue(3, $this->getEmail());		
			$requete->bindValue(4, $this->getIdRole());		
			$requete->bindValue(5, $this->getLogin());
			$requete->bindValue(6, $this->getMotDePasse());
>>>>>>> main
			$res = $requete->execute();
			return($res);
		}
		// Modification des valeurs
		public function updateUtilisateur() {
			if($this->is_sha1($this->getMotDePasse()))
				$password = $this->getMotDePasse();
			else
				$password = sha1($this->getMotDePasse());
			
<<<<<<< HEAD
			$requete = Connexion::Connect()->prepare('UPDATE utilisateur SET nomComplet = ?, email = ?, adresse = ?, telephone = ?, idRole = ?, login = ?, motDePasse = ? WHERE idUtilisateur = ?
						');
			$requete->bindValue(1, $this->getNomComplet());
			$requete->bindValue(2, $this->getEmail());
			$requete->bindValue(3, $this->getAdresse());
			$requete->bindValue(4, $this->getTelephone());
			$requete->bindValue(5, $this->getIdRole());
			$requete->bindValue(6, $this->getLogin());
			$requete->bindValue(7, $password);
			$requete->bindValue(8, $this->getIdUtilisateur());
=======
			$requete = Connexion::Connect()->prepare('UPDATE utilisateur SET nomComplet = ?, email = ?,  idRole = ?,  login = ?, motDePasse = ? WHERE idUtilisateur = ?
						');
			$requete->bindValue(1, $this->getNomComplet());
			$requete->bindValue(2, $this->getEmail());	
			$requete->bindValue(3, $this->getIdRole());	
			$requete->bindValue(4, $this->getLogin());
			$requete->bindValue(5, $password);
			$requete->bindValue(6, $this->getIdUtilisateur());
>>>>>>> main
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

<<<<<<< HEAD
		// Liste des utilisateurs 
		public function listUtilisateurApi($debut, $nbrGet){
			$list = array();
			$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur order by nomComplet limit $debut, $nbrGet ");
			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}	

		public function listRole(){
			$list = array();
			$requete = Connexion::Connect()->query('SELECT * FROM role');
=======
		public function listRole(){
			$list = array();
			$requete = Connexion::Connect()->query('SELECT * FROM role WHERE idRolesalarie > 1');
>>>>>>> main
			//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
			foreach ($requete as $donnee) {
				$list[] = $donnee;
			}
			return $list;
		}

		public function updateProfile($login, $ancienMotDePasse, $nouveauMotDePasse) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();

				$requete1 = $db->prepare('UPDATE utilisateur SET motDePasse = ? WHERE login = ? AND motDePasse = ?');
				
				$requete1->bindValue(1, sha1($nouveauMotDePasse));
				$requete1->bindValue(2, $login);
				$requete1->bindValue(3, sha1($ancienMotDePasse));
				$res1 = $requete1->execute();

				$db->commit();
				return $res1;
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
		}


		public function changeState($id, $etat) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();
				$requete = $db->prepare('UPDATE utilisateur SET etat = ? WHERE idUtilisateur = ? ');
				$requete->bindValue(1, $etat);
				$requete->bindValue(2, $id);
				$res = $requete->execute(); 

				//
				$requete = $db->prepare('INSERT INTO histocompte(idHistocompte, idUtilisateur, action) VALUES (?, ?, ?)');
				$requete->bindValue(1, NULL);
				$requete->bindValue(2, $id);
				$requete->bindValue(3, $etat);
				$res = $requete->execute();

				$db->commit();
				return $res;
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
		}

		public function resetPassword($id) {
			$db = Connexion::Connect();
			try {  			
				$db->beginTransaction();

				$requete = Connexion::Connect()->prepare('UPDATE utilisateur SET motDePasse = ? WHERE idUtilisateur = ? ');
				$mdp = $this->random_password(8);
				$requete->bindValue(1, sha1($mdp));
				$requete->bindValue(2, $id);
				$res = $requete->execute();


				$list = array();
	
				$requete1 = $db->query("SELECT email FROM utilisateur WHERE idUtilisateur = \"$id\" ");;
				$email = "";
				/*$requete1->bindValue(1, $id);
				$res1 = $requete1->execute();*/

				foreach ($requete1 as $donnee) {
					$list[] = $donnee;
				}

				foreach ($list as $value) {
					$email = $value['email'];
				}

				$db->commit();
				// return $res1;
				if($res == 1)
					return "1$".$mdp."$".$email;
				else
					return($res);
			} catch (Exception $e) {
			  $db->rollBack();
			  echo "Failed: " . $e->getMessage();
			}
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
<<<<<<< HEAD
	        	AND telephone != \"$telephone\"
=======
	        	
>>>>>>> main
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
		public function loginEmployeExist2($email, $idUtilisateur){ // $login
	        $list = array();
	        $requete = Connexion::Connect()->query("SELECT email FROM utilisateur WHERE email = \"$email\" 
	        	AND idUtilisateur != \"$idUtilisateur\"
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
<<<<<<< HEAD
			// Liste des employés 
			public function listEmploye($idEntreprise){
				$list = array();
				$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur WHERE idEntreprise = $idEntreprise AND idRole IN (2,3) ");
				//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
				foreach ($requete as $donnee) {
					$list[] = $donnee;
				}
				return $list;
			}
			public function listRoleEmploye(){
				$list = array();
				$requete = Connexion::Connect()->query('SELECT * FROM role WHERE idRole IN (2,3) ');
				//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
				foreach ($requete as $donnee) {
					$list[] = $donnee;
				}
				return $list;
			}
			public function listClient($idEntreprise){
				$list = array();
				$requete = Connexion::Connect()->query("SELECT * FROM vutilisateur WHERE idRole = 5 AND idEntreprise = $idEntreprise "); //idEntreprise = $idEntreprise AND
				//On récupère le résultat de la requete, on le parcours, on le met dans une variable qu'on retourne 
				foreach ($requete as $donnee) {
					$list[] = $donnee;
				}
				return $list;
			}

			public function getAnneeEncours(){
		    	$list = array();
		        $requete = Connexion::Connect()->query("SELECT anneeScolaire FROM periode ORDER BY idPeriode DESC LIMIT 0,1 ");
		        /*On parcours le résultat*/
		        foreach ($requete as $donnee){
		            $list[] = $donnee;
				}

				foreach ($list as $value){
		            $val = $value['anneeScolaire'];
				}
				 if(count($list) != 0){
		            return $val;
		        }
		         else
		            return false;
		    }
	}
			
 ?>
=======
			
			
			
			

		
	}
			
 ?>
>>>>>>> main
