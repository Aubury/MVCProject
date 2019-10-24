<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/css/fonts.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/modal.css"?></style>

    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max960px.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max768px.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max640px.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max600px.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max500px.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max430px.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style_max375px.css"?></style>

    <title>GIM</title>
</head>
<body>
<header class="header">
    <button class="top topHide"><span>&lt;</span></button>
    <div class="container">
        <div class="section left__header__content">
            <div class="logo">
                <img src="/views/img/logo.png" alt="logo__company">
            </div>
            <div class="companySlogan">
                <p>Главное</p>
                <p>иметь</p>
                <p>мечту</p>
            </div>
        </div>
        <div class="section right__header__content">
            <div class="navigation_group_mobile showHide">
                <div class="menu">
                    <input type="checkbox" class="hide" id="menu_logo">
                    <div class="logo_menu">
                        <label for="menu_logo">
                            <img src="/views/img/video.jpg" width="40" height="40" alt="">
                        </label>
                    </div>
                    <div class="elements_menu">
                        <ul>
                            <li class="countPeoples">Нас уже: <span class="users"></span></li>
                            <li>О нас</li>
                            <li><a href="#progects">Наши проекты</a></li>
                            <li><a href="#contacts">Контакты</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="companySloganNone">
                <p>Главное иметь мечту</p>
            </div>
            <div class="userRoom">
                <a href="#modal"><button class="room__users">Личный кабинет</button></a>
            </div>
            <nav class="nav">
                <ul class="navigation">
                    <li class="countPeoples">Нас уже: <span class="users"></span></li>
                    <li>О нас</li>
                    <li><a href="#progects">Наши проекты</a></li>
                    <li><a href="#contacts">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<main class="main">
    <div class="container">
        <div class="section about__us">
            <h2>О нас</h2>
            <div class="about__us__top__content">
                <p> <img src="/views/img/page.jpg" class="certificate rightFloatImg" alt="certificate" title="свидетельство">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                </p>
            </div>
            <h2>История кооператива</h2>
            <div class="about__us__bottom__content">
                <p><img src="/views/img/dream.jpg" alt="" class="leftFloatImg">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                </p>
            </div>
            <div class="video">
                <img src="/views/img/video.jpg" alt="">
                <img src="/views/img/video.jpg" alt="">
            </div>
        </div>
        <div class="section progect">
            <div class="progect__left__content">
                <div class="img__progect">
                    <img src="/views/img/car.jpg" alt="">
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus voluptatum laborum doloremque ratione. Consectetur hic, consequuntur veniam odit est temporibus tempora praesentium quae, ratione quo totam mollitia eos possimus expedita. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi officia omnis dolore corporis molestiae placeat recusandae numquam, itaque quos asperiores minima rem, autem ullam, quis fugiat mollitia quasi maiores ipsam!
                </p>
            </div>
            <div class="progect__right__content">
                <h2 id="progects">Первый проект</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, fugiat, praesentium ipsam odio quo ut inventore ratione dolor eius officiis nihil optio debitis quae velit voluptatibus esse, in nemo necessitatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro quidem dolorum sit aperiam dolore expedita ab ea fugiat laudantium aut explicabo a deserunt, nesciunt ut animi iure. Nobis, voluptates impedit!
                </p>
                <div class="galery">
                    <img src="/views/img/car.jpg" alt="">
                    <img src="/views/img/car.jpg" alt="">
                    <img src="/views/img/car.jpg" alt="">
                    <img src="/views/img/car.jpg" alt="">
                </div>
            </div>
            <div class="video">
                <img src="/views/img/video.jpg" alt="">
                <img src="/views/img/video.jpg" alt="">
            </div>
        </div>
        <div class="section progect">
            <div class="progect__left__content">
                <div class="img__progect">
                    <img src="/views/img/house.jpg" alt="">
                </div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus voluptatum laborum doloremque ratione. Consectetur hic, consequuntur veniam odit est temporibus tempora praesentium quae, ratione quo totam mollitia eos possimus expedita. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi officia omnis dolore corporis molestiae placeat recusandae numquam, itaque quos asperiores minima rem, autem ullam, quis fugiat mollitia quasi maiores ipsam!
                </p>
            </div>
            <div class="progect__right__content">
                <h2>Второй проект</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, fugiat, praesentium ipsam odio quo ut inventore ratione dolor eius officiis nihil optio debitis quae velit voluptatibus esse, in nemo necessitatibus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro quidem dolorum sit aperiam dolore expedita ab ea fugiat laudantium aut explicabo a deserunt, nesciunt ut animi iure. Nobis, voluptates impedit!
                </p>
                <div class="galery">
                    <img src="/views/img/house.jpg" alt="">
                    <img src="/views/img/house.jpg" alt="">
                    <img src="/views/img/house.jpg" alt="">
                    <img src="/views/img/house.jpg" alt="">
                </div>
            </div>
            <div class="video">
                <img src="/views/img/video.jpg" alt="">
                <img src="/views/img/video.jpg" alt="">
            </div>
        </div>
        <div class="section photoGalery">
            <img src="/views/img/house.jpg" alt="">
            <img src="/views/img/house.jpg" alt="">
            <img src="/views/img/house.jpg" alt="">
        </div>
        <div class="section video">
            <img src="/views/img/video.jpg" alt="">
            <img src="/views/img/video.jpg" alt="">
            <img src="/views/img/video.jpg" alt="">
            <img src="/views/img/video.jpg" alt="">
        </div>
    </div>
</main>

<footer class="footer">
    <div class="container">
        <div class="map"></div>
        <div class="contacts" id="contacts">
            <div class="address"></div>
            <div class="phone"></div>
        </div>
    </div>
</footer>

<div class="section modal__certificate none">
    <div class="modal__content__certificate">
        <img src="/views/img/page.jpg" alt="свидетельство">
        <input type="button" class="closeModalCertificate" value="X">
    </div>
</div>

<div class="modal" id="modal">
    <div class="modalForm">
        <header>
            <h2>Введите данные</h2>
        </header>
        <form name="logIn" action="#" method="post">
            <p><input type="email" name="email" placeholder="E-mail"></p>
            <p><input type="password" name="password"  placeholder="Пароль"></p>
            <p> <input type="submit" value="Войти"></p>
        </form>
        <span class="italic"></span>
        <footer class="footer">
            <a href="#" class="btn">Закрыть</a>
        </footer>
    </div>
</div>

<script><?php include_once ROOT . "/views/ViewMainPage/app/app.js"?></script>
<script><?php include_once ROOT . "/views/ViewMainPage/app/modal_certificate.js"?></script>
<script><?php include_once ROOT . "/views/ViewMainPage/app/modalApp.js"?></script>
</body>
</html>