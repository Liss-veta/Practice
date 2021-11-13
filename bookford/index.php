
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookford</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/reg_avtoris.css">
</head>
<body>


<!--Авторизация-->
    <div class="okno_avto"  id="okno_avto">
        <div class="div">
        <h3>Авторизация </h3>
            <button class="closeForm" onclick="closeForm()">&#215;</button>
         <!--Данные не кодируются. Это значение применяется при отправке файлов. 'enctype = multipart/form-data'-->
        <form action="avtor/login.php" class="avtorizacia" method="post" enctype="multipart/form-data">
            <label for="">Логин</label>
            <input type="text" name="login" placeholder="Введите свой логин">
            <label for="">Пароль</label>
            <input type="password" name="password" placeholder="Введите свой пароль">
            <button type="submit">Войти</button>
            <p>У вас нет аккаунта? - <a href="#" onclick="openFormReg(), closeForm()">Зарегистрируйтесь</a></p>
            <!--вывод сообщения снизу-->
            <?php
            if($_SESSION['message'])
            {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </form>
        </div>
    </div>

<!--Регистрация-->
<div class="okno_reg" id="okno_reg">
    <div class="div">
    <h3>Регистрация</h3>
    <button class="closeFormReg" onclick="closeFormReg()">&#215;</button>
    <form action="avtor/connect.php" class="registracia" method="post" enctype='multipart/form-data'>
        <div>
            <label for="">Имя</label>
        <input type="text" name="name" placeholder="Введите своё имя" >
            <label for="">Фамилия</label>
            <input type="text" name="surname" placeholder="Введите свою фамилию" >
        <label for="">Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label for="">Почта</label>
        <input type="email" name="email" placeholder="Введите свой E-mail">
        <label for="">Изображение профиля</label>
        <input type="file" name="profile">
        <label for="">Пароль</label>
        <input type="password" name="password" placeholder="Введите свой пароль">
        <label for="">Подтверждение пароля</label>
        <input type="password" name="password_confirm" placeholder="Подтвердите пароль">
    </div>
        <button type="submit">Зарегистрироваться</button>

        <!--      вывод сообщения снизу-->
        <?php
                    if($_SESSION['message'])
                    {
                        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
                    }
                    unset($_SESSION['message']);
                    ?>
    </form>
        <p class="voiti">Уже есть аккаунт? - <a href="#" onclick="openForm(), closeFormReg()">Войти</a></p>
    </div>
</div>

    <header>
        <div class="auto">
            <a href="#" id="vhod_avto" onclick="openForm()">Вход</a>
            <p>| |</p>
            <a href="#" id="vhod_reg" onclick="openFormReg()">Регистрация</a>
        </div>
        <!--Логотип -->
        <div class="logo"></div>
        <!--Каталог -->
        <div class="nav">
            <div class="katalog">
            <a href="#" class="punkt_menu">Каталог</a>
            <div class="menu">
                <a href="#">Авторов</a>
                <a href="#">Произведений</a>
            </div>
        </div>
        </div>
    </header>

<!--Поиск по странице-->

<section class="search">
    <div>
        <h1>Bookford</h1>
        <form action="">
            <input type="search" name="text" class="nav-search" required placeholder="Поиск по сайту">
            <input type="submit" value="Поиск" class="button_search">
        </form>
    </div>
    <img src="images/DLS2R3VWsAEcpl5.jpg"  style="width: 320px; height: 320px" alt="">
    </section>


<!--Каталог авторов слайдер-->
    <section class="avtor">
        <h2>Каталог авторов</h2>
        <!--slider avtorov -->
        <div class="slider-avtorov">
            <div id="prev-img-container"><img id="prev-img" alt=""></div>
            <div class="itk-slider">
               <button id="onPrevbtn"> << </button>
               <img id="image" alt="">
               <button id="onNextbtn"> >> </button>
            </div>
            <div id="next-img-container"><img id="next-img" alt=""></div>
        </div>
        <!-- имя автора на слайдере выше -->
        <h3 id="name_avtor"></h3>
        <!-- его описание -->
        <div class="harakterist-css">
            <p id="harakteristika"></p>
        </div>

    </section>
    <section class="opisanie_avtor">

    </section>
        <section class="proizved">
            <h2>Каталог произведений</h2>
            <!--slider proizvedeni -->
        </section>
        <section class="opisanie_proizved">
            <!-- название произведения на слайдере выше -->
            <h3></h3>
            <!-- его описание -->
            <p></p>
    </section>
    <section class="registriruites">
        <h2>Хотите добавлять авторов и их произведения на наш сайт?</h2>
        <h2>Станьте администратором нашего сайта!</h2>
        <a href="#" onclick="openFormReg()">Регистрируйтесь!</a>
    </section>
<section class="komment">
    <h2>Делитесь комментариями о прочитанном</h2>
    <div class="comm">
        <form class="kommentarii" action="" method="post">
            <div>
                <label for="">Ваше имя:</label>
                <input type="text" name="name" placeholder="Введите имя">
                <input type="hidden" name="page_id" value="150" />
            </div>
            <div>
                <label for="">Ваш комментарий:</label>
                <textarea name="text_comment" id="" cols="30" rows="10"></textarea>
            </div>
        </form>
        <button>Отправить</button>
    </div>
</section>
<footer>
    <p>&#169 Bookford, 2021 || Мир книг</p>
</footer>
    <script src="js/slaider.js"></script>
<script src="js/avtoriz.js"></script>
</body>
</html>