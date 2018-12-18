<?php
	if (session_status() == PHP_SESSION_NONE) {
        session_start();
        
    }
	if (!isset($_SESSION['lang'])){
		$_SESSION['lang'] = "es-MX";
	}
	else{
		if (isset($_GET['lang']) && !empty($_GET['lang'])) {
			if ($_GET['lang'] == "es-MX")
				$_SESSION['lang'] = "es-MX";
			else if ($_GET['lang'] == "en-US")
				$_SESSION['lang'] = "en-US";
		}
	} 

	require_once $_SERVER["DOCUMENT_ROOT"]."/yehoshua/App/idiomas/" . $_SESSION['lang'] . ".php";
?>