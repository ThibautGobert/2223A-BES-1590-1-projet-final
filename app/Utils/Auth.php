<?php

namespace App\Utils;

use App\Models\User;

class Auth
{
    public static function getUser()
    {
        if(isset($_SESSION['user'])) {
            $user = new User();
            $user->id = $_SESSION['user']['id'];
            $user->name = $_SESSION['user']['name'];
            $user->firstname = $_SESSION['user']['firstname'];
            $user->email = $_SESSION['user']['email'];
            $user->password = $_SESSION['user']['password'];
            return $user;
        }
        return null;
    }

    public static function setUser(User|null $user = null) {
        if($user) {
            $_SESSION['user']['id'] = $user->id;
            $_SESSION['user']['name'] = $user->name;
            $_SESSION['user']['firstname'] = $user->name;
            $_SESSION['user']['email'] = $user->email;
            $_SESSION['user']['password'] = $user->password;
        }else {
            $_SESSION['user'] = null;
        }
    }
}