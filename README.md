# project

-> first run "git clone https://github.com/imvsrajput/project.git" in blank dir.

-> cd project 

--> import database from database/database.sql

<!-- update your databse,user,password,hostname 
 my databse is test -->
---> config application\config\databse.php

<!--goto this url  'http://localhost:8099/' -->
----> go to project directory and run "php -S localhost:8099 index.php" in project directory

->check http://localhost:8099/

-Credentials ->Shopkeeper  -> mobile no.: 9810640549
                           -> password: imvs
-Credentials ->Users       -> username: karan
                           -> password: karan

-> go to shopkeeper account
--> add lists in nav bar  2-3
---> http://localhost:8099/vendor/list check list

<!-- api get/post method -->
---->user/login -> http://localhost:8099/user/login

<!-- api get/post method -->
---->user/registration  -> http://localhost:8099/user/registration 

<!-- api get/post method -->
---->vendor/login -> http://localhost:8099/vendor/login

<!-- api get/post method -->
---->vendor/registration  -> http://localhost:8099/vendor/registration 

<!-- api get method but only json data retun of curent user if no user login then all list shall be shown -->
---->localhost/vendor/list  -> http://localhost:8099/vendor/list 


