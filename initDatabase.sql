CREATE TABLE Users(
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Login VARCHAR(255) NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Name VARCHAR(255) NOT NULL,
    Surname VARCHAR(255)
);
CREATE TABLE Posts(
    PostID INT AUTO_INCREMENT PRIMARY KEY,
    UserID UNSIGNED INT NOT NULL,
    Content TEXT,
    uploadDate DATE NOT NULL,
    isPhotoUploaded BOOLEAN,
    PhotoURL VARCHAR(255)
);
CREATE TABLE Comments(
    CommentID INT AUTO_INCREMENT PRIMARY KEY,
    PostID INT NOT NULL,
    UserID INT NOT NULL,
    Content TEXT NOT NULL,
    uploadDate DATE NOT NULL
);

CREATE TABLE Followers(
    FollowerID INT AUTO_INCREMENT PRIMARY KEY,
    FollowerUserID INT NOT NULL,
    FollowingUserID INT NOT NULL
);



