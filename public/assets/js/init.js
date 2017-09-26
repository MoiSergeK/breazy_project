var filters = []

$(document).ready(function(){
    let h = parseInt($('body').css('height')) - ( parseInt($('footer').css('height')) +
        parseInt($('header').css('height')) ) + 'px';

    initMaterializeComponents();
    setEvents();
});

function initMaterializeComponents(){
    $('select').material_select();
}

function setEvents(){
    applyFilterEvent();

    cardClickEvent();

    contentCloseBtnEvent();
}

function applyFilterEvent(){
    $('form[name=bottom_bar_form] input').on('click', function(){
        if($(this).is(":checked")){
            filters.push($(this).attr("name"));
        }
        else{
            filters.splice(filters.indexOf($(this).attr("name"), 1));
        }
        let data = { "filters" : filters.join(',') };

        $('#postsContentBox').fadeOut('fast').promise().done(function(){
            $.post("/apply_filters", data, function(response){
                let data = JSON.parse(response);
                $('#projectsCounter').text(data.length);
                let content = '';
                for(let project of data){
                    content += "<div class=\"col l4 m12 s12\">\n" +
                        "                        <div class=\"card blue-grey darken-4 white-text\" id=\"" + project['id'] + "\">\n" +
                        "                            <img src='public/files/img/" + project['logo'] + "' class=\"full-width\">\n" +
                        "                            <div class=\"content-box right-align\">\n" +
                        "                                " + project['name'] + "\n" +
                        "                            </div>\n" +
                        "                        </div>\n" +
                        "                    </div>";
                }
                $('#postsContentBox').html(content);
                cardClickEvent();
            }).promise().done(function () {
                $('#postsContentBox').fadeIn('fast');
            });
        });
    });
}

function cardClickEvent() {
    $('.card').on('click', function(){
        openContentBoxModal($(this).attr('id'));
    });
}

function contentCloseBtnEvent(){
    $('#contentBoxCloseBtn').on('click', function(){
        closeContentBoxModal();
    });
}

function openContentBoxModal(id){
    $.post('/get_card_info', {id: id}, function(response){
        let data = JSON.parse(response);
        $('#contentBoxModalTitle').text(data['name']);
        $('#contentBoxModalDescription').text(data['description']);
        $('#contentBoxModalImg').attr('src', data['logo']);
        let tags = '';
        for(let tag of data['tags']){
            tags += "<i class='text-blue'><u>" + tag['name'] + "</u></i> ";
        }
        $('#contentBoxModalTags').html(tags);
        $('body').css('overflow', 'hidden');
        $('#contentBoxModal').fadeIn('fast');
    });
}

function closeContentBoxModal(){
    $('body').css('overflow', 'auto');
    $('#contentBoxModal').fadeOut('fast');
}