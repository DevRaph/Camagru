<?php
	require_once "../class/include.php";
	require_once "../function/constant.php";

	$limit = 0;
	$offset = 8;
	if (isset($_GET['pages'])) {
		if (is_numeric($_GET['pages'])) {
			$_GET['pages'] = abs(intval($_GET['pages']));
			$limit = (($_GET['pages']) * $offset);
		} else {
			header("Location: gallery.php");
		}
	}
	
	$picture = Helper::getDB()->query(
		"SELECT p.file, p.id, p.title, p.user_id, p.like_count, u.login
		FROM pictures p
		LEFT JOIN users u ON u.id = p.user_id
		ORDER BY p.created DESC
		LIMIT :limite, :offset", 
	array(
		"limite" => array($limit, PDO::PARAM_INT),
		"offset" => array($offset, PDO::PARAM_INT),
	));
	$p = $picture->fetch();

	$nbPages = ceil(count($picture) / $offset) - 1;

	require_once "../layout/header.php";
?>
<article>
	<div class="block">
		<div class="gallery">
			<?php if ($p != false): ?>
				<?php do { ?>
					<div class="image">
						<a href="comments.php?id=<?php echo $p->id; ?>">
							<img src="<?php echo LAYOUT_PAGES.$p->file; ?>" alt="<?php echo $p->title; ?>">
						</a>
						<?php if (!Auth::isLogged()): ?>
							<span id="like_count"><?= $p->like_count ?></span> Like
						<?php else: ?>
							<div class="like" data-ref="pictures" data-ref_id="<?= $p->id ?>" data-user_id="<?= isset($_SESSION['Auth']['id']) ? $_SESSION['Auth']['id'] : ''; ?>">
								<button id="like"><span id="like_count"><?= $p->like_count ?></span> Like</button>
							</div>
						<?php endif ?>
						<br clear="both">
						<span class="author"><?php echo $p->login ?></span>					
					</div>
				<?php } while($p = $picture->fetch()); ?>
				<div class="pagination">
					<ul>
					Pages : <li><a href="gallery.php">First</a></li> /
					<?php for ($i = 1; $i <= $nbPages; $i++) { ?>
						<li><a href="gallery.php?pages=<?php echo $i ?>"><?php echo $i ?></a></li> / 
					<?php } ?>
					</ul>
				</div>
			<?php else: ?>
				<h1>Pas encore d'images</h1>
			<?php endif; ?>
		</div>
	</div>
</article>

<?php require_once "../layout/footer.php"; ?>