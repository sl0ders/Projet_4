<?php

namespace App\Model;

class CommentModel extends Model
{
    protected $table = 'comments';

    public function getComments()
    {
        return $this->query("SELECT * FROM comments");
    }

    public function getComment($commentId)
    {
        return $this->query('
            SELECT comments.id, comments.author, comments.content, DATE_FORMAT(comments.date,\'%d/%m/%Y à %Hh%imin%ss\') AS date_fr
            FROM comments
            WHERE article_id = ?', [$commentId]
        );
    }

    public function last()
    {
        return $this->query("
            SELECT comments.id, comments.author,comments.report, comments.parent_id,comments.content, DATE_FORMAT(comments.date,'%d/%m/%Y à %Hh%imin%ss') AS date_fr, articles.title as article
            FROM comments
            LEFT JOIN articles ON article_id = articles.id
            ORDER BY comments.date DESC
        ");
    }

    public function updateReportUp($id){
        return $this->query("UPDATE comments SET comments.report = comments.report + 1 WHERE id = ?", [$id], true);
    }

    public function updateReportDown($id){
        return $this->query("UPDATE comments SET comments.report = comments.report - 1 WHERE id = ?", [$id], true);
    }
}
