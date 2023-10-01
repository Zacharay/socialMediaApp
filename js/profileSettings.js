const settingsBtn = document.querySelectorAll(".settings__nav__btn");
const settingsContents = document.querySelectorAll(".settings__content");

function resetStates()
{
    settingsBtn.forEach((btn)=>{
        btn.classList.remove('settings__nav__btn--active');
    })
    settingsContents.forEach((element)=>{
        element.classList.add('settings__hidden');
    })
}

settingsBtn.forEach((btn,idx)=>{
    btn.addEventListener('click',function(e){
        resetStates();
        settingsBtn[idx].classList.add("settings__nav__btn--active");
        settingsContents[idx].classList.remove("settings__hidden");
    })
})