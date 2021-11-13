//вытаскиваем из html id
let prev = document.getElementById('onPrevbtn');
let next = document.getElementById('onNextbtn');
let image = document.getElementById('image');
let prev_img = document.getElementById('prev-img');
let next_img = document.getElementById('next-img');
let h3 = document.getElementById('name_avtor');
let p = document.getElementById('harakteristika');

console.log(h3);

//вызов функций при нажатии на кнопки
prev.addEventListener('click', onPrevclick);
next.addEventListener('click', onNextclick);

//массив картинок слайдера
let images_src = [];
images_src.push('../images/slaider1.jpg');
images_src.push('../images/slaider2.jpg');
images_src.push('../images/slaider3.jpg');
images_src.push('../images/slaider4.jpg');


//массив имен авторов
let name_h3 = [];
name_h3.push('Джоан Роулинг');
name_h3.push('Стивен Кинг');
name_h3.push('Джоан Роулинг');
name_h3.push('Джоан Роулинг');



//массив их характеристик
let haracteristik_p = [];
haracteristik_p.push('Джоан Роулинг (J.K. Rowling, год рождения 21.07.1965) – британская писательница, автор серии книг про Гарри Поттера. В этой заметке вы узнаете ее биографию, посмотрите фото, список книг, состояние, а также информацию о детях, личной жизни и наиболее интересные цитаты и высказывания.' +
    'Приключения мальчика-волшебника стали вторыми, после Библии, самыми продаваемыми книгами. Серия романов об учебе в Хогвартсе выпущена полумиллиардным тиражом и переведена на 70 языков.\n' +
    '\n' +
    'В 2004 г-жа Роулинг была названа самой богатой женщиной Великобритании, а в 2011 стала единственной писательницей, заработавшей литераторством свыше 1 млрд.$.');
haracteristik_p.push('Стивен Эдвин Кинг (Stephen Edwin King, год рождения 21.09.1947, Портленд, Мэн, США и по настоящее время) – американский писатель, автор романов, которые разошлись более 350 млн. экземплярами.\n' +
    '\n' +
    'Стивен Эдвин Кинг\n' +
    'За свою творческую жизнь Кинг опубликовал свыше 250 произведений: 56 романов, 5 научно-популярных книг и около 200 рассказов. По произведениям литератора снято более сотни фильмов и телесериалов, а его имя стало синонимом жанра «хоррор». Продажи его книг достигают рекордных отметок, романы становятся бестселлерами и попадают в списки «Must read».\n' +
    '\n' +
    'История успеха Стивена Кинга примечательна тем, что будучи американским писателем до мозга костей, который не особо интересуется миром за пределами своей страны, он смог завоевать международную популярность.');




//начальное положение слайдера картинок
let current_images_src = 0;
image.src = images_src[current_images_src];
next_img.src = images_src[current_images_src+1];
prev.disabled = true;
prev_img.style.display = 'none';

//начальное положение имен и характеристик
let current_name_h3 = current_images_src;
let current_harakteristika_p = current_name_h3;
h3.innerHTML = name_h3[current_images_src];
p.innerHTML = haracteristik_p[current_images_src];


console.log(h3);

//нажатие на левую кнопку
function onPrevclick() {
    current_images_src--;
    next_img.style.display = 'block';
    image.src = images_src[current_images_src];
    prev_img.src = images_src[current_images_src-1];
    next_img.src = images_src[current_images_src+1];
    next.disabled = false;

    h3.innerHTML = name_h3[current_images_src];
    p.innerHTML = haracteristik_p[current_images_src];

    if(current_images_src === 0){
        prev.disabled = true;
        prev_img.style.display = 'none';
    }
}


//нажатие на правую кнопку
function onNextclick() {
    current_images_src++;
    prev_img.style.display = 'block';
    image.src = images_src[current_images_src];
    prev_img.src = images_src[current_images_src-1];
    next_img.src = images_src[current_images_src+1];
    prev.disabled = false;

    h3.innerHTML = name_h3[current_images_src];
    p.innerHTML = haracteristik_p[current_images_src];

    if(current_images_src === (images_src.length-1)){
        next.disabled = true;
        next_img.style.display = 'none';
    }

}