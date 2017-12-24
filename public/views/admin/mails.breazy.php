<?php $this->extends_layout('layouts/admin'); ?>

<br>
<div class="container">
    Found <span class="text-blue"><?= count($this->mails) ?></span> mail<?=count($this->mails) === 1 ? '' : 's'?>
    <?php foreach($this->mails as $mail) : ?>
        <div class="hr-top hr-dark">
            <div class="row">
                <div class="col s2">
                    <h5 class="text-grey">Name:</h5>
                </div>
                <div class="col s10">
                    <h5><?= $mail->name ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col s2">
                    <h5 class="text-grey">Email:</h5>
                </div>
                <div class="col s10">
                    <h5><?= $mail->email; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <span class="text-blue"><?= $mail->message; ?></span>
                </div>
            </div>
            <center><a href="/admin/mails/delete/?id=<?= $mail->id ?>" data-method="delete"><button class="breazy-btn roundedCloseBtn"><b>x</b></button></a></center>
        </div>
        <br>
    <?php endforeach; ?>
</div>
