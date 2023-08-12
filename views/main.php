<?php  
    $mainNum = (isset($_COOKIE['main'])) ? $_COOKIE['main'] : 0;
    $mainNum++;
    setcookie('main', $mainNum,  0, BASE_URL);
    
    $baseShift = strlen(BASE_URL);
    $relativeUrl = substr($_SERVER['REQUEST_URI'], $baseShift);
    $partCount = 0;

    if(is_numeric(strpos($relativeUrl ,'User'))){
        $partCount = (isset($_COOKIE['user'])) ? $_COOKIE['user'] : 0;
        $partCount++;
        setcookie('user', $partCount,  0, BASE_URL);
    }
    else if(is_numeric(strpos($relativeUrl ,'City')) || empty($relativeUrl)){
        $partCount = (isset($_COOKIE['city'])) ? $_COOKIE['city'] : 0;
        $partCount++;
        setcookie('city', $partCount,  0, BASE_URL);
    }
    else if(is_numeric(strpos($relativeUrl ,'search'))){
        $partCount = (isset($_COOKIE['search'])) ? $_COOKIE['search'] : 0;
        $partCount++;
        setcookie('search', $partCount,  0, BASE_URL);
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Тестовое задание Webcompany</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="<?=BASE_URL?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/jquery-1.1.3.1.min.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/jquery.easing.min.js"></script>
        <script type="text/javascript" src="<?=BASE_URL?>assets/js/jquery.lavalamp.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $("#1, #2, #3").lavaLamp({
                    fx: "backout",
                    speed: 700,
                    click: function (event, menuItem) {
                        return true;
                    }
                });
            });
        </script>
        <link href="<?=BASE_URL?>assets/css/lavalamp.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div id="wrap">
            <div id="topbg"> </div>
            <div id="wrap2">
                <div id="topbar">
                    <img style="float:left;margin:0 150px 0 20px;height:65px;" src="<?=BASE_URL?>assets/images/logo.svg" alt="logo"> 
                        <h1 id="sitename"><a href="#">Тестовое задание</a> <span class="description"></span></h1>
                </div>
                <div id="header">
                    <div id="headercontent"> </div>
                    <div id="topnav">
                        <ul class="lavaLampWithImage" id="1">
                            <li class='current' ><a href="<?=BASE_URL?>">Города</a></li>
                            <li  ><a href="<?=BASE_URL?>Users">Пользователи</a></li>
                            <li  ><a href="<?=BASE_URL?>search">Поиск</a></li>
                        </ul>
                    </div>
                </div>
                <div id="content">
                    <div id="left">   
                        <div class="post">
                            <div class="postheader"> </div>
                            <div class="postcontent"> 
                                <h2>Общее количество загрузок страницы = <b><?=$mainNum?></b></h2>
                            </div>
                            <div class="postbottom">
                                <h3 style=" margin-left: 25px; ">Вы посещали эту страницу <b><?=$partCount?></b>раз</h3>                 
                            </div>
                        </div>
                        <div class="post">
                            <div class="postheader"> </div>
                            <div class="postcontent">
                                <?=$content?>
                            </div>
                            <div class="postbottom"></div>
                        </div> 
                    </div>
                    <div id="sidebar">
                        <h3> <b>Слева рабочая модель.</b></h3>
                        <h3>Описание тестового задания</h3>
                        <div class='zadanie'>
                            <h4>Общее для всех страниц</h4>
                            <ul>
                                <ol>1 Общий счетчик на сайт</ol>
                                <ol>2 Счетчик на каждую страницу</ol>
                            </ul>
                            <h4>Страница города</h4>
                            <ul>
                                <ol>1 Вывод всех городов</ol>
                                <ol>2 Добавление</ol>
                                <ol>3 Удаление</ol>
                                <ol>4 Редактирование</ol>
                                <ol><b>5 Сортировка</b></ol>
                                <ol>5.1 Выбор направления</ol>
                                <ol>5.2 Выбор поля</ol>
                            </ul>
                            <h4>Страница Пользователи</h4>
                            <ul>
                                <ol>1 Вывод всех Пользователей</ol>
                                <ol>2 Добавление</ol>
                                <ol>3 Удаление</ol>
                                <ol>4 Редактирование</ol>
                                <ol><b>5 Сортировка</b></ol>
                                <ol>5.1 Выбор направления</ol>
                                <ol>5.2 Выбор поля</ol>
                                <ol>6 Фильтр по городам</ol>
                            </ul>
                            <h4>Страница Поиск</h4>
                            <ul>
                                <ol>1 Форма поиска</ol>
                                <ol>2 Поиск по фамилии</ol>
                                <ol>3 Поиск по имени</ol>
                                <ol>4 Вывод результатов</ol>
                            </ul>
                            <h3>Описание связей</h3>
                            <p>
                                Если изменяем название города Орша На Орша1 
                                то у всех пользователей которые были выбрали Орша 
                                Станет так-же Орша1 и во всех списках выбора города будет уже Орша1
                            </p>
                            <h3>Требование при выполнении</h3>
                            <p>
                                <h4>Не использовать фреймворки!!!</h4>
                                <h4>Использовать разбитие кода на функции</h4>
                                <h4>Понятные названия переменных</h4>
                                <h4>Язык прогроммирования серверной части PHP</h4>
                                <h4>Использование $_COOKIE для счетчиков</h4>
                            </p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div id="footer"> 
                    <div class="credit">Webcompany 2023г</div>
                </div>
            </div>
            <div id="btmbg"> </div>
        </div>
    </body>
</html>
