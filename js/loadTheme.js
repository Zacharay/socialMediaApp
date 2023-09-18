const themeToggle = document.getElementById('theme__btn');
const body = document.body;

const updateThemeBtnText = function(theme)
{
    if(theme=='dark')
    {
        themeToggle.innerHTML = '<a href="#"><i class="fa-regular fa-sun"></i>Light Theme</a>';
    }
    else if(theme=='light')
    {
        themeToggle.innerHTML = '<a href="#"><i class="fa-regular fa-moon"></i> Dark Theme</a>';
    }
  
}

if(themeToggle)
{
    themeToggle.addEventListener('click', () => {
        if (body.dataset.theme === 'light') {
          body.dataset.theme = 'dark';
          updateThemeBtnText('dark');
        } else {
          body.dataset.theme = 'light';
          updateThemeBtnText('light');
        }
        // Store the selected theme in local storage for persistence
        localStorage.setItem('theme', body.dataset.theme);
      });
}

// Check local storage for the user's preferred theme
const userPreferredTheme = localStorage.getItem('theme');
if (userPreferredTheme) {
  body.dataset.theme = userPreferredTheme;
  updateThemeBtnText(userPreferredTheme);
}