<?php

namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?posts.show&id=' . $this->id;
    }
    public function getExtrait()
    {
        $html = '<p>' . substr($this->contenu, 0 , 100) . '...</p>';
        $html .= '<p><a href="' . $this-> getUrl() . '">voir la suite</a></p>';
        return $html;

    }
}