<?php
	if (!defined("DS"))
		define("DS", DIRECTORY_SEPARATOR);
	// Donne le chemin de la racine
	if (!defined("ROOT"))
		define("ROOT", dirname($_SERVER['SCRIPT_NAME']));
	// Donne le chemin du dossier layout
	if (!defined("LAYOUT"))
		define("LAYOUT", ROOT."/layout");
	if (!defined("LAYOUT_PAGES"))
		define("LAYOUT_PAGES", dirname(ROOT)."/layout");
?>