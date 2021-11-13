<?php
session_start();
require 'on_BD.php';

//проверка авторизации//


//логин и пароль которые ввел пользователь для входа
$login = $_POST['login'];
$password = md5($_POST['password']);
//вытаскиваем из бд эти же данные

if(!empty($login) && !empty($password)) {
    $check = "SELECT * FROM userss WHERE login = :login";
    $params = [':login' => $login];

    $check_user = $user->prepare($check);
    $check_user->execute($params);

    $polzovatel = $check_user->fetch(PDO::FETCH_OBJ);
    if($polzovatel){
        if($password === $polzovatel -> password) {
            $_SESSION['polzovatel'] = [
                "id" => $polzovatel -> id,
                "name" =>$polzovatel -> name,
                "surname" => $polzovatel -> surname,
                "login" =>$polzovatel -> login,
                "profile" => $polzovatel -> profile,
                "email" => $polzovatel -> email
                ];
            $_SESSION['message'] = "Вход выполнен успешно!";
            header('Location: ../index2.php');
        }
        else {
            $_SESSION['message'] = "Неверный пароль";
        }
    }
    else {
        $_SESSION['message'] = "Данного пользователя не существует";
    }
}
else {
    $_SESSION['message'] = "Введите данные!";
}

//
//$check_user->execute(array('login' => $login));
//$check_user->execute(array('password' => $password));
//
//if ($row = $check_user->fetchAll()) {
//    //добавляем в виде массива в переменную данные пользователя
//    $user = mysqli_fetch_assoc($check_user);
//
//
//    $_SESSION['user'] = [
//        "id" => $user['id'],
//        "name" =>$user['name'],
//        "profile" => $user['profile'],
//        "email" => $user['email']
//    ];
//    $_SESSION['message'] = 'Вход выполнен успешно!';
//    header('Location: ../index2.php');
//}
//else {
//    $_SESSION['message'] = 'Вход не выполнен, несовпадение
