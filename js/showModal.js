const modal = document.querySelector(".modal__overlay");
const showModalBtn = document.querySelector("#btn__createPost");
const closeModalBtn = document.querySelector(".modal__close");
const showModal = function(){
    modal.classList.add('modal__visible');
}
const closeModal = function(){
    console.log(closeModalBtn);
    modal.classList.remove('modal__visible');
}

showModalBtn.addEventListener('click',showModal);
closeModalBtn.addEventListener('click',closeModal);

