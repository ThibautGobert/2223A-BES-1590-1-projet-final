<div class="container">
    <form action="/project/<?= $project->id ?>/update" method="post">
        <div class="row">
            <div class="col-4 mt-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <input id="category_id" name="category_id" type="text" class="form-control" value="<?= $project->category_id ?>">
            </div>
            <div class="col-4 mt-3">
                <label for="title" class="form-label">Titre</label>
                <input id="title" name="title" type="text" class="form-control" value="<?= $project->title ?>">
            </div>
            <div class="col-4 mt-3">
                <label for="date" class="form-label">Date</label>
                <input id="date" name="date" type="datetime-local" class="form-control" value="<?= $project->date ?>">
            </div>
            <div class="col-12 mt-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" class="form-control" rows="10">
                    <?= $project->description ?>
                </textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3 text-end">
                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
