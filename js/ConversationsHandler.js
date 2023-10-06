class ConversationHandler{
    #activeConversationID;
    #conversations;
    constructor()
    {
        this.#conversations = document.querySelectorAll(".conversation__element");
        this.#activeConversationID = 0;

        if(this.#conversations.length>0)
        {
            this.#conversations[0].classList.add('conversation--active');

            this.#conversations.forEach(conversation=>{
                conversation.addEventListener('click',this._changeConversation.bind(this));
            })
        }
        
    }   
    _changeConversation(e)
    {
        const conversationID = e.target.closest(".conversation__element").getAttribute('data-id');
        this.#activeConversationID = conversationID;

        const el= document.querySelector(`.conversation__element[data-id='${this.#activeConversationID}']`);
        this._removeActiveClass();
        this._fetchMessages();
        el.classList.add('conversation--active');
    }
    _removeActiveClass()
    {
        const activeEl = document.querySelector('.conversation--active');
        activeEl.classList.remove('conversation--active');
    }
    async _fetchMessages()
    {
        const formData = new FormData();
        formData.append('conversationID',this.#activeConversationID);

        const response = await fetch(`../http/fetchMessages.php`, {
            method: 'POST',
            body: formData
        });

        const json = await response.json();
    }
    _displayMessages()
    {

    }
}

const handler = new ConversationHandler();