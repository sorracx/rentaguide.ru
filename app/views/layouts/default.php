<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/public/styles/main.css">
    <link rel="stylesheet" href="/public/styles/normalize.css">
    <link rel="stylesheet" href="/public/styles/fontawesome.css">
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
    <script src="/public/scripts/jquery.js"></script>
    <script src="/public/scripts/form.js"></script>
    <script src="/public/scripts/main.js"></script>
</body>
</html>
