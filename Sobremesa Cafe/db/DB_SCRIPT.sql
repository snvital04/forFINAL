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
ALTER TABLE LookUp ADD FOREIGN KEY (CreatedByUserId) REFERENCES UserInfo (UserId);
ALTER TABLE UserAccess ADD FOREIGN KEY (UserId) REFERENCES UserInfo (UserId);
ALTER TABLE UserAccessPage ADD FOREIGN KEY (LookUpId) REFERENCES LookUp (LookUpId);
ALTER TABLE UserAccessPage ADD FOREIGN KEY (UserId) REFERENCES UserInfo (UserId);          