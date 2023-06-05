<?php

namespace App\Controllers;

use App\Models\Project;
use App\Utils\View;

class ProjectController
{
    public function index()
    {
        $projects = Project::all();
        View::render('project-index', 'main', [
            'projects' => $projects
        ]);
    }

    public function edit($id)
    {
        $project = Project::find($id);

        View::render('project-edit', 'main', [
            'project' => $project
        ]);
    }
}