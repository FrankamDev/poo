<?php
require_once('./libraries/database.php');
require_once('./libraries/utils.php');
require_once('./libraries/models/Comment.php');
require_once('./libraries/models/Article.php');
$articleModel = new Article();
$commentModel = new Comment();

$author = null;
if (!empty($_POST['author'])) {
    $author = $_POST['author'];
}

// Ensuite le contenu
$content = null;
if (!empty($_POST['content'])) {
   
    $content = htmlspecialchars($_POST['content']);
}

// Enfin l'id de l'article
$article_id = null;
if (!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])) {
    $article_id = $_POST['article_id'];
}


if (!$author || !$article_id || !$content) {
    die("Votre formulaire a été mal rempli !");
}


$pdo = getPdo();

$article = $articleModel->find($article_id);


if (!$article) {
    die("Ho ! L'article $article_id n'existe pas boloss !");
}

// 3. Insertion du commentaire
$commentModel->insert($author, $content, $article_id);

// 4. Redirection vers l'article en question :
redirect("article.php?id=" . $article_id);
