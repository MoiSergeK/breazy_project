<div id="mailModal">
    <center>
        <div class="container">
            <button id="mailCloseBtn"><b>x</b></button>
            <h3 class="hr-bottom hr-dark text-left">Mail me</h3>
            <form method="post" action="/mail/add" name="save_project_form" enctype="multipart/form-data">
                <input placeholder="Your name..." name="name" required>
                <input placeholder="Your@email..." name="email" type="email" required>
                <textarea class="materialize-textarea" data-length="120" name="message" placeholder="Your message..." required></textarea>
                <input type="submit" value="Send" class="breazy-btn right">
            </form>
        </div>
    </center>
</div>