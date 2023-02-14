Create database real_estate;
CREATE TABLE users
(
  ID INT NOT NULL auto_increment,
  Name varchar(256) NOT NULL,
  Surname varchar(256) NOT NULL,
  Age INT NOT NULL,
  Email varchar(256) NOT NULL,
  Address varchar(256) NOT NULL,
  username varchar(256) NOT NULL,
  Password varchar(256) NOT NULL,
  Status INT NOT NULL,
  PRIMARY KEY (ID)
);

CREATE TABLE Agent
(
  Agent_ID INT NOT NULL auto_increment,
  Salary INT NOT NULL,
  User_ID INT NOT NULL,
  PRIMARY KEY (Agent_ID),
  FOREIGN KEY (User_ID) REFERENCES users(ID) ON DELETE CASCADE
);

CREATE TABLE Area
(
  Area_Id INT NOT NULL auto_increment,
  Area_Name varchar(256) NOT NULL,
  No_Properties INT NOT NULL,
  PRIMARY KEY (Area_Id)
);

CREATE TABLE Agent_Area
(
  RelationID INT NOT NULL auto_increment,
  Agent_ID INT NOT NULL,
  Area_Id INT NOT NULL,
  PRIMARY KEY (RelationID),
  FOREIGN KEY (Agent_ID) REFERENCES Agent(Agent_ID) ON DELETE CASCADE,
  FOREIGN KEY (Area_Id) REFERENCES Area(Area_Id) ON DELETE CASCADE
);

CREATE TABLE Property
(
  Property_Id INT NOT NULL auto_increment,
  Property_Name varchar(256) NOT NULL,
  Description varchar(256) NOT NULL,
  Nr_Bedrooms INT NOT NULL,
  Nr_Bathrooms INT NOT NULL,
  Area  varchar(256) NOT NULL,
  Image BLOB NOT NULL,
  Agent_ID INT NOT NULL,
  Area_Id INT NOT NULL,
  Price INT NOT NULL,
  PRIMARY KEY (Property_Id),
  FOREIGN KEY (Agent_ID) REFERENCES Agent(Agent_ID) ON DELETE CASCADE,
  FOREIGN KEY (Area_Id) REFERENCES Area(Area_Id) ON DELETE CASCADE
);

-- insert into user table
INSERT INTO users (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Kevin', 'Tervoli', 21,'ktervoli20@epoka.edu.al','Gramsh','ktervoli20','pass',0);
INSERT INTO users (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Daniel', 'Avdiu', 21,'davdiu20@epoka.edu.al','Kavaje','davdiu20','pass',1);
INSERT INTO users (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Eldi', 'Qevani', 20,'eqevani20@epoka.edu.al','Berat','eqevani20','pass',2);
INSERT INTO users (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Admin', 'User', 21,'auser20@epoka.edu.al','Anon','auser20','pass',2);
-- insert into area table
INSERT INTO Area (Area_Name,No_Properties) VALUES ('Tirane',2);
INSERT INTO Area (Area_Name,No_Properties) VALUES ('Durres',1);
INSERT INTO Area (Area_Name,No_Properties) VALUES ('Pogradec',1);
-- insert into agent table
INSERT INTO Agent (Salary, User_ID) VALUES (1000,1);
INSERT INTO Agent (Salary, User_ID) VALUES (500,2);
INSERT INTO Agent (Salary, User_ID) VALUES (50,4);
-- insert into agent_area table
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (1,1);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (2,2);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (2,3);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (3,1);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (3,2);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (1,3);
-- insert into property table
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('New house', 'A new entry in our catalogue from one of the best complexes in Tirana', 2, 1, 100, './assets/images/modern-house.jpg', 1, 1,1250120);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('Comfortable House', 'Beautiful house in Tirana', 2, 1, 100, './assets/images/property-1.jpg', 1, 1,12506);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('2+1 Apartment', 'Astonishing apartment in Durres', 2, 1, 100, './assets/images/apartment.jpg', 1, 2,34550);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('Last chance', 'Cheap house for your family with a nice view of the lake', 2, 1, 100, './assets/images/lake-view.jpg', 1, 3,26410);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('OKAZION', 'COMOFRTABLE HOUSE', 2, 1, 100, './assets/images/oldview.jpg', 1, 3,26410);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('Latest entry', 'Our best item yet',2, 1, 100, './assets/images/houseview.jpg', 1, 3,26410);