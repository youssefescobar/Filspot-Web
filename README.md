1.Open Xammp
2. start apache and sql

SQL COMMANDS 

create database filspot;
use database filspot;

create table users(
    id int primary key,
    email varchar(255),
   username varchar(255),
   password varchar(255)
);

3. move the downloaded project file into xammp/htdocs
4. go to localhost/Pages/register/reg.php
