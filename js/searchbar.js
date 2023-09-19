class SearchUsers {
    constructor() {
        this.searchinput = document.querySelector(".search__input");
        this.searchbarPreview = document.querySelector(".search__container__preview");
        this.timeoutId = null; 
        this.init();
    }

    init() {
        this.searchinput.addEventListener('input', (e) => {
            this.handleInput(e.target.value.trim());
        });
    }

    handleInput(userInput) {
        userInput = userInput.split(' ').join('');
        clearTimeout(this.timeoutId);

        if (userInput === '') {
            this.searchbarPreview.innerHTML = '';
            return;
        }

        const formData = new FormData();
        formData.append('searchQuery', userInput);

        this.timeoutId = setTimeout(() => this.fetchUsers(formData), 100);
    }

    async fetchUsers(formData) {
        try {
            const response = await fetch('../models/searchUsersModel.php', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const json = await response.json();
            this.displayUsers(json.data);
        } catch (error) {
            console.error('Error:', error);
        }
    }

    displayUsers(usersData) {
        let html = '';
        if (usersData.length > 0) {
            usersData.forEach(user => {
                html += `<li class="search__preview__element"><a href="../views/userProfile.php?userID=${user.id}"><img src="../../images/profilePhotos/userPhoto_${user.id}.png"/>${user.name} ${user.surname}</a></li>`;
            });
        }
        this.searchbarPreview.innerHTML = html;
    }
}

const searchUsers = new SearchUsers();