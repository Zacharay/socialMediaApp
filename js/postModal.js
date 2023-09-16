class PostModal
{
    #previewContainer;
    #maxPhotos = 5;
    #selectedFiles=[];
    #publishButton;
    #modal;
    #closeModal;
    constructor(showModalBtn)
    {
        this.#previewContainer = document.querySelector(".modal__upload__container");
        this.#publishButton = document.querySelector(".btn__publish");
        this.#modal = document.querySelector(".modal__overlay");
        this.#closeModal = document.querySelector(".modal__close");

        this.#previewContainer.addEventListener('change',(e)=>
        {
          if (e.target.id === "modal__file__input")
          {
              this._fileInputChanged(e.target);
          }
        })
        this.#previewContainer.addEventListener('click',(e)=>{
          if(e.target.classList.contains('upload__removePhoto'))
          {
              this._removePhotoEvent(e.target);
          }
        })

        this.#publishButton.addEventListener("click",this._uploadFiles.bind(this));
        showModalBtn.addEventListener('click',this._showModal.bind(this));
        this.#closeModal.addEventListener('click',this._closeModal.bind(this));
    }
    _showModal()
    {
        this.#modal.classList.add('modal__visible');
    }
    _closeModal()
    {
      this._resetFileInput();
      this._renderPreview();
      this.#modal.classList.remove('modal__visible');
    }
    _resetFileInput()
    {
      this.#selectedFiles=[];
      const fileInput = document.querySelector("#modal__file__input");
      fileInput.value ='';
    }
    _fileInputChanged(e)
    {
        const files =e.files;
    
        if (files.length > this.#maxPhotos) {
          alert(`You can only upload up to ${this.#maxPhotos} files.`);
          resetFileInput();
          return;
        }
    
        this.#selectedFiles = files;
        this._renderPreview(); 
    }
    _renderPreview()
    {
      const appendInput = ()=>{
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

      this.#previewContainer.innerHTML = '';

      if(this.#selectedFiles.length==0)appendInput();
    
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
  
          if (i === this.#selectedFiles.length - 1 && this.#selectedFiles.length < this.#maxPhotos) {
              appendInput();
          }
        };
  
        reader.readAsDataURL(file);
      }
    }
    _uploadFiles()
    {
        const formData = new FormData();

        const textContent = document.querySelector('.modal__post__content').value;
        formData.append('postContent',textContent);
        for(let i=0;i<this.#selectedFiles.length;i++)
        {
            formData.append('selectedFiles[]',this.#selectedFiles[i]);
        }

        fetch('../controllers/uploadPostController.php',{
          method:'POST',
          body:formData,
        }).then(response=>response.json()).then(data=>{
          const fileUploadSuccess = true;
          data.forEach(log=>{
            if(log.status=='error')fileUploadSuccess = false;
          })

          if(fileUploadSuccess == true)
          {
              this._closeModal();
          }

        });
    }
    _removePhotoFromList(photoNr)
    {
      
      const fileListArray = Array.from(this.#selectedFiles);

      fileListArray.splice(photoNr, 1);
    
      const dataTransfer = new DataTransfer();
    
     
      fileListArray.forEach((file) => {
        dataTransfer.items.add(file);
      });
    
      
      this.#selectedFiles = dataTransfer.files;
    

      
      
    }
    _removePhotoEvent(removeBtn)
    {
        const removeID = removeBtn.dataset.photo_id;
        this._removePhotoFromList(removeID);
        this._renderPreview();
    }
}

const showModalBtn = document.querySelector("#btn__createPost");
const postModal = new PostModal(showModalBtn);