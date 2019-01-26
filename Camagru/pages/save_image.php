<?php 
	require_once "../class/include.php";
	require_once "../function/constant.php";
	
	if (!Auth::isLogged()) {
		header("Location: ../index.php");
		die();
	}

	if (empty($_FILES)) {
		header("Location: index.php");
		die();
	}

	if (!empty($_FILES)) {
		$dest = dirname(getcwd().DS);
		$img_file = $dest.DS."layout".DS."img".DS;
		$user_folder = $img_file.$_SESSION['Auth']['login'].DS;
		if (!is_dir($user_folder)) {
			mkdir($user_folder, 0755, true);
		}
		$img = $_FILES['files'];
		$img['name'] = strtolower($img['name']);
		$size = $_FILES['size'];

		$title = str_replace(" ", "_", $name[0]);
		$title = $title."_".rand(1, 100);

        if (preg_match('/(.+\.jpeg|.+\.jpg|.+\.png)$/i', $img['name']) && $_FILES['size'] <= MAX_IMG_SIZE) {
			move_uploaded_file($img['tmp_name'], $user_folder.$title.".png");
			Helper::getDB()->query("INSERT INTO pictures SET user_id=:user_id, title=:title, description=:description, created=:created, file=:file, like_count=0;", array(
				'user_id' => array($_SESSION['Auth']['id'], PDO::PARAM_INT),
				'title' => array($title, PDO::PARAM_STR),
				'description' => array("", PDO::PARAM_LOB),
				'file' => array("/img/".$_SESSION['Auth']['login']."/".$title.".png", PDO::PARAM_STR),
				'created' => array(date("Y-m-d H:i:s"), PDO::PARAM_STR)
			));
			$_SESSION['success'] = "Votre image a bien ete enregistrée".$_FILES['size'];
			header("Location: index.php");
			die();
		} else { 
			$_SESSION['error']['ext'] = "L'image que vous avez essayer d'uploader n'est pas valide !".$_FILES['size']   ;
			header("Location: index.php");
			die();
		}
	}
