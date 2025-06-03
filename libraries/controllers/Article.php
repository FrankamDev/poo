<?php

namespace Controllers;

require_once('./libraries/Renderer.php');

use Libraries\Renderer;

require_once('./libraries/controllers/Controller.php');
require_once('./libraries/models/Article.php');
require_once('./libraries/models/Comment.php');




class Article extends Controller
{
protected $modelName = \Models\Article::class;

  public function index() {
    $articles = $this->model->findAll("created_at DESC");

    $pageTitle = "Accueil";

    \Renderer::render('articles/index', compact('pageTitle', 'articles'));
  }
  public function show(){
    $article_id = null;
    
    $commentModel = new \Models\Comment();
    if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
      $article_id = $_GET['id'];
    }

    if (!$article_id) {
      die("Vous devez préciser un paramètre `id` dans l'URL !");
    }

    $article = $this->model->find($article_id);

    $commentaires = $commentModel->findAllWithArticle($article_id);


    $pageTitle = $article['title'];

    \Renderer::render('articles/show', compact('pageTitle', 'article', 'commentaires', 'article_id'));
  }
  public function delete() {
    if (empty($_GET['id']) || !ctype_digit($_GET['id'])) {
      die("Ho ?! Tu n'as pas précisé l'id de l'article !");
    }

    $id = $_GET['id'];

    /**  
     * 3. Vérification que l'article existe bel et bien
     */
    $article = $this->model->find($id);

    if (!$article) {
      die("L'article $id n'existe pas, vous ne pouvez donc pas le supprimer !");
    }

    $this->model->delete($id);
    \Http::redirect('index.php');
  }
}
