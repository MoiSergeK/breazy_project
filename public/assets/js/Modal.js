class Modal{
    constructor(containerId){
        this.container = $('#' + containerId);
    }

    open(){
        if(this.beforeOpen){
            this.beforeOpen();
        }
        this.container.fadeIn('fast');
    }

    close(){
        if(this.beforeClose){
            this.beforeClose();
        }
        this.container.fadeOut('fast');
    }
}