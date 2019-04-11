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
            SELECT articles.id,articles.titre,articles.contenu, articles.date, articles.auteur, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            ORDER BY articles.date DESC LIMIT 0,2");
    }

    /**
     * Récupère les dernieres article de la category demandée
     * @param $category_id
     * @return mixed
     */
    public function lastByCategory($category_id)
    {
        return $this->query("
            SELECT articles.id, articles.titre,articles.contenu, articles.date,articles.auteur, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.category_id = ?
            ORDER BY articles.date DESC
            ", [$category_id]);
    }

    /**
     * récupere un article en liant la categorie associée
     * @return \App\Entity\PostEntity
     */

    public function findWithCategory($id)
    {
        return $this->query("
            SELECT articles.id, articles.titre,articles.contenu, articles.date ,articles.auteur, categories.titre as categorie
            FROM articles
            LEFT JOIN categories ON category_id = categories.id
            WHERE articles.id = ?", [$id], true
        );
    }
}