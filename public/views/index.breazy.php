<?php $this->extends_layout('layouts/app');?>

<div class="row" id="postsContentBox">
    <?php foreach($this->projects as $project):?>
        <div class="col l4 m12 s12">
            <div class="card blue-grey darken-4 white-text" id="<?= $project->id ?>">
                <?= $this->img($project->logo, ['class' => 'full-width']) ?>
                <div class="content-box right-align">
                    <?= $project->name; ?>
                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>