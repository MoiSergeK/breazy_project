<html>
<head>
    <title><?= $this->title; ?></title>

    <?php $this->style('materialize.min', 'colors'); ?>

</head>
<body class="grey-dark-5 text-white valign-wrapper">
    <div class="container valign">
        <form method="post" action="/try_login">
            <div class="row">
                <div class="input-field">
                    <input placeholder="Login..." name="login" type="text" class="validate" required>
                    <input placeholder="Password..." name="password" type="text" class="validate" required>
                    <button class="btn right">Login</button>
                </div>
            </div>
        </form>
        <a href="/"><--Go Home</a>
    </div>
</body>
</html>