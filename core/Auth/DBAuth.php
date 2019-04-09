<?php

namespace Core\Auth;

use Core\Database\MysqlDatabase;

class DBAuth
{
    private $db;

    public function __construct(MysqlDatabase $db)
    {
        $this->db = $db;

    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($username, $password)
    {
        $user = $this->db->prepare( 'SELECT * FROM users WHERE username = ?', [$username], null, true );
        if ($user) {
            if($user->password === sha1( $password )){
                $_SESSION['auth'] = $user->id;
                return true;
            }
        }
        return false;

    }

    public function logged()
    {
        return isset( $_SESSION['auth'] );
    }

    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

}