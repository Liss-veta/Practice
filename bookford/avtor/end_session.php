<?php

session_start();
//грохаем данные пользователя
unset($_SESSION['polzovatel']);
header('Location: ../index.php');