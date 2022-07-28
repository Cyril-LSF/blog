<?php

namespace Controllers;

class Comment extends Controller{

    protected $modelName = "\Models\Comment";

    public function insert(){

        $author = null;
        if(!empty($_POST['author'])){
            $author = $_POST['author'];
        } else {
            die("L'auteur n'a pas été précisé !");
        }

        $content = null;
        if(!empty($_POST['content'])){
            $content = htmlspecialchars($_POST['content']);
        } else {
            die("Le contenu n'a pas été précisé !");
        }

        $article_id = null;
        if(!empty($_POST['article_id']) && ctype_digit($_POST['article_id'])){
            $article_id = $_POST['article_id'];
        } else {
            die("L'article n'existe pas !");
        }

        $this->model->insert($author, $content, $article_id);

        \Http::redirect("index.php?controller=article&task=show&id=".$article_id);

    }

    public function delete(){

        $modelArticle = new \Models\Article();

        $comment_id = null;
        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){
            $comment_id = $_GET['id'];
        } else {
            die("Le commentaire n'a pas été précisé");
        }

        $comment = $this->model->find($comment_id);
        if(!$comment){
            die("Le commentaire n'existe pas !");
        }

        $article = $modelArticle->find($comment['article_id']);
        if(!$article){
            die("L'article auquel le commentaire est rattaché n'existe pas !");
        }

        $this->model->delete($comment_id);

        \Http::redirect("index.php?controller=article&task=show&id=".$article['id']);

    }

}