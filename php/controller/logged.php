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
			$_SESSION['kbadakarconnected'] = true;

			$_SESSION['kbadakaridUtilisateur'] = $infos[0]['idUtilisateur'];
			$_SESSION['kbadakaremail'] = $infos[0]['email'];
			$_SESSION['kbadakarmotDePasse'] = $infos[0]['motDePasse'];
			$_SESSION['kbadakarlogin'] = $infos[0]['login'];
			$_SESSION['kbadakarnomComplet'] = $infos[0]['nomComplet'];
			$_SESSION['kbadakartelephone'] = $infos[0]['telephone'];
			$_SESSION['kbadakarrole'] = $infos[0]['role'];
			$_SESSION['kbadakaridRole'] = $infos[0]['idRole'];
			// $_SESSION['kbadakaridEntreprise'] = $infos[0]['idEntreprise'];

			
			if($infos[0]['idRole'] == 1){
				$_SESSION['kbadakaradministrateur'] = true;
				echo 1;
			}
			else if($infos[0]['idRole'] == 4){
				$_SESSION['kbadakarentreprise'] = true;
				echo 4;
			}
			else if($infos[0]['idRole'] == 2){
				$_SESSION['kbadakardirection'] = true;
				echo 2;
			}
			else if($infos[0]['idRole'] == 3){
				$_SESSION['kbadakarcomptabilite'] = true;
				echo 3;
			}
			else if($infos[0]['idRole'] == 4){
				$_SESSION['kbadakarmaitresse'] = true;
				echo 4;
			}
			else if($infos[0]['idRole'] == 5){
				$_SESSION['kbadakardirecteurtechnique'] = true;
				echo 5;
			}
			else if($infos[0]['idRole'] == 6){
				$_SESSION['kbadakarfinance'] = true;
				echo 6;
			}
			
		}else{
			echo 40;
		}
		
	}
	else {
		echo -1;
	}
?>