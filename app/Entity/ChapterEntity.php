<?php

namespace App\Entity;

class ChapterEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=articles.chapter&id=' . $this->id;
    }
}