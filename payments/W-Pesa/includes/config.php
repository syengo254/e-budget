<?php
//DEVELOPER DAVID SYENGO. 
//THIS IS THE W-PESA SETTINGS CONFIGURATIONS FILE.
//JUST SET THE SECRET KEY AS YOU WILL IN SMS-SYNC BY USHAHIDI OR ANY OTHER SMS GATEWAY. 
//THE DEFAULT SECRET KEY IS 1234 BUT YOU SHOULD CHANGE IT FOR SECURITY.
//THEN SET THE DATABASE NAME, USERNAME AND PASSWORD FOR THE ONE YOU CREATED. CHECK THE DOCUMENTATION README FOR DETAILS.
//ALSO SET YOUR PHONE NUMBER THAT WILL SEND MESSAGES TO THIS SERVER.
//TO DEPLOY ON A REAL SERVER OTHER THAN YOUR LOCAL XAMPP PROJECTS SET THE SIM MODE TO FALSE, BY DEFAULT IT IS TRUE.


$_SECRET_KEY = "123456";  //This is the default value, you may leave it unchanged for testing purposes only.

$DB_NAME = "e-budget";     //This is the default value, you may leave it unchanged for testing purposes only.

$DB_USERNAME = "root";  //This is the default value, you may leave it unchanged for testing purposes only.

$DB_PASSWORD = "";      //This is the default value, you may leave it unchanged for testing purposes only.

$PHONE_NUM = "+254712594022"; //This is the default.

$SIM_MODE = TRUE;  //This is the default value, you may leave it unchanged for testing purposes only.
?>