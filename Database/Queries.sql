CREATE TABLE User
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
  FOREIGN KEY (User_ID) REFERENCES User(ID)
);

CREATE TABLE Area
(
  Area_Id INT NOT NULL auto_increment,
  No_Properties INT NOT NULL,
  PRIMARY KEY (Area_Id)
);

CREATE TABLE Agent_Area
(
  RelationID INT NOT NULL auto_increment,
  Agent_ID INT NOT NULL,
  Area_Id INT NOT NULL,
  PRIMARY KEY (RelationID),
  FOREIGN KEY (Agent_ID) REFERENCES Agent(Agent_ID),
  FOREIGN KEY (Area_Id) REFERENCES Area(Area_Id)
);

CREATE TABLE Property
(
  Property_Id INT NOT NULL auto_increment,
  Property_Name varchar(256) NOT NULL,
  Description varchar(256) NOT NULL,
  Nr_Bedrooms INT NOT NULL,
  Nr_Bathrooms INT NOT NULL,
  Area  NOT NULL,
  Image BLOB NOT NULL,
  Agent_ID INT NOT NULL,
  Area_Id INT NOT NULL,
  PRIMARY KEY (Property_Id),
  FOREIGN KEY (Agent_ID) REFERENCES Agent(Agent_ID),
  FOREIGN KEY (Area_Id) REFERENCES Area(Area_Id)
);

-- insert into user table
INSERT INTO User (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Kevin', 'Tervoli', 21,'ktervoli20@epoka.edu.al','Gramsh','ktervoli20','pass',0);
INSERT INTO User (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Daniel', 'Avdiu', 21,'davdiu20@epoka.edu.al','Kavaje','davdiu20','pass',1);
INSERT INTO User (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Eldi', 'Qevani', 20,'eqevani20@epoka.edu.al','Berat','eqevani20','pass',2);
INSERT INTO User (Name, Surname, Age, Email, Address, username, Password, Status) VALUES ('Drilon', 'Mataj', 20,'dmataj20@epoka.edu.al','Koplik','dmataj20','pass',2);
-- insert into area table
INSERT INTO Area (No_Properties) VALUES (2);
INSERT INTO Area (No_Properties) VALUES (1);
INSERT INTO Area (No_Properties) VALUES (2);
-- insert into agent table
INSERT INTO Agent (Salary, User_ID) VALUES (1000,1);
INSERT INTO Agent (Salary, User_ID) VALUES (500,3);
INSERT INTO Agent (Salary, User_ID) VALUES (50,4);
-- insert into agent_area table
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (1,1);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (1,2);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (2,3);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (3,1);
INSERT INTO Agent_Area (Agent_ID, Area_Id) VALUES (3,2);
-- insert into property table
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('House1', 'House in Gramsh', 2, 1, 100, './assets/images/logo.png', 1, 1,1250120);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('Comfortable House', 'Beautiful house in Tirana', 2, 1, 100, './assets/images/property-1.jpg', 1, 1,12506);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('New House', 'Astonishing house in Durres', 2, 1, 100, './assets/images/property-2.jpg', 1, 1,34550);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('Okazion', 'Cheap house for your family ', 2, 1, 100, './assets/images/property-3.jpg', 1, 1,26410);
INSERT INTO Property (Property_Name, Description, Nr_Bedrooms, Nr_Bathrooms, Area, Image, Agent_ID, Area_Id,Price) VALUES ('OMG', 'Buy this house now', 2, 1, 100, './assets/images/property-4.jpg', 1, 1,26410);