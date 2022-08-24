<?php
	@session_start();
	session_unset();
	session_destroy();

	@session_start();
	require_once('../classe/classeUtilisateur.php');
	$Utilisateur = new Utilisateur();

	if($Utilisateur->isLogged($_POST['login'], $_POST['motDePasse']) == true){
		if($Utilisateur->isActivated($_POST['login'], $_POST['motDePasse']) == true){
			$infos = $Utilisateur->detailsUtilisateur($_POST['login'], sha1($_POST['motDePasse']));
			$_SESSION['helpdeskconnected'] = true;

			$_SESSION['helpdeskidUtilisateur'] = $infos[0]['idUtilisateur'];
			$_SESSION['helpdeskemail'] = $infos[0]['email'];
			$_SESSION['helpdeskmotDePasse'] = $infos[0]['motDePasse'];
			$_SESSION['helpdesklogin'] = $infos[0]['login'];
			$_SESSION['helpdesknom'] = $infos[0]['nom'];
			$_SESSION['helpdeskprenom'] = $infos[0]['prenom'];
			$_SESSION['helpdesktelephone'] = $infos[0]['telephone'];
			$_SESSION['helpdeskidRole'] = $infos[0]['idRole'];
		
			
			if($infos[0]['idRole'] == 1){
				$_SESSION['helpdeskadministrateur'] = true;
				echo 1;
			}
			else if($infos[0]['idRole'] == 2){
				$_SESSION['helpdesktechnicien'] = true;
				echo 2;
			}
			else if($infos[0]['idRole'] == 3){
				$_SESSION['helpdesksimple'] = true;
				echo 3;
			}
			

			
		}else{
			echo 40;
		}
		
	}
	else {
		echo -1;
	}
?>