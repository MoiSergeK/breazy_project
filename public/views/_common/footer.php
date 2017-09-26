<div id="bottomBar" class="grey-dark-6 text-white">
    <div class="content-box grey-dark-6 text-white">
        <form name="bottom_bar_form">
            <? foreach ($this->tags as $tag) : ?>
                <span class="bottom-block">
                            <input type="checkbox" id="CHBox<?= $tag->name ?>" name="<?= $tag->name ?>"/>
                            <label for="CHBox<?= $tag->name ?>"><?= $tag->name ?></label>
                        </span>
            <? endforeach; ?>
        </form>
    </div>
</div>