<?php

// Return all articles
function getArticles() {
	// Data access
	$bdd = new PDO('mysql:host=localhost;dbname=microcms', 'microcms_user', '$db@microcms_user');
	$articles = $bdd->query('SELECT * FROM t_article ORDER BY art_id DESC');
	return $articles;
}