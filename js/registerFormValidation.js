const isEmailValid = function(emailAddress)
{
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        return regex.test(emailAddress);
}


document.querySelector(".login-form").addEventListener("submit",function(event){
        event.preventDefault();
            
        const nameInput = this.querySelector('[name="Name"]');
        const surnameInput = this.querySelector('[name="Surname"]');
        const usernameInput = this.querySelector('[name="Username"]');
        const emailInput = this.querySelector('[name="Email"]');     
        const password1Input = this.querySelector('[name="Password"]');
        const password2Input = this.querySelector('[name="Confirm_Password"]');

        const nameError = this.querySelector("#name-error");
        const surnameError = this.querySelector("#surname-error");
        const usernameError = this.querySelector("#username-error");
        const emailError = this.querySelector("#email-error");
        const passwordError = this.querySelector("#password-error");

        let isFormValid = true;

        if(nameInput.value=="" || nameInput.value.length > 30)
        {
            nameInput.classList.add("loginForm-invalidInput");
            nameError.textContent = "Name is not valid";
            isFormValid = false;
        }
        if(surnameInput.value=="" || surnameInput.value.length > 30)
        {
            surnameInput.classList.add("loginForm-invalidInput");
            surnameError.textContent = "Surname is not valid";
            isFormValid = false;
        }
        if(usernameInput.value=="" || usernameInput.value.length > 30)
        {
            usernameInput.classList.add("loginForm-invalidInput");
            usernameError.textContent = "Username is not valid";
            isFormValid = false;
        }
        if(!isEmailValid(emailInput.value))
        {
            emailInput.classList.add("loginForm-invalidInput");
            emailError.textContent = "Email is not valid";
            isFormValid = false;
        }
        if(password1Input.value != password2Input.value)
        {
            password1Input.classList.add("loginForm-invalidInput");
            password2Input.classList.add("loginForm-invalidInput");
            passwordError.textContent = "Passwords should match";
            isFormValid = false;
        }
        if(password1Input.value.length < 10 )
        {
            password1Input.classList.add("loginForm-invalidInput");
            password2Input.classList.add("loginForm-invalidInput");
            passwordError.textContent = "Password should be minimum 10 characters";
            isFormValid = false;
        }

        if(isFormValid)
        {
            this.submit();
        }
});