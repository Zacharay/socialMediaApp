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
        <img  src="../../images/profilePhotos/defaultPhoto.png" class="profile-photo"/>
        <form id="uploadPhotoForm" method="POST">
            <input type="file" name="profilePhoto" id="profilePhotoInput"/>
            <label for="profilePhotoInput" class="profilePhotoInput-label">Choose an image </label>
            <input type="submit" value="Save" class="loginBox-submit"/>
        </form>
    </div>
</body>
</html>