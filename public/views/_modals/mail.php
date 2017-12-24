<div id="mailModal">
    <center>
        <div class="container">
            <button id="mailCloseBtn"><b>x</b></button>
            <h3 class="hr-bottom hr-dark text-left">Mail me</h3>
            <form method="post" action="/addmail" name="save_project_form" enctype="multipart/form-data">
                <input placeholder="Your name..." name="name">
                <input placeholder="Your@email..." name="email">
                <textarea class="materialize-textarea" data-length="120" name="message" placeholder="Your message..."></textarea>
                <input type="submit" value="Send" class="breazy-btn right">
            </form>
        </div>
    </center>
</div>