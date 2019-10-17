<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/css/style.css" ?></style>
    <style><?php include_once ROOT . "/views/css/fonts.css"?></style>
    <style><?php include_once ROOT . "/views/ViewPersonalPage/css/style_userRoom.css" ?></style>
<!--    <link rel="stylesheet" href="/views/ViewPersonalPage/css/import.css">-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>userRoom</title>
</head>
<body>
    <header class="userHeader">
        <div class="headerItem">
            <img src="/views/img/logo.png" alt="logo__company">
        </div>
        <div class="headerItem slogan">
            <p>Главное</p>
            <p>иметь</p>
            <p>мечту</p>
        </div>
        <div class="headerItem"></div>
        <div class="headerItem">
            <button class="btn btn-success" id="exit">Выйти</button>
        </div>

<!---->
<!--        <div class="_container">-->
<!--            <div class="left__header__content">-->
<!--                <div class="logo">-->
<!--                    <img src="/views/img/logo.png" alt="logo__company">-->
<!--                </div>-->
<!--                <div class="companySlogan">-->
<!--                    <p>Главное</p>-->
<!--                    <p>иметь</p>-->
<!--                    <p>мечту</p>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="right__header__content">-->
<!--                <div class="companySloganNone">-->
<!--                    <p>Главное иметь мечту</p>-->
<!--                </div>-->
<!--                <div class="userRoom">-->
<!--                    <button class="btn btn-success" id="exit">Выйти</button>-->
<!--                </div>-->
<!--                <nav class="nav">-->
<!--                    <ul class="navigation">-->
<!--                        <li class="countPeoples">Нас уже *****</li>-->
<!--                        <li>О нас</li>-->
<!--                        <li>Наши проекты</li>-->
<!--                        <li>Контакты</li>-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div>-->
<!--        </div>-->

    </header>
    <main class="main">
        <div class="_container">
            <div class="left__main__content">
                <div class="list__projects">
                    <p class="tab active" data-for="aboutUs">О нас</p>
<!--                    <p class="tab" data-for="project__1">Проект 1</p>-->
<!--                    <p class="tab" data-for="project__2">Проект 2</p>-->
<!--                    <p class="tab" data-for="project__3">Проект 3</p>-->
<!--                    <p class="tab" data-for="project__4">Проект 4</p>-->
                </div>
                <div class="p-2">
                    <div class="card">
                        <div class="card-header">
                            <h3>Дoбавить жалобу</h3>
                        </div>
                        <div class="card-body">
                            <form name="formComplaints" action="#" class="formAddUsers" method="post">
                                <p><textarea class="form-control height" name="text" placeholder="Жалоба или предложения"></textarea></p>
                                <p class="col-12 col-xl-12"> <button class="btn btn-block btn-success" type="submit">Подать</button></p>
                            </form>
                            <span class="italic"></span>
                        </div>
                    </div>
                </div>


            </div>
            <div class="right__main__content">
                <div class="aboutUs">
                </div>
<!--                <div class="project__1 none list">-->
<!--                    <h2>Первый проект</h2>-->
<!--                    <div class="logo_pay">-->
<!--                        <figure class="logo">-->
<!--                            <img src="/views/img/car.jpg" alt="car">-->
<!--                            <figcaption class="none">Логотип проекта</figcaption>-->
<!--                        </figure>-->
<!--                        <aside class="pay">-->
<!--                            <p>Бюджет проекта $$$</p>-->
<!--                            <p>Мой вклад $$$</p>-->
<!--                        </aside>-->
<!--                    </div>-->
<!--                    <article class="article">-->
<!--                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique quo molestias impedit culpa aspernatur voluptate eum iste corrupti nam! Tempora fuga reprehenderit officia reiciendis voluptas ullam! Vitae autem tenetur facere! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat placeat natus, exercitationem error perferendis unde blanditiis laboriosam amet dicta possimus ipsa eos laudantium? Perspiciatis repudiandae hic natus. Quaerat, animi beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis rerum quas ipsum ducimus corporis aliquam, nobis, reiciendis totam atque voluptas dolorem architecto sed veniam voluptatum sequi dicta neque necessitatibus minima. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid sequi, magnam soluta aperiam et fugit! Culpa quia error quas consectetur, numquam, fugiat sunt, dolore earum provident ducimus minus autem ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae labore impedit eaque nostrum optio itaque esse autem aliquid. Aspernatur, officiis. Amet possimus, eos voluptatum ullam sit delectus blanditiis eum neque.-->
<!--                    </article>-->
<!--                    <div class="pay_score">-->
<!--                        <aside>-->
<!--                            <p>Номера счетов</p>-->
<!--                            <p>**************</p>-->
<!--                            <p>***************</p>-->
<!--                        </aside>-->
<!--                        <article>-->
<!--                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis ipsa voluptates sit saepe molestiae minus, atque harum voluptatum iusto. Tempore sapiente similique aspernatur quos non adipisci aperiam ipsum beatae. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est ab magnam culpa architecto molestias sint fugit rerum sunt, quo maiores voluptatem a aliquid repellat, nisi, quibusdam esse distinctio! Officiis, corporis.-->
<!--                        </article>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="project__2 none list">-->
<!--                    <h2>Второй проект</h2>-->
<!--                    <div class="logo_pay">-->
<!--                        <figure class="logo">-->
<!--                            <img src="/views/img/house.jpg" alt="car">-->
<!--                            <figcaption class="none">Логотип проекта</figcaption>-->
<!--                        </figure>-->
<!--                        <aside class="pay">-->
<!--                            <p>Бюджет проекта $$$</p>-->
<!--                            <p>Мой вклад $$$</p>-->
<!--                        </aside>-->
<!--                    </div>-->
<!--                    <article class="article">-->
<!--                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique quo molestias impedit culpa aspernatur voluptate eum iste corrupti nam! Tempora fuga reprehenderit officia reiciendis voluptas ullam! Vitae autem tenetur facere! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat placeat natus, exercitationem error perferendis unde blanditiis laboriosam amet dicta possimus ipsa eos laudantium? Perspiciatis repudiandae hic natus. Quaerat, animi beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis rerum quas ipsum ducimus corporis aliquam, nobis, reiciendis totam atque voluptas dolorem architecto sed veniam voluptatum sequi dicta neque necessitatibus minima. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid sequi, magnam soluta aperiam et fugit! Culpa quia error quas consectetur, numquam, fugiat sunt, dolore earum provident ducimus minus autem ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae labore impedit eaque nostrum optio itaque esse autem aliquid. Aspernatur, officiis. Amet possimus, eos voluptatum ullam sit delectus blanditiis eum neque.-->
<!--                    </article>-->
<!--                    <div class="pay_score">-->
<!--                        <aside>-->
<!--                            <p>Номера счетов</p>-->
<!--                            <p>**************</p>-->
<!--                            <p>***************</p>-->
<!--                        </aside>-->
<!--                        <article>-->
<!--                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis ipsa voluptates sit saepe molestiae minus, atque harum voluptatum iusto. Tempore sapiente similique aspernatur quos non adipisci aperiam ipsum beatae. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est ab magnam culpa architecto molestias sint fugit rerum sunt, quo maiores voluptatem a aliquid repellat, nisi, quibusdam esse distinctio! Officiis, corporis.-->
<!--                        </article>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="project__3 none list">-->
<!--                    <h2>Третий проект</h2>-->
<!--                    <div class="logo_pay">-->
<!--                        <figure class="logo">-->
<!--                            <img src="/views/img/dream.jpg" alt="car">-->
<!--                            <figcaption class="none">Логотип проекта</figcaption>-->
<!--                        </figure>-->
<!--                        <aside class="pay">-->
<!--                            <p>Бюджет проекта $$$</p>-->
<!--                            <p>Мой вклад $$$</p>-->
<!--                        </aside>-->
<!--                    </div>-->
<!--                    <article class="article">-->
<!--                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique quo molestias impedit culpa aspernatur voluptate eum iste corrupti nam! Tempora fuga reprehenderit officia reiciendis voluptas ullam! Vitae autem tenetur facere! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat placeat natus, exercitationem error perferendis unde blanditiis laboriosam amet dicta possimus ipsa eos laudantium? Perspiciatis repudiandae hic natus. Quaerat, animi beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis rerum quas ipsum ducimus corporis aliquam, nobis, reiciendis totam atque voluptas dolorem architecto sed veniam voluptatum sequi dicta neque necessitatibus minima. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid sequi, magnam soluta aperiam et fugit! Culpa quia error quas consectetur, numquam, fugiat sunt, dolore earum provident ducimus minus autem ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae labore impedit eaque nostrum optio itaque esse autem aliquid. Aspernatur, officiis. Amet possimus, eos voluptatum ullam sit delectus blanditiis eum neque.-->
<!--                    </article>-->
<!--                    <div class="pay_score">-->
<!--                        <aside>-->
<!--                            <p>Номера счетов</p>-->
<!--                            <p>**************</p>-->
<!--                            <p>***************</p>-->
<!--                        </aside>-->
<!--                        <article>-->
<!--                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis ipsa voluptates sit saepe molestiae minus, atque harum voluptatum iusto. Tempore sapiente similique aspernatur quos non adipisci aperiam ipsum beatae. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est ab magnam culpa architecto molestias sint fugit rerum sunt, quo maiores voluptatem a aliquid repellat, nisi, quibusdam esse distinctio! Officiis, corporis.-->
<!--                        </article>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="project__4 none list">-->
<!--                    <h2>Четвертый проект</h2>-->
<!--                    <div class="logo_pay">-->
<!--                        <figure class="logo">-->
<!--                            <img src="/views/img/dream.jpg" alt="car">-->
<!--                            <figcaption class="none">Логотип проекта</figcaption>-->
<!--                        </figure>-->
<!--                        <aside class="pay">-->
<!--                            <p>Бюджет проекта $$$</p>-->
<!--                            <p>Мой вклад $$$</p>-->
<!--                        </aside>-->
<!--                    </div>-->
<!--                    <article class="article">-->
<!--                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique quo molestias impedit culpa aspernatur voluptate eum iste corrupti nam! Tempora fuga reprehenderit officia reiciendis voluptas ullam! Vitae autem tenetur facere! Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat placeat natus, exercitationem error perferendis unde blanditiis laboriosam amet dicta possimus ipsa eos laudantium? Perspiciatis repudiandae hic natus. Quaerat, animi beatae. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis rerum quas ipsum ducimus corporis aliquam, nobis, reiciendis totam atque voluptas dolorem architecto sed veniam voluptatum sequi dicta neque necessitatibus minima. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquid sequi, magnam soluta aperiam et fugit! Culpa quia error quas consectetur, numquam, fugiat sunt, dolore earum provident ducimus minus autem ut. Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae labore impedit eaque nostrum optio itaque esse autem aliquid. Aspernatur, officiis. Amet possimus, eos voluptatum ullam sit delectus blanditiis eum neque.-->
<!--                    </article>-->
<!--                    <div class="pay_score">-->
<!--                        <aside>-->
<!--                            <p>Номера счетов</p>-->
<!--                            <p>**************</p>-->
<!--                            <p>***************</p>-->
<!--                        </aside>-->
<!--                        <article>-->
<!--                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique debitis ipsa voluptates sit saepe molestiae minus, atque harum voluptatum iusto. Tempore sapiente similique aspernatur quos non adipisci aperiam ipsum beatae. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est ab magnam culpa architecto molestias sint fugit rerum sunt, quo maiores voluptatem a aliquid repellat, nisi, quibusdam esse distinctio! Officiis, corporis.-->
<!--                        </article>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="_container">
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
<!--    <script src="/views/ViewPersonalPage/js/app.js"></script>-->
    <script src="/views/ViewPersonalPage/js/show_progect.js"></script>
    <script src="/views/ViewPersonalPage/js/scriptComplaints.js"></script>
    <script><?php include_once ROOT . "/views/app/main.js"?></script>
    <script src="/views/ViewPersonalPage/js/infoProject.js"></script>


</body>
</html>