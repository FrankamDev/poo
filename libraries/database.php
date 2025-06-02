<?php

/**
 * Retourne une connexion a la base de donnees
 * @return PDO
 */
function getPdo(){

  $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  ]);
  return $pdo;
}





function findAllComments(int $id): array
{
  $pdo = getPdo();
$query = $pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
$query->execute(['article_id' => $id]);
$commentaires = $query->fetchAll();
  return $commentaires;
}



function findComment(int $id){
  $pdo = getPdo();
  $query = $pdo->prepare('SELECT * FROM comments WHERE id = :id');
$query->execute(['id' => $id]);
$comment  = $query->fetch();
  return $comment;

}

function deleteComment(int $id){
  $pdo = getPdo();
  $query = $pdo->prepare('DELETE FROM comments WHERE id = :id');
$query->execute(['id' => $id]);

}

function insertComment(string $author, string $content, int $article_id): void {
  $pdo = getPdo();
$query = $pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
$query->execute(compact('author', 'content', 'article_id'));
}