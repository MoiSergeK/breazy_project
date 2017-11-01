<html>
<head>
    <title><?= $this->title ?></title>
    <?= $this->style('materialize.min', 'style', 'colors') ?>
    <?= $this->script('jquery-3.1.1.min', 'materialize.min', 'init') ?>

</head>
<body class="grey-dark-5 text-white">
<header class="hr-bottom hr-dark">
    <h5><?= $this->title ?></h5>
</header>
<main>
    <div class="content-box">
        <table>
            <thead>
                <th>MESSAGE</th>
                <th>DATE</th>
            </thead>
            <tbody>
                <?php foreach($this->logs as $log):?>
                    <tr>
                        <td><?= $log->msg; ?></td>
                        <td><?= $log->date; ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</main>
</body>
</html>