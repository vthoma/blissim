<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Test Blissim</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container text-center">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Blissim</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                    </ul>
                    <span class="navbar-text">
                        <?php if (isset($_SESSION['name'])) {
                            echo $_SESSION['name'].' ';
                            echo '| <a href="/logout">Logout</a>';
                        } else {
                            echo "<a href='/login'>Login</a>";
                        } ?>
                    </span>
                </div>
            </div>
        </nav>
        <?php if (!empty($_SESSION['errors'])) : ?>
            <?php foreach ($_SESSION['errors'] as $errors): ?>
                <?php foreach ($errors as $error): ?>
                    <div class="alert alert-warning" role="alert">
                        <?= $error ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php unset($_SESSION['errors']) ?>

        <?= $content ?>
    </div>
</body>
</html>