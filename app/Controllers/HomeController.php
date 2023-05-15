<?php

namespace App\Controllers;
use App\Utils\Auth;
use App\Utils\View;

class HomeController
{
    public function index()
    {
        //fonction qui va retourner la vue index
        View::render('index');
    }
}