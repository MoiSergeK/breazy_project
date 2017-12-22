<div class="content-box grey-dark-6 text-white shadow-bottom right-align">
    <a href="/admin"><button class="breazy-btn <?= $this->title === 'Главная' ? 'breazy-btn-active' : ''; ?>">
            Добавление проекта</button></a>
    <a href="/admin/add/tags"><button class="breazy-btn <?= $this->title === 'Tags' ? 'breazy-btn-active' : ''; ?>">
            Tags</button></a>
    <a href="/admin_projects"><button class="breazy-btn <?= $this->title === 'Все проекты' ? 'breazy-btn-active' : ''; ?>">
            Все проекты</button></a>
    <a href="/logout"><button class="breazy-btn">Log Out</button></a>
</div>