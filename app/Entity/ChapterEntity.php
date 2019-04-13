<?php

namespace App\Entity;

use Core\Entity\Entity;

class ChapterEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=articles.chapter&id=' . $this->id;
    }
}