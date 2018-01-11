<?php $this->extends_layout('layouts/admin'); ?>

<br>
<div class="container">
    <h5>Всего проектов: <b><?= count($this->projects) ?></b></h5>
    <br><br>
    <?php foreach($this->projects as $project) : ?>
        <div class="row">
            <div class="col s4">
                <?= $this->img($project->logo) ?>
            </div>
            <div class="col s8">
                <h4><?= $project->name; ?></h4>
                <?= $project->description; ?>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <a href="/admin/projects/edit?id=<?= $project->id; ?>" class="btn-large waves-effect yellow darken-4 right">Edit</a>
                <a href="/admin/projects/delete?id=<?= $project->id; ?>" data-method="delete" class="btn-large waves-effect red darken-4 right admin-delete-project-btn">Delete</a>
            </div>
        </div>
        <br>
    <?php endforeach; ?>
</div>
