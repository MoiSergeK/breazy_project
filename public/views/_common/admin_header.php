<div class="content-box grey-dark-6 text-white shadow-bottom right-align">
    <a href="/admin"><button class="breazy-btn <?= $this->title === 'Main' ? 'breazy-btn-active' : ''; ?>">
            Add project</button></a>
    <a href="/admin/tags"><button class="breazy-btn <?= $this->title === 'Tags' ? 'breazy-btn-active' : ''; ?>">
            Tags</button></a>
    <a href="/admin/projects"><button class="breazy-btn <?= $this->title === 'All projects' ? 'breazy-btn-active' : ''; ?>">
            All projects</button></a>
    <a href="/admin/mails"><button class="breazy-btn <?= $this->title === 'Mails' ? 'breazy-btn-active' : ''; ?>">
            Mails</button></a>
    <a href="/logout"><button class="breazy-btn">Log Out</button></a>
</div>