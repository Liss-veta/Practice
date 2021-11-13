<?php
session_start();
try {
    $user = new PDO('mysql:host=localhost;dbname=user;charset=UTF8', 'root', 'root');
}catch (PDOException $e){
    echo 'Подключение не удалось'.$e->getMessage();
    exit();
}

////require_once ('connect.php');
//
//try {
//    $user = new PDO('mysql:host=localhost;dbname=bookford;charset=UTF8', 'root', 'root');
//}catch (PDOException $e){
//    echo 'Подключение не удалось'.$e->getMessage();
//    exit();
//}
//
////$user->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
////проверка регистрации//
//
//$name = $_POST['name'];
//$surname = $_POST['surname'];
//$login = $_POST['login'];
//$email = $_POST['email'];
//$password = md5($_POST['password']);
//$password_confirm = md5($_POST['password_confirm']);
//
//
//if($password === $password_confirm)
//{
//    //путь куда загружается картинка
//    $path = 'images_for_reg/' . time() . $_FILES['profile']['name'];
//    //путь файла на сервере
//    if(!move_uploaded_file($_FILES['profile']['tmp_name'], '../' . $path))
//    {
//        $_SESSION['message'] = 'Ошибка при загрузке изображения';
//        header('Location: ../index.php');
//    }
//
//    $qwerty = $user->query("INSERT INTO `users` (`id_user`, `name`, `surname`, `login`) VALUES (NULL, '$name', '$surname', '$login')");
//    //$user->query("INSERT INTO `users` (`id_user`, `name`, `surname`, `login`, `email`, `profile`, `password`) VALUES (NULL, '$name', '$surname','$login', '$email', '$path', '$password')");
//   // $qwa = $user->query("SELECT * from 'userss'");
//
//    $_SESSION['message'] = 'Регистрация прошла успешно';
//    header('Location: ../index2.php');
//
//    //добавление в бд
//    //mysqli_query($user, "INSERT INTO `users` (`id_user`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");
//}
//else{
//    $_SESSION['message'] = 'Пароли не совпадают';
//    header('Location: ../index.php');
//}