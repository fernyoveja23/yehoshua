<?php
	session_start();

	if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "es-MX";
	else if (isset($_POST['lang']) && $_SESSION['lang'] != $_POST['lang'] && !empty($_POST['lang'])) {
		if ($_POST['lang'] == "es-MX")
			$_SESSION['lang'] = "es-MX";
		else if ($_POST['lang'] == "en-US")
			$_SESSION['lang'] = "en-US";
	}

	require_once $_SERVER["DOCUMENT_ROOT"]."/yehoshua/App/idiomas/" . $_SESSION['lang'] . ".php";
?>