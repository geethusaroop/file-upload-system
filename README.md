# file-upload-system

Documentation
-------------------------
Secured File Uploading System
---------------------------------------
Registration Form
-------------------------
Form Contain users details - name,email,phone ,username,password 
-Adding Javascript Validation for email,username,name and password
-using encryted password

Login Form 
----------
-Enter the username and password then check the username exist or not .if exist check the password is correct or not.both password and username are correct ,it will go to the corresponding users dashboard.
Admin Login
----------------------------
Url : http://localhost/FileUploadSystem/login.php
username : admin
password :admin123

Dashboard : Dashboard Contain all users upload details

Users : Users table contail user details

Log : Log table show all records of upload details (user name and file name),ip address,time of upload

Logout : if  clicked the logout button, it will go to login page.

User Login 
------------------
Url : http://localhost/FileUploadSystem/login.php
username : geethu999
password :geethu123

Dashboard : Dashboard Contain logged in user upload details.

upload File : 
----------------
	1. its form to insert new file.
	2. setting a javascript validation.if the file is not select,it shows a validation error.
	3. when submitting the upload form check two functions one is the allowed type-checking function   	    and the second is the Sanitization function which also checks that the file size is not greater than 	    5MB. Upload the file if the above validations are true.

Logout : if  clicked the logout button, it will go to login page.



