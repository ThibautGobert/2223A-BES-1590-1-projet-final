<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Models\Project;
use App\Utils\Redirect;
use App\Utils\View;

class ProjectController
{
    public function index()
    {
        $projects = Project::all();
        View::render('project-index', 'main', [
            'projects' => $projects,
        ]);
    }

    public function edit($id)
    {
        $project = Project::find($id);

        View::render('project-edit', 'main', [
            'project' => $project
        ]);
    }

    public function update($id)
    {
        Project::update($id, [
            'title' => $_POST['title'] ?? null,
            'description' => $_POST['description'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        Redirect::to('/project/index', [
            'success' => 'Projet mis à jour avec succès !'
        ]);
    }

    public function create()
    {
        View::render('project-create', 'main');
    }

    public function store()
    {
        Project::create([
            'title' => $_POST['title'] ?? null,
            'description' => $_POST['description'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        Redirect::to('/project/index', [
            'success' => 'Projet créé avec succès !'
        ]);
    }
}