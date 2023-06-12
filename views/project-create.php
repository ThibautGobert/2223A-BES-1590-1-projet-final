<div class="container">
    <form action="/project/store" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-4 mt-3">
                <label for="category_id" class="form-label">Catégorie</label>
                <select class="form-select" name="category_id" aria-label="Default select example">
                    <?php foreach (\App\Enums\Category::getList() as $item): ?>
                        <option value="<?= $item['id'] ?>" >
                            <?= $item['label'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-4 mt-3">
                <label for="title" class="form-label">Titre</label>
                <input id="title" name="title" type="text" class="form-control" value="">
            </div>
            <div class="col-4 mt-3">
                <label for="date" class="form-label">Date</label>
                <input id="date" name="date" type="datetime-local" class="form-control" value="">
            </div>
            <div class="col-12 mt-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" class="form-control" rows="10"></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="images" class="form-label">Ajouter des images</label>
                    <input class="form-control" type="file" id="images" name="images[]" multiple>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt-3 text-end">
                <button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
            </div>
        </div>
    </form>
</div>
