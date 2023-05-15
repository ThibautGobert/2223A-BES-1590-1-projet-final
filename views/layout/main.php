<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title><?= $title ?? 'Une page' ?></title>
</head>
<body>
<div id="app" class="d-flex flex-column min-vh-100">
    <div>
        <?php include __DIR__ . '/includes/nav.php'; ?>
    </div>
    <div class="flex-grow-1">
        <?php if(isset($_SESSION['error'])): ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <?= $_SESSION['error'] ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['success'])): ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success">
                            <?= $_SESSION['success'] ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?= $contenu ?>
    </div>
    <div>
        <?php include __DIR__ . '/includes/footer.php'; ?>
    </div>
</div>
</body>
</html>