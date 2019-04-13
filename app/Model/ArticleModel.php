<?php

namespace App\Model;

use App\Entity\articleEntity;
use Core\Table\Table;

class articleModel extends Table
{
    protected $table = 'articles';

    /**
     * récupere les derniers article
     * @return array
     */
    public function lastArticle()
    {
        return $this->query("
            SELECT articles.id,articles.title,articles.content, articles.date, chapters.title as Chapter
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            ORDER BY articles.date DESC LIMIT 0,2");
    }

    public function allArticle()
    {
        return $this->query("
            SELECT articles.id,articles.title,articles.content, articles.date, chapters.title as Chapter
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            ORDER BY articles.date DESC");
    }

    /**
     * Récupère les dernieres article de la chapter demandée
     * @param $chapter_id
     * @return mixed
     */
    public function lastByChapter($chapter_id)
    {
        return $this->query("
            SELECT articles.id, articles.title,articles.content, articles.date, chapters.title as Chapter
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            WHERE articles.chapter_id = ?
            ORDER BY articles.date DESC
            ", [$chapter_id]);
    }

    /**
     * récupere un article en liant le chapitre associée
     * @param $id
     * @return articleEntity
     */

    public function findWithChapter($id)
    {
        return $this->query("
            SELECT articles.id, articles.title,articles.content, articles.date , chapters.title as Chapter
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            WHERE articles.id = ?", [$id], true
        );
    }
}