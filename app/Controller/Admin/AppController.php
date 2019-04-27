<?php

namespace App\Controller\Admin;

use \App;
use App\Database\Auth\DBAuth;

class AppController extends \App\Controller\AppController
{
    protected $errorSizeMax = '<script type="text/javascript">' . 'alert("Erreur : La taille maximum de caractere a etait depassé");' . '</script>';
    protected $errorSizeMin = '<script type="text/javascript">' . 'alert("Erreur : Il vous faut entrer au moin 3 caractere");' . '</script>';
    protected $missCase = '<script type="text/javascript">' . 'alert("Erreur : Un champ n\'a pas etait remplit");' . '</script>';
    protected $numberExist = '<script type="text/javascript">' . 'alert("Erreur : Le numero de l\'article existe deja")'.'</script>';


    public function __construct()
    {
        parent::__construct();
        //Auth
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if (!$auth->logged()) {
            $this->forbidden();
        }
    }
}