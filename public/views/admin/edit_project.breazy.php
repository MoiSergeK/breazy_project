<?php $this->extends_layout('layouts/admin'); ?>

<div class="container">
    <form method="post" action="/admin/save_project" name="save_project_form" enctype="multipart/form-data">
        <input id="addProjectFormTitle" placeholder="Название проекта" name="name" value="<?= $this->project->name ?>">
        <select name="type">
            <option disabled selected>Тип проекта</option>
            <option value="commercial" <?= $this->project->type === 'commercial' ? 'selected' : ''?>>Commercial</option>
            <option value="own" <?= $this->project->type === 'own' ? 'selected' : ''?>>Own</option>
        </select>
        <br>
        Тэги:
        <br><br>
        <? foreach ($this->tags as $tag) : ?>
            <span class="bottom-block">
                <input type="checkbox" id="CHBox<?= $tag->name ?>" name="tags[]" value="<?= $tag->name ?>"
                    <?=in_array($tag->name, $this->project->tags) ? 'checked' : ''?>/>
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
                <input class="file-path validate" placeholder="Прикрепите фото">
            </div>
        </div>
        <textarea class="materialize-textarea" data-length="120" name="description"><?= $this->project->description ?></textarea>
        <input type="submit" value="Сохранить" class="breazy-btn right">
    </form>
</div>