<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="public/styles/main.css">
    <link rel="stylesheet" href="public/styles/normalize.css">
    <link rel="stylesheet" href="public/styles/fontawesome.css">
    <?= $style ?>
</head>
<body>
    <header class="site-header">
        <?php require_once "app/views/layouts/{$header}-header.php" ?>
    </header>
    <main class="container">
        <?= $content ?>
    </main>
    <footer class="site-footer">

    </footer>
</body>
</html>
