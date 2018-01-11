<?php $this->extends_layout('layouts/admin'); ?>

<br>
<div class="container">
    <?php for($i = 0; $i < count($this->tags); $i++) : ?>
        <div class="hr-top hr-dark">
            <div class="row">
                <div class="col s1">
                    <?= $i + 1 ?>
                </div>
                <div class="col s7">
                    <?= $this->tags[$i]->name ?>
                </div>
                <div class="col s4">
                    <a href="/admin/tags/delete/?id=<?= $this->tags[$i]->id ?>" data-method="delete">Delete</a>
                </div>
            </div>
        </div>
        <br>
    <?php endfor; ?>
    <h5>Add new tag:</h5>
    <form method="post" action="/admin/tags/add">
        <div class="row">
            <div class="col s11">
                <input placeholder="Tag name" name="tag">
            </div>
            <div class="col s1">
                <input type="submit" value="OK" class="btn right">
            </div>
        </div>
    </form>
</div>
