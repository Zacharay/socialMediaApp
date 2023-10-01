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

const accountBtnContainer = document.querySelector(".settings__account__btns");
const accountSettingsBtn = document.querySelectorAll(".settings__account__btn");
const accountSettingsVerifications = document.querySelectorAll(".settings__account__verification");
const accountBackBtn = document.querySelectorAll(".account__back__btn");

const setAccountTabInitialState = function()
{
    accountBtnContainer.classList.remove("settings__hidden");
    accountSettingsVerifications.forEach(setting=>{
        setting.classList.add("settings__hidden");
    })
}

accountBackBtn.forEach(btn=>{
    btn.addEventListener('click',setAccountTabInitialState);
})

accountSettingsBtn.forEach((btn,idx)=>{
    btn.addEventListener('click',function()
    {
        accountBtnContainer.classList.add('settings__hidden');
        accountSettingsVerifications[idx].classList.remove('settings__hidden');
    })
})

