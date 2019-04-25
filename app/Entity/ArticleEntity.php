<?php

namespace App\Entity;


class articleEntity extends Entity
{
    public function getUrl()
    {
        return 'index.php?p=articles.show&id=' . $this->id;
    }

    public function getExtract()
    {
        $html = '<p>' . substr($this->content, 0, 300) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">voir la suite</a></p>';
        return $html;
    }

    public function getUrlForAdmin()
    {
        return 'index.php?p=admin.articles.show&id=' . $this->id;
    }

    public function getExtractForAdmin()
    {
        $html = '<p>' . substr($this->content, 0, 70) . '...</p>';
        $html .= '<p><a href="' . $this->getUrlForAdmin() . '">voir la suite</a></p>';
        return $html;
    }
}