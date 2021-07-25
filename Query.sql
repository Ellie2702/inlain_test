CREATE DATABASE db_blog;

use db_blog;

CREATE TABLE posts (
	userId int NOT NULL,
    id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(250) NOT NULL,
    body varchar(1000) NOT NULL
);

CREATE TABLE comments (
 	postID int NOT NULL,
    id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(200) NOT NULL,
    email varchar(50) NOT NULL,
    body varchar(1000) NOT NULL,
    CONSTRAINT fk_postID  FOREIGN KEY (postID) REFERENCES posts (id)
);