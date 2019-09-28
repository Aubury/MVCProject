<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/fonts.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/style.css"?></style>
    <style><?php include_once ROOT . "/views/ViewMainPage/css/modal.css"?></style>
    <title>GIM</title>
</head>
<body>
    <header class="header">
        <button class="top topHide"><span>&lt;</span></button>
        <div class="container">
            <section class="left__header__content">
                <h2 class="none">h2</h2>
                <div class="logo">
                    <img src="/views/ViewMainPage/img/logo.png" alt="logo__company">
                </div>
                <div class="companySlogan">
                    <p>Главное</p>
                    <p>иметь</p>
                    <p>мечту</p>
                </div>
            </section>
            <section class="right__header__content">
                <h2 class="none">h2</h2>
                <div class="companySloganNone">
                    <p>Главное иметь мечту</p>
                </div>
                <div class="userRoom">
                    <a href="#modal"><button>Личный кабинет</button></a>
                </div>
                <nav class="nav">
                    <ul class="navigation">
                        <li class="countPeoples">Нас уже *****</li>
                        <li>О нас</li>
                        <li><a href="#progects">Наши проекты</a></li>
                        <li><a href="#contacts">Контакты</a></li>
                    </ul>
                </nav>
            </section>
        </div>
    </header>
    <main class="main">
        <div class="container">
            <section class="about__us">
                <h2 class="none">h2</h2>
                <div class="about__us__left__content">
                    <h2>О нас</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio! Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum voluptatum ipsum iusto odio magnam alias itaque aspernatur ut, impedit in numquam exercitationem sed quam, asperiores delectus adipisci mollitia ullam optio!
                    </p>
                </div>
                <div class="about__us__right__content">
                    <img src="/views/ViewMainPage/img/page.jpg" class="certificate" alt="certificate" title="свидетельство">
                    <img src="/views/ViewMainPage/img/dream.jpg" alt="">
                </div>
                <div class="video">
                    <img src="/views/ViewMainPage/img/video.jpg" alt="">
                    <img src="/views/ViewMainPage/img/video.jpg" alt="">
                </div>
            </section>
            <section class="progect">
                <h2 class="none">progects</h2>
                <div class="progect__left__content">
                    <div class="galery">
                        <img src="/views/ViewMainPage/img/car.jpg" alt="">
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
                        <img src="/views/ViewMainPage/img/car.jpg" alt="">
                        <img src="/views/ViewMainPage/img/car.jpg" alt="">
                        <img src="/views/ViewMainPage/img/car.jpg" alt="">
                        <img src="/views/ViewMainPage/img/car.jpg" alt="">
                    </div>
                </div>
                <div class="video">
                        <img src="/views/ViewMainPage/img/video.jpg" alt="">
                        <img src="/views/ViewMainPage/img/video.jpg" alt="">
                    </div>
            </section>
            <section class="progect">
                <h2 class="none">h2</h2>
                <div class="progect__left__content">
                    <div class="galery">
                        <img src="/views/ViewMainPage/img/house.jpg" alt="">
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
                        <img src="/views/ViewMainPage/img/house.jpg" alt="">
                        <img src="/views/ViewMainPage/img/house.jpg" alt="">
                        <img src="/views/ViewMainPage/img/house.jpg" alt="">
                        <img src="/views/ViewMainPage/img/house.jpg" alt="">
                    </div>
                </div>
                <div class="video">
                        <img src="/views/ViewMainPage/img/video.jpg" alt="">
                        <img src="/views/ViewMainPage/img/video.jpg" alt="">
                    </div>
            </section>
            <section class="photoGalery">
                <h2 class="none">h2</h2>
                <img src="/views/ViewMainPage/img/house.jpg" alt="">
                <img src="/views/ViewMainPage/img/house.jpg" alt="">
                <img src="/views/ViewMainPage/img/house.jpg" alt="">
            </section>
            <section class="video">
                <h2 class="none">h2</h2>
                <img src="/views/ViewMainPage/img/video.jpg" alt="">
                <img src="/views/ViewMainPage/img/video.jpg" alt="">
                <img src="/views/ViewMainPage/img/video.jpg" alt="">
                <img src="/views/ViewMainPage/img/video.jpg" alt="">
            </section>
        </div>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2645.1486209940017!2d35.0265741730128!3d48.4728628098349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe2fa0263091d%3A0xc38083f2d464521a!2z0L_RgNC-0YHQv9C10LrRgiDQlNC80LjRgtGA0LjRjyDQr9Cy0L7RgNC90LjRhtC60L7Qs9C-LCAxMDEsINCU0L3QuNC_0YDQviwg0JTQvdC10L_RgNC-0L_QtdGC0YDQvtCy0YHQutCw0Y8g0L7QsdC70LDRgdGC0YwsIDQ5MDAw!5e0!3m2!1sru!2sua!4v1553808840361!5m2!1sru!2sua" height="350" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="contacts" id="contacts">
                <div class="adress">
                    <p>г. Воронеж<p>
                    <p>ул. Лизюкова</p>
                </div>
                <div class="phone">
                    <p>+12345667789</p>
                    <p>+12345667789</p>
                    <p>+12345667789</p>
                    <p>+12345667789</p>
                </div>
            </div>
        </div>
    </footer>
   <section class="modal__certificate none">
        <h2 class="none">h2</h2>
        <div class="modal__content__certificate">
            <img src="/views/ViewMainPage/img/page.jpg" alt="свидетельство">
            <input type="button" class="closeModalCertificate" value="X">
        </div>
   </section>

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

    <script ><?php include_once ROOT . "/views/ViewMainPage/app/app.js"?></script>
    <script ><?php include_once ROOT . "/views/ViewMainPage/app/modal_certificate.js"?></script>
    <script ><?php include_once ROOT . "/views/ViewMainPage/app/modalApp.js"?></script>
</body>
</html>