<?php

namespace App\Model;

use App\Entity\ArticleEntity;

class ArticleModel extends Model
{
    protected $table = 'articles';

    public function idExist($id)
    {
        $exist = $this->query("SELECT articles.id FROM articles WHERE id = ?", [$id]);
        if (empty($exist)) {
            return $this->notFound();
        }
    }

    /**
     * récupere les derniers article
     * @return array
     */
    public function allArticles()
    {
        return $this->query("
            SELECT articles.id,articles.number,articles.title,articles.content, DATE_FORMAT(articles.date,'%d/%m/%Y à %Hh%imin') AS date_fr, articles.title, chapters.title as Chapter
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.number
            ORDER BY articles.number");
    }

    public function numberExist($number)
    {
        $exist = $this->query("
            SELECT EXISTS(
                SELECT articles.number 
                FROM articles 
                WHERE articles.number = ?) AS numberExist",
            [$number], true);
        if ($exist->numberExist > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Récupère les dernieres article de la chapter demandée
     * @param $chapter_id
     * @return mixed
     */
    public function lastByChapter($chapter_id)
    {
        return $this->query("
            SELECT articles.id, articles.title,articles.content, DATE_FORMAT(articles.date,'%d/%m/%Y à %Hh%imin') AS date_fr,
                    (SELECT count(*) 
                    FROM comments 
                    WHERE comments.article_id = articles.id) AS nb_com,
                    chapters.title as chapter,  
                    chapters.number as chapterNumber
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            WHERE articles.chapter_id = ?
            ORDER BY date_fr DESC
            ", [$chapter_id]);
    }

    /**
     * retrieves an article by linking the associated chapter
     * @param $id
     * @return articleEntity
     */
    public function findWithChapter($id)
    {
        return $this->query("
            SELECT articles.id, articles.title,articles.content, DATE_FORMAT(articles.date,'%d/%m/%Y à %Hh%imin') AS date_fr, chapters.title as Chapter
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            WHERE articles.id = ?", [$id], true
        );
    }


    /** get all the articles + an count on all the comments "nb_com" + a link chapter.title + a link chapter.number + sorted by articles.id
     * @return array|bool|false|mixed|\PDOStatement
     */
    public function countCommentsForArticle()
    {
        return $this->query("
            SELECT articles.number, articles.id, articles.publish,articles.title,articles.content, DATE_FORMAT(articles.date,'%d/%m/%Y à %Hh%imin') AS date_fr,
                   (SELECT count(*) 
                    FROM comments 
                    WHERE comments.article_id = articles.id) AS nb_com,
                    chapters.title as Chapter,  
                    chapters.number as chapterNumber
            FROM articles 
            LEFT JOIN chapters ON chapter_id = chapters.id
            group by articles.id ORDER BY articles.number
            ");
    }

    public function checked()
    {
        return $this->query("
        SELECT articles.id,
               articles.title,
               articles.content,
               DATE_FORMAT(articles.date,'%d/%m/%Y à %Hh%imin') AS date_fr,
               (SELECT count(*) 
                    FROM comments 
                    WHERE comments.article_id = articles.id) AS nb_com,  
                    chapters.title as Chapter,  
                    chapters.number as chapterNumber
            FROM articles
            LEFT JOIN chapters ON chapter_id = chapters.id
            WHERE articles.publish = 1
        ");
    }


    public function deleteArtCom($id)
    {
        $this->query('DELETE FROM comments WHERE article_id = ?', [$id]);
        $this->query('DELETE FROM articles WHERE id = ?', [$id]);
    }


}