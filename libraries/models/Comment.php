<?php

namespace Models;

class Comment extends Model{

    protected $table = "comments";

    /**
     * Return all comments with id article
     *
     * @param integer $id
     */
    public function findAllWithArticle(int $id){

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE article_id = :id");
        $query->execute(['id' => $id]);

        $items = $query->fetchAll();

        return $items;

    }

    /**
     * Insert new comment in comment table 
     *
     * @param string $author
     * @param string $content
     * @param integer $article_id
     * @return void
     */
    public function insert(string $author, string $content, int $article_id): void{

        $query = $this->pdo->prepare("INSERT INTO {$this->table} SET author = :author, content = :content, article_id = :article_id, created_at = NOW()");
        $query->execute(compact('author', 'content', 'article_id'));

    }

}