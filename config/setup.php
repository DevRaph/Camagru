<?php 
	require_once "database.php";
	require_once "../class/Bdd.php";
	$bdd = new Bdd($DB_DSN, $DB_NAME, $DB_USER, $DB_PASSWORD, $DB_OPTIONS);
	$bdd->create_table($DB_TABLE);
