<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/createPost.css">
</head>
<body>
    <div class="modal__overlay">
        <div class="modal__container">
            <h1 class="modal__title">Create Post</h1>
            <form action="" method="post" class="modal__post__form" >
                <textarea name="textContent" id="" cols="30" rows="10" placeholder="Write Here" class="modal__post__content"></textarea>
                
                <div class="modal__upload__container">
                    <div class="modal__upload__element flex__last__item upload__input__container">
                        <input type="file" id="modal__file__input" multiple accept=".png,.jpeg,.png,.jpg,.webp">
                        <label   label for="modal__file__input" class="modal__upload__button">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        </label>
                    </div>
                </div>
                <button class="btn--primary btn__publish">Publish</button>
            </form>
            <i class="fa-solid fa-xmark modal__close"></i>
        </div>
    </div>
    <script src="../../js/showModal.js"></script>
    <script src="../../js/uploadPostPhoto.js"></script>
</body>
</html>