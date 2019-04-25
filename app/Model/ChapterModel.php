<?php

namespace App\Model;

class
ChapterModel extends Model
{
    protected $table = "chapters";

    public function allChapters()
    {
        return $this->query("
            SELECT Chapters.title,Chapters.number, articles.title as article
            FROM Chapters
            LEFT JOIN articles ON articles_id = articles.id
            ORDER BY Chapters.number DESC");
    }

    public function idExist($id)
    {
        $exist = $this->query("SELECT chapters.id FROM chapters WHERE id = ?", [$id]);
        if (empty($exist)) {
            return $this->notFound();
        }
    }
}