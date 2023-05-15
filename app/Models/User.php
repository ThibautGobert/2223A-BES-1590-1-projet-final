<?php

namespace App\Models;

class User extends Model
{
    protected static string $table = 'users';
    public string $name;
    public string $firstname;
    public string $email;

    public function __construct(int $id = null)
    {

        parent::__construct($id);
    }

}