CREATE DATABASE SobremesaCafe;

USE SobremesaCafe;

CREATE TABLE UserInfo (
  UserId INT PRIMARY KEY AUTO_INCREMENT,
  FirstName VARCHAR(50),
  LastName VARCHAR(50),
  Birthdate DATE,
  EmailAddress VARCHAR(50),
  PhoneNumber VARCHAR(50),
  Address VARCHAR(200),
  Gender INT,
  DateVerified DATETIME,
  VerifiedUser  TINYINT(1)
);

CREATE TABLE LookUp (
  LookUpId INT PRIMARY KEY AUTO_INCREMENT,
  LookUpName VARCHAR(50),
  LookUpCategory VARCHAR(50),
  CreatedByUserId INT,
  CreatedAt DATETIME
);

CREATE TABLE UserAccess (
  UserAccessId INT PRIMARY KEY AUTO_INCREMENT,
  UserId INT,
  Username VARCHAR(50),
  Password VARCHAR(50),
  Active TINYINT(1),
  DateCreated DATETIME
);

CREATE TABLE UserAccessPage (
  Name VARCHAR(50),
  LookUpId INT,
  UserId INT
);

ALTER TABLE UserInfo ADD FOREIGN KEY (Gender) REFERENCES LookUp (LookUpId);
ALTER TABLE UserInfo ADD FOREIGN KEY (UserAccessId) REFERENCES UserAccess (UserAccessId);
ALTER TABLE LookUp ADD FOREIGN KEY (CreatedByUserId) REFERENCES UserInfo (UserId);
ALTER TABLE UserAccess ADD FOREIGN KEY (UserId) REFERENCES UserInfo (UserId);
ALTER TABLE UserAccessPage ADD FOREIGN KEY (LookUpId) REFERENCES LookUp (LookUpId);
ALTER TABLE UserAccessPage ADD FOREIGN KEY (UserId) REFERENCES UserInfo (UserId);         

-- cart

CREATE TABLE IF NOT EXISTS Products (
    ProductId INT AUTO_INCREMENT PRIMARY KEY,
    ProductName VARCHAR(255) NOT NULL,
    ProductDescription TEXT,
    ProductPrice DECIMAL(10, 2) NOT NULL,
    ProductImage VARCHAR(255),
    ProductStock INT DEFAULT 0
);
CREATE TABLE IF NOT EXISTS Cart (
    CartId INT AUTO_INCREMENT PRIMARY KEY,
    UserId INT NOT NULL,
    ProductId INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    ProductPrice DECIMAL(10, 2) NOT NULL,
    Quantity INT DEFAULT 1,
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserId) REFERENCES Users(UserId) ON DELETE CASCADE,
    FOREIGN KEY (ProductId) REFERENCES Products(ProductId) ON DELETE CASCADE,
    UNIQUE KEY UniqueCartItem (UserId, ProductId)
);
CREATE TABLE IF NOT EXISTS Orders (
    OrderId INT AUTO_INCREMENT PRIMARY KEY,
    UserId INT NOT NULL,
    TotalPrice DECIMAL(10, 2) NOT NULL,
    OrderStatus VARCHAR(50) DEFAULT 'pending',
    CreatedAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (UserId) REFERENCES Users(UserId)
);
CREATE TABLE IF NOT EXISTS OrderDetails (
    OrderDetailId INT AUTO_INCREMENT PRIMARY KEY,
    OrderId INT NOT NULL,
    ProductId INT NOT NULL,
    ProductName VARCHAR(255) NOT NULL,
    Quantity INT NOT NULL,
    Price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (OrderId) REFERENCES Orders(OrderId) ON DELETE CASCADE,
    FOREIGN KEY (ProductId) REFERENCES Products(ProductId) ON DELETE CASCADE
);
-- seller
INSERT INTO LookUp (LookUpName,LookUpCategory) VALUES ('male','gender'),('female','gender'), ('Food','ProductCategory'), ('Drinks','ProductCategory'), ('Cake','ProductCategory');

-- Step 3: Alter Products table to add ProductCategory column
ALTER TABLE Products
    ADD COLUMN ProductCategory INT,
    ADD CONSTRAINT fk_ProductCategory FOREIGN KEY (ProductCategory) 
    REFERENCES LookUp(LookUpId)
