CREATE TABLE Users(
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NOT NULL UNIQUE,
    Email VARCHAR(60) NOT NULL UNIQUE,
    Password VARCHAR(30) NOT NULL,
    Name VARCHAR(30) NOT NULL,
    Surname VARCHAR(30) NOT NULL,
    Job VARCHAR(60)
);
CREATE TABLE Posts(
    PostID INT AUTO_INCREMENT PRIMARY KEY,
    UserID INT NOT NULL,
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



