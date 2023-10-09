class ConversationHandler{
    #activeConversationID;
    #conversations;
    #conversationTitles;
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
            this._fetchMessages();
        }
        document.querySelector(".send__btn").addEventListener('click',this._sendMessage.bind(this))
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
        this._displayMessages(json.data);
    }
    async _sendMessage()
    {
        const messageInput = document.querySelector(".message__input");
        const conversationID =  document.querySelector(".conversation--active").getAttribute('data-id');
        const formData = new FormData();
        formData.append("conversationID",conversationID);
        formData.append("content",messageInput.value);
        
        const response = await fetch(`../http/sendMessage.php`, {
            method: 'POST',
            body: formData
        });

        const json = await response.json();

        messageInput.value = "";
        this._fetchMessages();
        
    }
    _displayMessages(messages)
    {
        const messageContainer= document.querySelector(".message__container");
        let html ='';
        messages.forEach(msg=>{
            if(msg['isFirstUserMessage']==true&&msg['isCurrentUserMessage']==false)
            {
                html+=`
                <div class="message--otherUser--first">
                    <img src="../../images/profilePhotos/userPhoto_${msg['senderID']}.png"/>
                    <p>${msg['content']}</p>
                </div>`;
            }
            else{
                html+=`
                <div class="message message--${msg['isCurrentUserMessage']==true?'currentUser':'otherUser'}">
                        ${msg['content']}
                </div>`;  
            }
            
        })
        messageContainer.innerHTML = html;
    }
    async updateTitle()
    {
        const conversationID =  document.querySelector(".conversation--active").getAttribute('data-id');
        const formData = new FormData();
        formData.append("conversationID",conversationID);
        const response = await fetch(`../http/getConversationTitle.php`, {
            method: 'POST',
            body: formData
        });

        const json = await response.json();

        document.querySelector(".conversation__title").textContent = json.data['conversationTitle'];
    }
   
}

const handler = new ConversationHandler();