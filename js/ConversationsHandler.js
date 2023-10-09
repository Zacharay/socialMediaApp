class ConversationHandler{
    #activeConversationID;
    #conversations;

    constructor()
    {
        this.#conversations = document.querySelectorAll(".conversation__element");
        
        this.#activeConversationID = 1;


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
        this._updateTitle();
    }
    _removeActiveClass()
    {
        const activeEl = document.querySelector('.conversation--active');
        activeEl.classList.remove('conversation--active');
    }
    async _fetchMessages()
    {
        if(this.#activeConversationID==-1)
        {
            this._displayMessages(null);
            return;
        }
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
        const urlParams = new URLSearchParams(window.location.search);
        const receiverID = urlParams.get("userID");

        const messageInput = document.querySelector(".message__input");
        const formData = new FormData();
        formData.append("conversationID",this.#activeConversationID);
        formData.append("receiverID",receiverID);
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
        if(messages==null)
        {
            messageContainer.textContent = "";
            return;
        }
        
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
    async _updateTitle()
    {
        const urlParams = new URLSearchParams(window.location.search);
        const receiverID = urlParams.get("userID");


        const formData = new FormData();
        formData.append("conversationID",this.#activeConversationID);
        formData.append("conversationUserID",receiverID);
        const response = await fetch(`../http/getConversationTitle.php`, {
            method: 'POST',
            body: formData
        });

        const json = await response.json();
        document.querySelector(".conversation__title").textContent = json.data;
    }
   
}

const handler = new ConversationHandler();