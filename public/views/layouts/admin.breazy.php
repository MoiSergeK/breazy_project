<html>
<head>
    <title>Админская | <?= $this->title ?></title>
    <?= $this->style('materialize.min', 'colors', 'style') ?>
    <?= $this->script('jquery-3.1.1.min', 'materialize.min', 'init') ?>
</head>
<body class="grey-dark-5 text-white">
<header>
    <?= $this->render_partial('_common/admin_header.php'); ?>
</header>
<main>
    __CONTENT__
</main>
<footer>

</footer>
</body>
</html>