const previewContainer = document.querySelector(".modal__upload__container");
let fileInput = document.getElementById("modal__file__input");

fileInput.addEventListener("change", function (){
    const files = fileInput.files;
    const maxPhotos = 5;
    if (fileInput.files.length > maxPhotos) {
        alert(`You can only upload up to ${maxPhotos} files.`);
        fileInput.value = ''; 
    }
    previewContainer.innerHTML = '';
    
    for(let i=0;i<files.length;i++)
    {
        console.log("test");
        const file = files[i];
        const reader = new FileReader();

        reader.onload = function () {
            const div = document.createElement("div");
            div.className = "modal__upload__element modal__upload__preview";
            div.style.backgroundImage = `url(${reader.result})`;

            const icon = document.createElement("i");
            icon.className = "fa-solid fa-circle-xmark upload__removePhoto";

            div.appendChild(icon);
            previewContainer.appendChild(div);
            if(i==files.length-1&&files.length<5)
            {
                const inputHtml =
                `
                    <input type="file" id="modal__file__input" multiple>
                    <label label for="modal__file__input" class="modal__upload__button" onclick='resetFileInput()'>
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    </label>
                `;
                
                const inputDiv = document.createElement("div");
                inputDiv.classList = 'modal__upload__element';
                inputDiv.innerHTML = inputHtml;
                previewContainer.appendChild(inputDiv);
            }

        };

        reader.readAsDataURL(file);
    }
   
})

function resetFileInput()
{
    if(fileInput.files.length>0)
    {
        fileInput.value = ''; 

    }
}