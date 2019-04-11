<?php

namespace App\Table;

use Core\Table\Table;

class CommentTable extends Table
{
    protected $table = 'commentaires';

    public function getComments($postId)
    {
        return $this->query('
            SELECT commentaires.id , commentaires.auteur, commentaires.contenu, commentaires.date
            FROM commentaires 
            WHERE article_id = ? 
            ORDER BY commentaires.date DESC',[$postId]
        );
    }

    public function getComment($commentId)
    {
        return $this->query('
            SELECT commentaires.id, commentaires.auteur, commentaires.contenu, commentaires.date
            FROM commentaires
            WHERE article_id = ?',[$commentId]
        );


    }
}