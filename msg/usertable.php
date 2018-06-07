<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db='demo';
$mysqli=mysqli_connect($host, $user,$pass,$db);
$mysqli->query('
CREATE TABLE `demo`.`user` 
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(15) NOT NULL,
     `last_name` VARCHAR(15) NOT NULL,
    `email` VARCHAR(20) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
    `my_image` BLOB NOT NULL,
    `gender` INT NOT NULL,
    `user_name` VARCHAR(15) NOT NULL,
PRIMARY KEY (`id`) 
);') or die($mysqli->error);

$mysqli->query('
	CREATE TABLE `demo`.`friends`
	(
		`p1` VARCHAR(20) NOT NULL,
		`p2` VARCHAR(20) NOT NULL
	); 
') or die ($mysqli->error);
$mysqli->query('
	CREATE TABLE `demo`.`msgs`
	(
		`sender` VARCHAR(20) NOT NULL,
		`reciever` VARCHAR(20) NOT NULL,
		`msg` TEXT(300) NOT NULL,
		`files` BLOB NOT NULL,
		`dt` DATE,
		`tm` TIME
	); 
') or die ($mysqli->error);

?>