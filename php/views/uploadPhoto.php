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

    <div class="loginBox-container uploadPhoto-container">
        <img  src="../../images/profilePhotos/userPhoto_-1.png" class="profile-photo"/>
        <form id="uploadPhotoForm" method="POST" enctype="multipart/form-data" action="../controllers/uploadPhotoController.php">
            <input type="file" name="profilePhoto" id="profilePhotoInput" onchange="displaySelectedImage()"/>
            <label for="profilePhotoInput" class="profilePhotoInput-label">Choose an image </label>
            <input type="submit" value="Save" class="loginBox-submit"/>
        </form>
    </div>
    <script>
        // JavaScript function to display the selected image instantly
        function displaySelectedImage() {
            const input = document.getElementById('profilePhotoInput');
            const image = document.querySelector('.profile-photo');
            console.log(image);

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    image.src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            } else {
                // Handle the case when no file is selected or the selected file is invalid
                image.src = '../../images/profilePhotos/defaultPhoto.png';
            }
        }
    </script>

</body>
</html>