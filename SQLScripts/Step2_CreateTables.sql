USE retro_game_store;

CREATE TABLE users (
	userID INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    fName VARCHAR(50) NOT NULL,
    lName VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(75) NOT NULL,
    creationDate DATE NOT NULL);
    
CREATE TABLE games (
	gameID INT AUTO_INCREMENT PRIMARY KEY,
    gameName VARCHAR(100),
    genreID INT,
    releaseDate DATE,
    platformID INT,
    quantity INT,
	price DECIMAL(10,2)
);

CREATE TABLE orderItems (
	orderItemID INT AUTO_INCREMENT PRIMARY KEY,
    cartID INT NOT NULL,
    gameID INT NOT NULL,
    orderID INT NULL,
    quantity INT,
	unit_price DECIMAL(10,2)
); 

CREATE TABLE cart (
	cartID INT AUTO_INCREMENT PRIMARY KEY,
    userID INT,
    status VARCHAR(10),
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
	orderID INT AUTO_INCREMENT PRIMARY KEY,
    cartID INT UNIQUE,
    fullName VARCHAR(50),
    mailingAddress VARCHAR(255),
    city VARCHAR(50),
    state VARCHAR(30),
    zip VARCHAR(10),
    orderDate DATE,
    status VARCHAR(10),
    totalAmount DECIMAL(10,2));
    
CREATE TABLE genres (
	genreID INT AUTO_INCREMENT PRIMARY KEY,
    genreName VARCHAR(20)
);

CREATE TABLE platforms (
	platformID INT AUTO_INCREMENT PRIMARY KEY,
    platformName VARCHAR(50),
    company VARCHAR(20)
);