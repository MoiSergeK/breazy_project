@extends(layouts/app)
<div id="contentBoxModal" class="relative">
    <button id="contentBoxCloseBtn">Close</button>
    <h1>asd</h1>
</div>
<div class="content-box">
    <div class="row">
        <div class="col l9 m8 s12">
            <div class="row">
                <%
                    for($i = 0; $i < 9; $i++){
                    <div class="col l4 m12 s12">
                        <div class="card blue-grey darken-4 white-text">
                            @img(bg.png)
                            <div class="content-box right-align">
                                @title http://facebook.com
                            </div>
                        </div>
                    </div>
                    }
                %>
            </div>
        </div>
        <div class="col l3 m4 s12 hr-left">
            <h5 class="text-grey">E-Mail:</h5>
            <h5><a href="mailto:moiserge.k@gmail.com">moiserge.k@gmail.com</a></h5>
            <h5 class="text-grey">Facebook:</h5>
            <h5><a href="https://www.facebook.com/profile.php?id=100001369132163" target="_blank">Serge Kovalev</a></h5>
        </div>
    </div>
</div>