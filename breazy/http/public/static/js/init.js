var filters = []

$(document).ready(function(){
    let h = parseInt($('body').css('height')) - ( parseInt($('footer').css('height')) +
        parseInt($('header').css('height')) ) + 'px';
    $('#contentBoxModal').css('height', h);

    setEvents();
});

function setEvents(){
    $('form[name=bottom_bar_form] input').on('click', function(){
        if($(this).is(":checked")){
            filters.push($(this).attr("name"));
        }
        else{
            filters.splice(filters.indexOf($(this).attr("name"), 1));
        }
        let data = { "filters" : JSON.stringify(filters) };

        $.post("/apply_filters", data, function(response){
            alert(response);
        });
    });

    $('.card').on('click', function(){
        openContentBoxModal();
    });

    $('#contentBoxCloseBtn').on('click', function(){
        closeContentBoxModal();
    });
}

function openContentBoxModal(){
    $('body').css('overflow', 'hidden');
    $('#contentBoxModal').fadeIn('fast');
}

function closeContentBoxModal(){
    $('body').css('overflow', 'auto');
    $('#contentBoxModal').fadeOut('fast');
}