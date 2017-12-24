class MailModal extends Modal{
    constructor(){
        super('mailModal');
        this.setEvents();
    }

    setEvents(){
        let thisClass = this;
        $('#mailCloseBtn').on('click', function(){
            $('body').css('overflow', 'auto');
            thisClass.close();
        });
    }
}