<?php
require_once('./libraries/database.php');
require_once('./libraries/utils.php');
require_once('./libraries/models/Comment.php');

$model = new Comment();
if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
    die("Ho ! Fallait préciser le paramètre id en GET !");
}

$id = $_GET['id'];



$commentaire = $model->find($id);
if (!$commentaire) {
    die("Aucun commentaire n'a l'identifiant $id !");
}


$article_id = $commentaire['article_id'];

$model->delete($id);

/**
 * 5. Redirection vers l'article en question
 */
redirect("article.php?id=" . $article_id);
