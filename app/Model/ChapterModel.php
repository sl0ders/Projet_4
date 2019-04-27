<?php

namespace App\Model;

class
ChapterModel extends Model
{
    protected $table = "chapters";

    public function allChapters()
    {
        return $this->query("
            SELECT chapters.title,chapters.number, articles.title as article
            FROM chapters
            LEFT JOIN articles ON articles_id = articles.id
            ORDER BY chapters.number DESC");
    }

    public function idExist($id)
    {
        $exist = $this->query("SELECT chapters.id FROM chapters WHERE id = ?", [$id]);
        if (empty($exist)) {
            return $this->notFound();
        }
    }

    public function numberExist($number)
    {
        $exist = $this->query("
            SELECT EXISTS(
                SELECT chapters.number 
                FROM chapters 
                WHERE chapters.number = ?) AS numberExist",
            [$number], true);
        if ($exist->numberExist > 0) {
            return false;
        } else {
            return true;
        }
    }
}