class PostModal
{
    #previewContainer;
    #maxPhotos = 5;
    #selectedFiles=[];
    
    constructor()
    {
        this.#previewContainer = document.querySelector(".modal__upload__container");
       

        this.#previewContainer.addEventListener('change',(e)=>
        {
          if (e.target.id === "modal__file__input")
          {
              this._fileInputChanged(e.target);
          }
        })
        
    }
    _resetFileInput()
    {
      const fileInput = document.querySelector(".modal__file__input");
      fileInput.value ='';
    }
    _fileInputChanged(e)
    {
        const files =e.files;
    
        if (files.length > this.#maxPhotos) {
          alert(`You can only upload up to ${maxPhotos} files.`);
          resetFileInput();
          return;
        }
    
        this.#selectedFiles = files;
        this._renderPreview();
        console.log(this.#selectedFiles);
      
    }
    _renderPreview()
    {
      this.#previewContainer.innerHTML = '';
    
      for (let i = 0; i < this.#selectedFiles.length; i++) {
        const file = this.#selectedFiles[i];
        const reader = new FileReader();
  
        reader.onload = ()=> {
          const div = document.createElement("div");
          div.className = "modal__upload__element modal__upload__preview";
          div.style.backgroundImage = `url(${reader.result})`;
  
          const icon = document.createElement("i");
          icon.className = "fa-solid fa-circle-xmark upload__removePhoto ";
          icon.dataset.photo_id = i;
  
          div.appendChild(icon);
          this.#previewContainer.appendChild(div);
  
          if (i === this.#selectedFiles.length - 1 && this.#selectedFiles.length < 5) {
            const inputHtml =
              `
              <input type="file" id="modal__file__input" multiple style="display: none;">
              <label for="modal__file__input" class="modal__upload__button"'>
                <i class="fa-solid fa-arrow-up-from-bracket "></i>
              </label>
              `;
  
            const inputDiv = document.createElement("div");
            inputDiv.classList = 'modal__upload__element flex__last__item upload__input__container';
            inputDiv.innerHTML = inputHtml;
            this.#previewContainer.appendChild(inputDiv);
          }
        };
  
        reader.readAsDataURL(file);
      }
    }
}
const postModal = new PostModal();