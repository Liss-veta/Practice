<?php
try {
    $bookford = new PDO('mysql:host=localhost;dbname=bookford1;charset=UTF8', 'root', 'root', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch (PDOException $e){
    echo 'Подключение не удалось'.$e->getMessage();
    exit();
}

$name_avtor = $_POST['name_avtor'];
$name_works = $_POST['name_works'];
$janr = $_POST['janr'];
$strana = $_POST['strana'];
$comm_works=$_POST['comm_works'];
$year = $_POST['year'];

$form = [
    "name_avtor" =>$_POST['name_avtor'],
    "name_works" => $_POST['name_works'],
    "janr" => $_POST['janr'],
    "strana" => $_POST['strana'],
    "comm_works" => $_POST['comm_works'],
    "year" => $_POST['year']
];

zapusk($bookford, $form);
function zapusk($bookford, $form)
{
    if (!empty($name_avtor) && !empty($name_works) && !empty($janr) && !empty($comm_works) && !empty($year)) {
        function searchIdWorks($form, $bookford)
        {
            $one = $bookford->query("SELECT `id_works` FROM `works` WHERE `name_works` LIKE '{$form['name_works']}'");
            $id_works = $one->fetch(PDO::FETCH_ASSOC);
            $id_works['id_works'] = (int)$id_works['id_works'];
            return $id_works;
        }

        function searchIdAvtor($form, $bookford)
        {
            $one = $bookford->query("SELECT `id_avtor` FROM `avtor` WHERE `name_avtor` LIKE '{$form['name_avtor']}'");
            $id_avtor = $one->fetch(PDO::FETCH_ASSOC);
            $id_avtor['id_avtor'] = (int)$id_avtor['id_avtor'];
            return $id_avtor;
        }

//    Есть автор, но нет книги
        $avtor_table = $bookford->query("SELECT name_avtor FROM `avtor`");
        $avtor_table->fetchall(PDO::FETCH_COLUMN);
        foreach ($avtor_table['name_avtor'] as $elem) {
            if ($avtor_table['name_avtor'][$elem] == $form['name_avtor']) {
                $works_table = $bookford->query("SELECT name_works FROM `works`");
                $works_table->fetchall(PDO::FETCH_COLUMN);
                // Есть книга и есть автор
                foreach ($works_table['name_works'] as $element) {
                    if ($works_table['name_works'][$element] == $form['name_works']) {
                        echo print_r("Такое произведение с таким автором уже существует!");
                    } elseif($works_table['name_works'][$element] != $form['name_works']) {
//                        Есть автор нет книги
                        $avtor_id = $bookford->query("SELECT id_avtor FROM `avtor` WHERE 'name_avtor' = {$form['name_avtor']}");
                        $bookford->query("INSERT INTO `works` (`id_works`, `name_works`, `janr`, `img_work`, `comment`, `year`) VALUES (NULL , '{$form['name_works']}', '{$form['janr']}', '', '{$form['comm_works']}', '{$form['year']}')");
                        $id_works = searchIdWorks();
                        $bookford->query("INSERT INTO `avtor_works` (`id_avtor`, `id_works`) VALUES ('$avtor_id', '{$id_works['id_works']}')");
                    }
                }
            }
        }
//    Есть книга, но дополнительный автор
        foreach ($works_table as $element) {
            if ($works_table[$element] == $form['name_works']) {
                $works_id = $bookford->query("SELECT id_works FROM `works` WHERE 'name_works' = {$form['name_works']}");
                $bookford->query("INSERT INTO `avtor` (`id_avtor`, `name_avtor`, `img_avtor`, `strana`) VALUES (NULL, '{$form['name_avtor']}', '' , '{$form['strana']}')");
                $id_avtor = searchIdAvtor();
                $bookford->query("INSERT INTO `avtor_works` (`id_avtor`, `id_works`) VALUES ('{$id_avtor['id_avtor']}', '$works_id')");
                die();
            }
        }
        $bookford->query("INSERT INTO `avtor` (`id_avtor`, `name_avtor`, `img_avtor`, `strana`) VALUES (NULL, '{$form['name_avtor']}', '' , '{$form['strana']}')");
        $bookford->query("INSERT INTO `works` (`id_works`, `name_works`, `janr`, `img_work`, `comment`, `year`) VALUES (NULL , '{$form['name_works']}', '{$form['janr']}', '', '{$form['comm_works']}', '{$form['year']}')");

        $one = $bookford->query("SELECT `id_avtor` FROM `avtor` WHERE `name_avtor` LIKE '{$form['name_avtor']}'");
        $id_avtor = $one->fetch(PDO::FETCH_ASSOC);
        $two = $bookford->query("SELECT `id_works` FROM `works` WHERE `name_works` LIKE '{$form['name_works']}'");
        $id_works = $two->fetch(PDO::FETCH_ASSOC);
        $id_works['id_works'] = (int)$id_works['id_works'];
        $id_avtor['id_avtor'] = (int)$id_avtor['id_avtor'];

        print_r($id_works['id_works']);
// ВСТАВВЛЯЕМ ID'S В СВЯЗЫВАЮЩУЮ ТАБЛИЦУ
        $bookford->query("INSERT INTO `avtor_works` (`id_avtor`, `id_works`) VALUES ( '{$id_avtor['id_avtor']}', '{$id_works['id_works']}')");

    }
}






/*$name_avtor = $_POST['name_avtor'];

$data_birthday = $_POST['data_birthday'];
$strana = $_POST['strana'];
//$img_avtors = $_POST['img_avtors'];
print_r($name_avtor);
print_r($data_birthday);
print_r($strana);
//print_r($img_avtors);
print_r($_FILES);

   /* $path_avtor = 'img_avtor/' . time() . $_FILES['file']['name'];
    //путь файла на сервере
    if(!move_uploaded_file($_FILES['img_avtors']['tmp_name'], '../' . $path_avtor))
    {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        print_r($path_avtor);
        print_r($_FILES['img_avtors']);
        //header('Location: ../login.php');
    }
    $strana_table = $bookford -> prepare("SELECT * FROM `strana` WHERE `strana` = ?");
    $strana_table->execute(array($strana));
    $arrayStrana = $strana_table->fetch(PDO::FETCH_ASSOC);
    $id_strana = $arrayStrana->id_strana;

$name_works = $_POST['name_works'];
$data_works = $_POST['data_works'];
$janr = $_POST['janr'];
$img_works = $_POST['img_works'];

$janr_table = $bookford -> prepare("SELECT * FROM `janr` WHERE `id_janr` = ?");
$janr_table->execute(array($janr));
$arrayJanr = $janr_table->fetch(PDO::FETCH_ASSOC);
$id_janr = $arrayJanr->id_janr;

$data = [
    "name_avtor" => $_POST['name_avtor'],
    "data_birthday" =>$_POST['data_birthday'],
    "id_strana" =>$id_strana,
];

$data_works = [
    "name_works" => $_POST['name_works'],
    "data_works" =>$_POST['data_works'],
    "id_janr" =>$id_janr,
];


$bookford->query("INSERT INTO `avtor` (`id_avtor`, `name_avtor`, `data_birthday`, `img_avtor`, `id_strana`) VALUES (NULL, '{$data['name_avtor']}', '{$data['data_birthday']}', '' , '{$data['id_strana']}')");
$bookford->query("INSERT INTO `works` (`id_works`, `name_works`, `id_janr`, `data_works`, `img_work`) VALUES (NULL, '{$data_works['name_works']}', '{$data_works['id_janr']}', '{$data_works['data_works']}', '')");

 /*   print_r($id_strana);
$check = "INSERT INTO `avtor` (id_avtor = NULL, name_avtor = :name_avtor, data_birthday = :data_birthday, img_avtor = NULL, id_strana = :id_strana)";
$params = [':name_avtor' => $name_avtor,
    ':data_birthday' => $date_birthday,
    ':id_strana' => $id_strana];

$check_user = $bookford->prepare($check);
$check_user->execute($params);

$avtors_table = $bookford->prepare("INSERT INTO `avtor` (`id_avtor`, `name_avtor`, `data_birthday`, `img_avtor`, `id_strana`) VALUES (NULL, :name_avtor, :data_birthday, NULL, :id_strana)");
$avtors_table->execute([':name_avtor' => $name_avtor,
    ':data_birthday' => $date_birthday,
    ':id_strana' => $id_strana

]);
$avtor_table = $bookford->query("INSERT INTO `avtor` (`id_avtor`, `name_avtor`, `data_birthday`, `img_avtor`, `id_strana`) VALUES (NULL, '$name_avtor', '$date_birthday', NULL, '$id_strana' )");
*/

 /*   $path_works = 'img_works/' . time() . $img_works;
    //путь файла на сервере
    if(!move_uploaded_file($_FILES['img_works']['tmp_name'], '../' . $path_works))
    {
        $_SESSION['message'] = 'Ошибка при загрузке изображения';
        //header('Location: ../index.html');
    }
$works_table = $bookford->prepare("INSERT INTO `works` (`id_works`, `name_works`, `id_janr`, `data_works`, `img_work`) VALUES (NULL, :name_works, :id_janr, :data_works, NULL)");
$works_table->execute([
    'name_works' => $name_works,
    'id_janr' => $id_janr,
    'data_works' => $date_works
]);
//$works_table = $bookford->query("INSERT INTO `works` (`id_works`, `name_works`, `id_janr`, `data_works`, `img_work`) VALUES (NULL, '$name_works', '$id_janr', '$date_works', NULL) ");

//$avtor_works = $bookford->query("INSERT INTO `avtor_works` (`id_avtor_works`, `id_avtor`, `id_works`) VALUES (NULL, )")


*/