<?php


namespace App\Entity;


class CommentEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=comments.reports&id=' . $this->id;
    }
}