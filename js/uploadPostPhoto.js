const previewContainer = document.querySelector(".modal__upload__container");
const fileInput = document.getElementById("modal__file__input");

fileInput.addEventListener("change", function (){
    const files = fileInput.files;
    const maxPhotos = 5;
    if (fileInput.files.length > maxPhotos) {
        alert(`You can only upload up to ${maxPhotos} files.`);
        fileInput.value = ''; 
    }


    for(let i=0;i<files.length;i++)
    {
        console.log(i);
    }
})