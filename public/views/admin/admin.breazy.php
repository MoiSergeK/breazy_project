<?php $this->extends_layout('layouts/admin'); ?>

<div class="container">
    <form method="post" action="/admin/projects/add" name="add_project_form" enctype="multipart/form-data">
        <input id="addProjectFormTitle" placeholder="Project name" name="name">
        <select name="type">
            <option disabled selected>Project type</option>
            <option value="commercial">Commercial</option>
            <option value="own">Own</option>
        </select>
        <br>
        Tags:
        <br><br>
        <? foreach ($this->tags as $tag) : ?>
            <span class="bottom-block">
                <input type="checkbox" id="CHBox<?= $tag->name ?>" name="tags[]" value="<?= $tag->name ?>"/>
                <label for="CHBox<?= $tag->name ?>"><?= $tag->name ?></label>
            </span>
        <? endforeach; ?>
        <br><br><br>
        <div class="file-field input-field">
            <div class="btn">
                <span>File</span>
                <input type="file" name="file" multiple>
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" placeholder="Pin photo">
            </div>
        </div>
        <textarea class="materialize-textarea" data-length="120" name="description" placeholder="Description..."></textarea>
        <input type="submit" value="OK" class="breazy-btn right">
    </form>
</div>