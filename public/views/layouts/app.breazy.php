<html>
<head>
    <title><?= $this->title ?></title>
    <?= $this->style('materialize.min', 'style', 'colors') ?>
    <?= $this->script('jquery-3.1.1.min', 'materialize.min', 'Modal', 'CardInfoModal', 'MailModal', 'app') ?>

</head>
<body class="grey-dark-5 text-white">
    <?= $this->render_partial('/_modals/mail.php'); ?>
    <?= $this->render_partial('/_modals/show_project_details.php'); ?>
    <header>
        <?= $this->render_partial('_common/user_header.php'); ?>
    </header>
    <main>
        <div class="content-box">
            <div class="content-box hr-bottom hr-dark">
                Totally found <b class="text-blue" id="projectsCounter"><?= count($this->projects); ?></b> projects
            </div>
            <br>
            <div>
                __CONTENT__
            </div>
        </div>
    </main>
    <footer>
        <?= $this->render_partial('_common/footer.php'); ?>
    </footer>
</body>
</html>