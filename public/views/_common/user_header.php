<div class="content-box grey-dark-6 text-white shadow-bottom">
    <div class="row">
        <div class="col s6">
            <h4><?= $this->header ?></h4>
        </div>
        <div class="col s6 right-align">
            <a href="/projects/commercial"><button class="breazy-btn <?= $this->title === 'Home' ? 'breazy-btn-active' : ''; ?>">
                    Commercial projects</button></a>
            <a href="/projects/my"><button class="breazy-btn <?= $this->title === 'My Projects' ? 'breazy-btn-active' : ''; ?>">
                    My projects</button></a>
            <button class="breazy-btn">Mail Me</button>
        </div>
    </div>
</div>