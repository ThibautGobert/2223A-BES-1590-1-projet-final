<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table-striped table table-bordered">
                <thead>
                <tr>
                    <td>ID</td>
                    <td>Nom</td>
                    <td>Prénom</td>
                    <td>Email</td>
                    <td>Actions</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->firstname ?></td>
                    <td><?= $user->email ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="/user/<?= $user->id ?>/edit">
                            <i class="fa fa-edit me-3"></i>Editer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
