<?php

namespace Models;

abstract class Model {

    protected $pdo;
    protected $table;

    public function __construct(){
        $this->pdo = \Database::getPdo();
    }

    /**
     * return the database table list
     *
     * @param string|null $order
     * @return array
     */
    public function findAll(?string $order): array{

        $sql = ("SELECT * FROM {$this->table}");
        if($order){
            $sql .= " ORDER BY " . $order;
        }

        $results = $this->pdo->query($sql);
        $items = $results->fetchAll();

        return $items;

    }

    /**
     * return one item of database table
     *
     * @param integer $id
     */
    public function find(int $id){

        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);

        $item = $query->fetch();

        return $item;

    }

    /**
     * Delete one item of database table
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void{

        $query = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);

    }

}