<?php

namespace App\Controllers;
use App\Models\User;
use App\Utils\DB;
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

    }

    /**
     * Retournera la vue d'édition d'un utilisateur
     * @param $id
     * @return void
     */
    public function edit($id)
    {
        $user = User::find($id);
        View::render('user-edit', 'admin', ['user' => $user]);
    }

    public function update($id)
    {
        $pdo = DB::getInstance();
        dd($id);
    }
}