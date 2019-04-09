<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table
{
    protected $table = 'articles';

    /**
     * récupere les derniers article
     * @return array
     */

    public function last()
    {
        return $this->query("
            SELECT articles.id,articles.titre,articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date DESC");
    }

    /**
     * Récupère les dernieres article de la category demandée
     * @param $category_id
     * @return mixed
     */
    public function lastByCategory($category_id)
    {
        return $this->query("
            SELECT articles.id, articles.titre,articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.category_id = ?
            ORDER BY articles.date DESC
            ", [$category_id],);
    }

    /**
     * récupere un article en liant la categorie associée
     * @return \App\Entity\PostEntity
     */

    public function findlie($id)
    {
        return $this->query("
            SELECT articles.id, articles.titre,articles.contenu, articles.date, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.id = ?,[$id], true
           ");
    }
}