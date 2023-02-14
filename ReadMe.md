On this project on the subject of WEB TECHNOLOGIES AND PROGRAMMING  we created a Real Estate website.
First in the main page we have created a navbar with the nav links HOME , ABOUT , SERVICE , PROPERTY
We have used the media queries in order in order for the website to have a better display for different users on mobile devices and desktop/laptop
We have started the main page with some static images and code sections to give an idea of an advertisement for the services and the features that this business offers to its buyers.
Then on the PROPERTIES section we have used php to load the images from the database and then display them on this file. This visualization is done by using a horizontal scrollbar which display each property , its image , its price , its agent that sells it and other features that are related to a building 
Then we have created a mini blog to show some recent feed about some properties. 

One of the requirements of the project (optional) was to generate a pdf from the website. In our website we have a contact section, where we have used the input fields for the pdf. The general description is shown below:

The contact section is a form, with the post method, where we get the contact information (name, email, number and the message).
In the php file, pdf_generator, we access the variables and perform validation with regex (also fulfilling another requirement in our project). 
In order to generate the pdf, we have used fpdf, which makes it simple to create a pdf file.
The file is saved locally at a folder specified for the pdf files. The name of the file is defined by the time, so they are going to be unique. The file is generally simple, just the variable names and their values. 
You have to just fill in the fields and then click the button to write the message. 

In general, when you open the website, you have to log in. You can either be a user or an administrator. The user will have only access to see the properties (besides the general features of the main page in the website). The administrator has the ability to see the info for the users, properties, perform operations (create, delete, etc,.) for the users and properties. The features of the login page are described below:

One thing the programmer has to be careful with is to check if someone is already logged in, this is done using sessions in php. In that case we have to just redirect them to the appropriate page. 
Otherwise, the user is asked to provide the username and the password. In the password we have used the hashing function. So even the security requirement is covered in this aspect. 
Every user is assigned a user id with the session, and status in the session as well to determine the role of the user in the website. 
This is the general overview of the login page. If the user does not exist, the user can just sign up by clicking the sign up link.

The database of the project is as specified in the requirements. We have used phpmyadmin, xampp and mysql workbench. The sql queries are provided in the project, they can be used to create the database and the tables. The tables are normalized to the third normal form. We have also created the ER diagram and the ER schema. 

One of the key features for a website  is the sign up in order to register as a new user. When you press sign up after the login page you will be redirected to signup.php file. On this file the signup window will be prompted and its functionality will be presented.
The fields for the signup are all marked REQUIRED in the html part of the code.
In order to sign up you have to fill up the fields : Name , Surname , Email , Age , Address . Username , Password.
We have associated a regex match with email : ^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$
Also for password we have another regex match : (?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$
For the password we have used the hashing function in order not to save the actual function but the hashed password. This hash is used in login in order to do the verification
The php file will not allow to sign up until all the conditions are fulfilled , if everything is okay then it will proceed wit the sign up of the new user.
This new user will be inserted into the database as a client and then the administrator will change its status if it is a new admin.

After the log in and sign up part of the website, one scenario is for the user to be a client. The client can only have access to see the properties, listed as images. This is used just to show that there is a differentiation between being a normal user and an administrator.

The user can either use the main page of the website, or the specific client page.
In order to provide more security for the website, by using htaccess, we have denied access to the directories in the project. So if a user wants to access a folder by writing in the URL, it just shows FORBIDDEN, and they cannot access it.
If the user writes a wrong url for the website, they are going to be redirected to index.php.
There is also another feature in the project, the friendly URL. If we write in the URL, property/1 or property/2, we can check the information for the those properties. They are redirected to a php file and there we can access the id of the property by using $_GET. This is another fulfilled requirement of the project. 




The last view we have is the ADMIN VIEW. On this view we have the ability to operate with the data of the users. The options of DELETE  and FILL TABLE  are done using the REST API with PHP and JAVASCRIPT using GET AND DELETE.
The fill table by using the API will load all the users from the database , turn them into a JSon file and then by stringifying the json file we are able to update the table. In the javascript file that updates the table , in order not to add values after we click once we clear the table each time the button is clicked and then we update the table by inserting the new values. 
The delete function for the API  we get the user id and username and then we delete the user.
The edit function will require that you insert all the fields to be inserted and then the ones which change will immediately be updated with the newly inserted values.
Then we also have a go back home button which redirects the user to the main page.


All the pages , main page , client page , admin page are connected using sessions so if a user is logged in and it goes back to the main page , when we click login using the session we will redirect to the next page without the need to login again. In session we save username and status in order to not allow the user to enter the admin page.


Worked by : 

- ktervoli20@epoka.edu.al
- davdiu20@epoka.edu.al
- eqevani20@epoka.edu.al
 