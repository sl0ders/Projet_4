<?php

namespace App\Model;

use Core\Table\Table;

class CommentModel extends Table
{
    protected $table = 'comments';

    public function getComments($articleId)
    {
        return $this->query('
            SELECT comments.id , comments.author, comments.content, comments.date
            FROM comments 
            WHERE article_id = ? 
            ORDER BY comments.date DESC', [$articleId]
        );
    }

    public function getComment($commentId)
    {
        return $this->query('
            SELECT comments.id, comments.author, comments.content, comments.date
            FROM comments
            WHERE article_id = ?', [$commentId]
        );
    }

    public function last()
    {
        return $this->query("
            SELECT comments.id, comments.author ,comments.content, comments.date, articles.title as article
            FROM comments
            LEFT JOIN articles ON article_id = articles.id
            ORDER BY comments.date DESC");
    }
}