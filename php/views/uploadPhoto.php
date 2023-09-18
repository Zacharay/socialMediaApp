<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/main.css">
    <link rel="stylesheet" href="../../styles/loginForm.css">
    <title>Upload Photo</title>
</head>
<body>

    <div class="login__container uploadPhoto__container">
        <img  src="../../images/profilePhotos/userPhoto_default.png" class="uploadPhoto__image"/>
        <form id="uploadPhoto__form" method="POST" enctype="multipart/form-data" action="../controllers/uploadPhotoController.php">
            <input type="file" name="profilePhoto" id="uploadPhoto__input--file" onchange="displaySelectedImage()"/>
            <label for="uploadPhoto__input--file" class="uploadPhoto__input--file__label">Choose an image </label>
            <input type="submit" value="Save" class="btn--primary"/>
        </form>
    </div>
    <script>
        function displaySelectedImage() {
            const input = document.querySelector('#uploadPhoto__input--file');
            const image = document.querySelector('.uploadPhoto__image');
            console.log(image);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    image.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                image.src = '../../images/profilePhotos/defaultPhoto.png';
            }
        }
    </script>
    <script src="../../js/loadTheme.js"></script>
</body>
</html>