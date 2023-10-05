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
        const action = e.target.getAttribute('data-action');
        if(action=='like')

        {
            e.target.setAttribute('data-action','dislike');
            
            e.target.innerHTML = `<i class="fa-solid fa-thumbs-down"></i>Dislike`;
            this._addLikeToDatabase(postID);
        }
        else if(action=='dislike')
        {
            e.target.setAttribute('data-action','like');
            e.target.innerHTML = `<i class="fa-solid fa-thumbs-up"></i>Like`
            this._removeLikeFromDatabase();
        }
    }
    async _addLikeToDatabase(postID)
    {
        const formData = new FormData();
        formData.append('postID', postID);
        const pathToController = '../controllers/likesController.php'
        const response = await fetch(pathToController, {
            method: 'POST',
            body: formData,
        });
        const json = await response.json();
        console.log(json);
    }
    _removeLikeFromDatabase(){

    }
}
const btns = new LikeButtons();