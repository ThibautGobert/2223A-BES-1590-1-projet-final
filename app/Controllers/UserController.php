<?php

namespace App\Controllers;
use App\Models\User;
use App\Utils\DB;
use App\Utils\Redirect;
use App\Utils\View;

class UserController
{
    /**
     * Retournera la vue d'index des utilisateurs
     * @return void
     */
    public function index()
    {
        //fonction qui va retourner la vue index
        $users = User::all();
        View::render('user-index', 'main', ['users' => $users]);
    }

    /**
     * Retournera la vue d'édition d'un utilisateur
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $user = User::find($id);
        View::render('user-edit', 'main', ['user' => $user]);
    }

    public function update($id)
    {
        $pdo = DB::getInstance();
        $user = User::find($id);

        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $email = $_POST['email'];

        if(isset($_POST['password']) && isset($_POST['password_confirm'])) {
            if($_POST['password'] !== $_POST['password_confirm']) {
                Redirect::to('/user/'.$user->id.'/edit', [
                    'error' => 'Le mot de passe et le mote de passe de confirmation doivent être identique !'
                ]);
            }
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }else {
            $password = $user->password;
        }
        User::update($user->id,[
            'name' => $name,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $password
        ]);

        Redirect::to('/user/index', [
            'success' => 'Utilisateur mis à jour avec succès !'
        ]);
    }
}