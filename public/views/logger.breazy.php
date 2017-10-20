<html>
<head>
    <title><?= $this->title ?></title>
    <?= $this->style('materialize.min', 'style', 'colors') ?>
    <?= $this->script('jquery-3.1.1.min', 'materialize.min', 'init') ?>

</head>
<body class="grey-dark-5 text-white">
<header>
    <h1><?= $this->title ?></h1>
</header>
<main>
    <div class="content-box">
        <?php foreach($this->logs as $log):?>
            <?= $log->message; ?>
            <br>
        <?php endforeach ?>
    </div>
</main>
</body>
</html>