<?php
namespace Models;

use Models\Model;

class Comment extends Model
{
protected $table = "comments";
  public function findAllWithArticle(int $id): array
  {

    $query = $this->pdo->prepare("SELECT * FROM comments WHERE article_id = :article_id");
    $query->execute(['article_id' => $id]);
    $commentaires = $query->fetchAll();
    return $commentaires;
  }

  public function insert(string $author, string $content, int $article_id): void
  {

    $query = $this->pdo->prepare('INSERT INTO comments SET author = :author, content = :content, article_id = :article_id, created_at = NOW()');
    $query->execute(compact('author', 'content', 'article_id'));
  }
  public function find(int $id)
  {

    $query = $this->pdo->prepare('SELECT * FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
    $comment  = $query->fetch();
    return $comment;
  }
  public function delete(int $id)
  {

    $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id');
    $query->execute(['id' => $id]);
  }

 
}
