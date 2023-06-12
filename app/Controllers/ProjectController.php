<?php

namespace App\Controllers;

use App\Enums\Category;
use App\Models\Image;
use App\Models\Project;
use App\Utils\File;
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
        //dd(File::cleanUpload($_FILES['images']));
        $project = Project::create([
            'title' => $_POST['title'] ?? null,
            'description' => $_POST['description'] ?? null,
            'category_id' => $_POST['category_id'] ?? null,
            'date' => $_POST['date'] ?? null,
        ]);

        $this->handleImages($project);

        Redirect::to('/project/index', [
            'success' => 'Projet créé avec succès !'
        ]);
    }

    public function delete($id)
    {
        Project::delete($id);
        Redirect::to('/project/index', [
            'success' => 'Projet supprimé avec succès !'
        ]);
    }

    private function handleImages(Project $project)
    {
        $images = File::cleanUpload($_FILES['images']);

        foreach($images as $image) {
            //vérification si on a bien une image
            if(!empty($image['name']) && $image['tmp_name']) {
                $path = '/images/'.$project->id.'/'.$image['name'];
                if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/images/'.$project->id.'/')) {
                    mkdir($_SERVER['DOCUMENT_ROOT'].'/images/'.$project->id.'/', 0777, true);
                }
                file_put_contents($_SERVER['DOCUMENT_ROOT'].$path, file_get_contents($image['tmp_name']));
                Image::create([
                    'path' => $path,
                    'name' => $image['name'],
                    'project_id' => $project->id,
                ]);
            }
        }
    }

}