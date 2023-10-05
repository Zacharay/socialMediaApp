class LikeButtons
{
    #buttons;
    constructor()
    {
        this.#buttons = document.querySelectorAll(".like__btn");
        this.#buttons.forEach((btn)=>{
            btn.addEventListener('click',this._likeHandler.bind(this))
        })
    }
    _likeHandler(e)
    {
        
        const postContainer = e.target.closest(".post__container");
        const postID = postContainer.getAttribute('data-id');
        const likeBtn = e.target.closest('.like__btn');
        console.log(likeBtn);
        const action = likeBtn.getAttribute('data-action');
       
        if(action=='like')

        {
            likeBtn.setAttribute('data-action','dislike');
            
            likeBtn.innerHTML = `<i class="fa-solid fa-thumbs-down"></i>Dislike`;
            this._likeRequest(postID,'like');
        }
        else if(action=='dislike')
        {
            likeBtn.setAttribute('data-action','like');
            likeBtn.innerHTML = `<i class="fa-solid fa-thumbs-up"></i>Like`
            this._likeRequest(postID,'dislike');
        }
    }
    async _likeRequest(postID,typeOfRequest)
    {
        const formData = new FormData();
        formData.append('postID', postID);
        formData.append('typeOfRequest', typeOfRequest);
        const pathToController = '../controllers/likesController.php';
        const response =await fetch(pathToController, {
            method: 'POST',
            body: formData,
        });
        
    }
}
const btns = new LikeButtons();