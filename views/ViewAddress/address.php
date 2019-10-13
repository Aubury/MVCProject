<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/css/style.css" ?></style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>SuperAdmin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img class="logo" src="/views/img/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="/show/superAdmin">Жалобы</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Users">Пользователи</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Budget">Финансы</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Videos">Видео</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Photos">Фото</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Projects">Проекты</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Admins">Управление администраторами</a>
              </li>
              <li class="nav-item active">
                  <a class="nav-link" href="/show/Address">Адрес и номер</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/show/Logs">Logs</a>
              </li>
          </ul>
            <button class="btn btn-success" id="exit">Выйти</button>
        </div>
      </nav>

      <div class="container-fluid">
          <div class="row justify-content-center topTxt">
              <div class="col-12 reports">
                  <span>Редактирование номеров телефона и геолокации</span>
              </div>
          </div>

          <div class="row">
            <div class="col-8 offset-2">
                <div class="card mb-3">
                    <div class="card-header"><h5>Адрес предприятия</h5></div>
                    <div class="card-body">
                        <form name="formAddress" action="#" method="POST">
                            <textarea name="address" rows="3" style="width: 62vw;"></textarea>
                            <div class="row">
                              <div class="col-4 offset-8"><button class="btn btn-block btn-success" type="submit">Добавить / Редактировать</button></div>
                            </div>
                        </form>
                        <span class="italic"></span>
                    </div>
                  </div>
            </div>
          </div>

          <div class="row">
              <div class="col-8 offset-2">
                  <div class="card mb-3">
                      <div class="card-header"><h5>Номера телефонов</h5></div>
                      <div class="card-body">
                          <form name="formTelephones" action="#" method="POST">
                              <textarea name="telephones" rows="3" style="width: 62vw;"></textarea>
                              <div class="row">
                                <div class="col-4 offset-8"><button class="btn btn-block btn-success" type="submit">Добавить / Редактировать</button></div>
                              </div>
                          </form>
                          <span class="italic"></span>
                      </div>
                    </div>
              </div>
            </div>

            <div class="row">
                <div class="col-8 offset-2">
                    <div class="card  mb-3">
                        <div class="card-header"><h5>Ссылка на гугл карты</h5></div>
                        <div class="card-body">
                            <form name="formLinkMap" action="#" method="POST">
                                <textarea name="link" rows="3" style="width: 62vw;"></textarea>
                                <div class="row">
                                  <div class="col-4 offset-8"><button class="btn btn-block btn-success" type="submit">Добавить / Редактировать</button></div>
                                </div>
                            </form>
                            <span class="italic"></span>
                        </div>
                      </div>
                </div>
              </div>
      </div>

<script><?php include_once ROOT . "/views/ViewSuperAdminPage/js/bootstrap.min.js"?></script>
<script><?php include_once ROOT . "/views/ViewAddress/js/scriptAddress.js"?></script>
<script><?php include_once ROOT . "/views/app/main.js"?></script>

</body>
</html>