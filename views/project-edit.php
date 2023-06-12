<div class="container">
    <form action="/project/<?= $project->id ?>/update" method="post">
        <div class="row">
            <div class="col-4 mt-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <?php foreach (\App\Enums\Category::getList() as $item): ?>
                        <option value="<?= $item['id'] ?>"    <?= $item['id'] === $project->category_id ? 'selected' : null ?> >
                            <?= $item['label'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
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
                <textarea name="description" id="description" cols="30" class="form-control" rows="10"><?= $project->description ?></textarea>
            </div>
        </div>
        <div class="row">
            <?php foreach ($project->images() as $image): ?>
            <div class="col-2">
                <img class="img-fluid" src="<?= $image->path ?>" alt="<?= $image->name ?>">
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3 text-end">
                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
