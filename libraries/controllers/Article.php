<?php

namespace Controllers;

class Article extends Controller{

    protected $modelName = "\Models\Article";

    public function index(){

        $articles = $this->model->findAll("created_at ASC");

        $pageTitle = "Accueil";

        \Renderer::render("article/index", compact('pageTitle', 'articles'));

    }

    public function show(){

        $modelComment = new \Models\Comment();

        $article_id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $article_id = $_GET['id'];
        }

        $article = $this->model->find($article_id);
        if(!$article){
            die("L'article n'existe pas !");
        }

        $comments = $modelComment->findAllWithArticle($article_id);
        
        $pageTitle = $article['title'];

        \Renderer::render("article/show", compact('pageTitle', 'article', 'comments'));
    }

    public function delete(){

        $article_id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $article_id = $_GET['id'];
        } else {
            die("Aucun article n'a été précisé");
        }

        $article = $this->model->find($article_id);
        if(!$article){
            die("L'article n'existe pas");
        }

        $this->model->delete($article_id);

        \Http::redirect('index.php');

    }

}