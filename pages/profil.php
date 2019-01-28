<?php
	require_once "../class/include.php";
	require_once "../function/constant.php";
	if (!Auth::isLogged()) {
		header("Location: index.php");
		die();
	}
	require_once "../layout/header.php";
?>
<article>
	<div class="block">
		<div class="profil">
			<br clear="both">
			<a href="change_password.php" class="btn">Modifier le mot de passe</a>
		</div>
	</div>
</article>

<?php require_once "../layout/footer.php"; ?>