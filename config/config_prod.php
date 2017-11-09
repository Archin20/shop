<?php
session_start();

//$title='Название сайта';
$description='Описание сайта 1-23символов';
$keywords='товары.и т.д.';


$email='name@email.com';
//Переменные подключения
$db_location='localhost'; //путь к серверу по умолчанию localhost
$db_user='root';
$db_password='';
$db_name='new-bd';
$db_con=mysqli_connect($db_location,$db_user,$db_password,$db_name);//подключение функции

if(!$db_con){
	exit('Error');
}