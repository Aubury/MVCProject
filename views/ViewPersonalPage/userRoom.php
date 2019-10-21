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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>userRoom</title>
</head>
<body>
<header class="hederContainer">
    <div class="userHeader">
        <div class="headerItem">
            <img src="/views/img/logo.png" alt="logo__company">
        </div>
        <div class="headerItem slogan">
            <p>Главное</p>
            <p>иметь</p>
            <p>мечту</p>
        </div>
        <div class="headerItem">
            <p>Общая сумма: <span class="italic" id="trm"></span></p>
        </div>
        <div class="headerItem">
            <button class="btn btn-success" id="exit">Выйти</button>
        </div>
</header>
    <main class="main">
        <div class="_container">
            <div class="input-group mb-3">
                <select class="custom-select" id="inputGroupSelect02">
                    <option selected>Choose...</option>
                </select>
                <div class="input-group-append">
                    <label class="input-group-text" for="inputGroupSelect02" id="option">Options</label>
                </div>
            </div>
            <div class="left__main__content">
                <div class="list__projects">
                </div>
                <div class="complaints__offers">

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
            <div class="right__main__content">
<!--                <div class="aboutUs list">-->
<!--                    <div class="card-header row justify-content-around">-->
<!--                        <div class="p-2 flex-grow-1"> <h2>О нас</h2></div>-->
<!--                    </div>-->
<!--                    <div class="container p-2">-->
<!--                        <div class="heightMainCsrd">-->
<!--                            <p class="center">Здесь должен быть текст </p>-->
<!--                            <p class="center">О НАС</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="cardFooter"></div>-->
<!--                </div>-->
            </div>

            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="_container">
            <div class="map"></div>
            <div class="contacts row justify-content-around">
                <div class="address p-2 flex-grow-1"></div>
                <div class="phone p-2 flex-grow-1"></div>
            </div>
        </div>
    </footer>
<!--    <script src="/views/ViewPersonalPage/js/app.js"></script>-->
<!--    <script src="/views/ViewPersonalPage/js/show_progect.js"></script>-->
    <script src="/views/ViewPersonalPage/js/scriptComplaints.js"></script>
    <script><?php include_once ROOT . "/views/app/main.js"?></script>
    <script src="/views/ViewPersonalPage/js/infoProject.js"></script>


</body>
</html>