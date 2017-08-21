<html>
<head>
    <title>@title</title>
    @style(materialize.min, colors, style)
    @script(jquery-3.1.1.min, init)

</head>
<body class="grey-dark-5 text-white">
    <header>
        <div class="content-box grey-dark-6 text-white shadow-bottom">
            <div class="row">
                <div class="col s6">
                    <h4>@title</h4>
                </div>
                <div class="col s6 right-align">
                    <button>Mail Me</button>
                </div>
            </div>
        </div>
    </header>
    <main class="relative">
        @__CONTENT__
    </main>
    <footer>
        <div id="bottomBar" class="grey-dark-6 text-white">
            <div class="content-box grey-dark-6 text-white">
                <form name="bottom_bar_form">

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxBackEnd" name="backend"/>
                        <label for="CHBoxBackEnd">Back-End</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxJava" name="java"/>
                        <label for="CHBoxJava">Java</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxCSharp" name="csharp"/>
                        <label for="CHBoxCSharp">C#</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxPython" name="python"/>
                        <label for="CHBoxPython">Python</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxDjango" name="django"/>
                        <label for="CHBoxDjango">Django</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxAspNetMVC" name="aspnetmvc"/>
                        <label for="CHBoxAspNetMVC">ASP .Net MVC</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxPhp" name="php"/>
                        <label for="CHBoxPhp">Php</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxLaravel" name="laravel"/>
                        <label for="CHBoxLaravel">Laravel</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxYii2" name="yii2"/>
                        <label for="CHBoxYii2">Yii2</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxFrontEnd" name="frontend"/>
                        <label for="CHBoxFrontEnd">Front-End</label>
                    </span>

                    <span class="bottom-block">
                        <input type="checkbox" id="CHBoxJS" name="js"/>
                        <label for="CHBoxJS">JavaScript</label>
                    </span>
                </form>
            </div>
        </div>
    </footer>
</body>
</html>