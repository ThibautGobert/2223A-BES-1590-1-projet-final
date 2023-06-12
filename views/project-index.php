<div class="container">
    <div class="row">
        <div class="col-md-12 text-end my-3">
            <a href="/project/create" class="btn btn-sm btn-success">
                <i class="fa fa-plus me-2"></i>Créer un nouveau projet
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table-striped table table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Titre</td>
                    <td>Date</td>
                    <td>Catégorie</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->id ?></td>
                    <td><?= $project->title ?></td>
                    <td><?= $project->date ?></td>
                    <td><?= \App\Enums\Category::getDescription($project->category_id) ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/project/<?= $project->id ?>/edit">
                            <i class="fa fa-edit me-3"></i>Editer
                        </a>
                        <a class="btn btn-danger btn-sm" href="/project/<?= $project->id ?>/delete">
                            <i class="fa fa-times me-3"></i>Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
