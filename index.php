<?php
	require_once "./class/include.php";
	require_once "./function/constant.php";
	if (Auth::isLogged()) {
		header("Location: ". ROOT. "/pages/index.php");
		die();
	}
	include "./layout/header.php"
?>
	<article class="presentation">
		<header class="art-header">
			<h1>Camagru</h1>
			<p>Inscrivez vous pour voir les photos, les lik&eacute;s et les comment&eacute;s !</p>
			<h4>
				<a id="view_subscribe" class="link"><span style="color:#000;">Vous n'avez pas de compte ?</span> Inscrivez-vous</a>
			</h4>
			<br class="clear">
		</header>
		<div id="information" class="information">
		</div>
	</article>

<?php include "./layout/footer.php" ?>