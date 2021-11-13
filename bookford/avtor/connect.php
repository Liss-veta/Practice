<?php

session_start();
require 'on_BD.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = md5($_POST['password']);
$password_confirm = md5($_POST['password_confirm']);


if($password === $password_confirm) {
    $path = 'images_for_reg/' . time() . $_FILES['profile']['name'];
    //путь файла на сервере
    if(!move_uploaded_file($_FILES['profile']['tmp_name'], '../' . $path))
    {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        header('Location: ../index.html');
    }
//    Добавить переход в js блок Авторизация!
    header('Location: ../index.php');
    $qwerty = $user->query("INSERT INTO `userss` (`id_user`, `name`, `surname`, `login`, `email`, `profile`, `password`) VALUES (NULL, '$name', '$surname', '$login', '$email', '$path', '$password')");
}
else{
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../index.php');
//    echo "<script src='../js/avtoriz.js'>openFormReg();</script>";
}


