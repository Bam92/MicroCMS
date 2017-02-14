<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="microcms.css">
	<title>MicroCMS - Home</title>
</head>
<body>
	<header><h1>MicroCMS</h1></header>
	
	<?php foreach ($articles as $article): ?>
	<article>
		<h2><?php echo $article->getTitle() ?></h2>
		<p><?php echo $article->getContent() ?></p>
	</article>
	<?php endforeach ?>

	<footer class="footer">
		<a href="#">MicroCMS</a> is a minimalistic CMS built as a showcase for modern PHP development by Abel Mbula
	</footer>
</body>
</html>
