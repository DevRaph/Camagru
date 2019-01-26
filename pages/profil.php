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
			<div id='profil_photo' class='profil_part'>
				<img src="">
				<a href="" class='btn'>Changer de photo</a>
			</div>
			<div id='profil_infos' class='profil_part'>
				<a href="" class="btn">Modifier information</a>
				<br>
				<span class='profil_info'>Pseudo</span>
				<p>raph</p>
				<br>
				<span class='profil_info'>Email</span>
				<p>raphaelpinetpro@gmail.com</p>
				<br>
				<span class='profil_info'>Age</span>
				<p>31</p>
				<br>
				<span class='profil_info'>Stats</span>
				<p>...</p>
				<br>
				<a href="change_password.php" class="btn">Modifier le mot de passe</a>
			</div>
			<br clear="both">
		</div>
	</div>
</article>

<!-- enlever la partie avec les image pour editer le profil -->

<?php require_once "../layout/footer.php"; ?>