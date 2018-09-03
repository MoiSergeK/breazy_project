class CardInfoModal extends Modal{
    constructor(){
        super('contentBoxModal');
        this.setEvents();
    }

    setEvents(){
        let thisClass = this;
        $('#contentBoxCloseBtn').on('click', function(){
            $('body').css('overflow', 'auto');
            thisClass.close();
        });
    }

    setParams(response){
        let data = JSON.parse(response);
        $('#contentBoxModalTitle').text(data['name']);
        $('#contentBoxModalDescription').html(data['description']);
        $('#contentBoxModalImg').attr('src', data['logo']);
        let tags = '';
        for(let tag of data['tags']){
            tags += "<i class='text-blue'><u>" + tag + "</u></i> ";
        }
        $('#contentBoxModalTags').html(tags);
        $('body').css('overflow', 'hidden');
    }
}