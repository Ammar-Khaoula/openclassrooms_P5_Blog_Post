# openclassrooms_P5_Blog_Post
Web ServeWeb Server:
    XAMPP Control panel: 3.3.0
    Apache: 2.4.53
    Mysql: 15.1
    PHP: 8.1.5

composer:
    mailjet/mailjet-apiv3-php: 1.6

CSS Framework:  
    Bootstrap: 5..0.2

Icons toolkit:    
    Font Awesome 4

Installation:
   - Download zip files or clone the project repository with github
   - Create database
        In your DBMS create a new database named first_blog_php
      //  Import blogPhp.sql file in your DBMS (file available here : sql/first_blog_php.sql)

 Table structure `users`
    CREATE TABLE `users` (
      `idUser` int(11) NOT NULL,
      `firstName` varchar(255) NOT NULL,
      `lastName` varchar(255) NOT NULL,
      `photo` varchar(255) NOT NULL,
      `email` varchar(255) NOT NULL,
      `mp` varchar(255) NOT NULL,
      `catchphrase` varchar(255) NOT NULL,
      `dateLastUpdate` datetime NOT NULL DEFAULT current_timestamp(),
      `validate` tinyint(1) NOT NULL DEFAULT 0,
      `isAdmin` tinyint(1) NOT NULL
    )
Table structure `comment`
    CREATE TABLE `comment` (
      `idComment` int(11) NOT NULL,
      `contentComment` text NOT NULL,
      `validateComment` tinyint(1) NOT NULL DEFAULT 0,
      `dateLastUpdateComment` datetime NOT NULL DEFAULT current_timestamp(),
      `postComment` int(11) NOT NULL,
      `userComment` int(11) NOT NULL
    )

Table structure `posts`
    CREATE TABLE `posts` (
      `idPost` int(11) NOT NULL,
      `title` varchar(255) NOT NULL,
      `chapo` varchar(255) NOT NULL,
      `content` text NOT NULL,
      `auteur` varchar(255) NOT NULL,
      `dateLastUpdatePost` datetime NOT NULL DEFAULT current_timestamp(),
      `userPost` int(11) NOT NULL
    ) 

Create your admin account
    Launch the server
    Create an account on the signup page
    Go to your DBMS
    Set is_validate to 1
    Set is_admin to 1
