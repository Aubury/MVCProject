<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once ROOT . "/views/css/style.css" ?></style>
    <style><?php include_once ROOT . "/views/css/fonts.css"?></style>
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
            <li class="nav-item active">
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
            <li class="nav-item">
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
          <h2>Участники</h2>
         </div>
  </div>
  <div class="row justify-content-end offset-lg-4 p-2">
      <button type="button" class="btn btn-info print">Печать</button>
      <input class="col-md-3 form-control mr-sm-3" type="search" id="searchUsers" placeholder="Поиск по таблице" aria-label="Search" onkeyup="tableSearch()">
  </div>
  <div class="row justify-content-around">
    <div class="col-3 ReportInfo">
        <div class="card border-info  mb-3">
            <div class="card-header"><h4>Добавление участника к проекту</h4></div>
            <div class="card-body">
                <form name="formAddToProject" action="#" method="post">
                    <p><select name="project_name" id="inputState" class="form-control">
                            <option>Выберите проект</option>
                        </select></p>
                    <p><input type="email" class="form-control" name="email" placeholder="Email"></p>
                    <p class="posRel"><input type="text" class="form-control" name="share_investment"  placeholder="Сумма инвестиции">
                        <span class="title none">Вводите сумму без пробелов</span></p>
                    <p class="col-12 col-xl-12"><input class="btn btn-block btn-success" type="submit" value="Добавить"></p>
                </form>
                <span class="talic"></span>
            </div>
        </div>
        <div class="card border-info  mb-3">
            <div class="card-header"><h4>Добавление или редактировать участника</h4></div>
            <div class="card-body">
                <form name="formUsers" action="#" method="get">
                    <p><input type="text" class="inpText form-control"  name="name" placeholder="Имя">
                        <span class="span italic"></span></p>
                    <p><input type="text" class="inpText form-control"  name="patronymic" placeholder="Отчество">
                        <span class="italic"></span></p>
                    <p><input type="text"  class="inpText form-control" name="surname" placeholder="Фамилия">
                        <span class="italic"></span></p>
                    <p><input type="email" class="inpText form-control" name="email" placeholder="Email">
                        <span class="italic"></span></p>
                    <p><input type="text" class="inpText form-control" name="address"  placeholder="Адрес">
                        <span class="italic"></span></p>
                    <p><input type="tel" class="inpText form-control" name="telephon" id="phone"  placeholder="+7 (123) 456-78-90"
                              minlength="12" maxlength="18">
                        <span class="italic"></span></p>
                    <p><input type="text" class="inpText form-control" name="tax_code"  placeholder="ИНН">
                        <span class="italic"></span></p>
                     <p class="col-12 col-xl-12"><input class="btn btn-block btn-success" type="submit" value="Добавить / Редактировать"></p>
                </form>
                <span class="talic"></span>
            </div>
          </div>

    </div>
    <div class="col-9 tableUsers">
        <table class="table table-hover" id="tableUsers"></table>

    </div>
  </div>
</div>
<script><?php include_once ROOT . "/views/ViewUsersPage/js/searchUsers.js"?></script>
<script><?php include_once ROOT . "/views/ViewUsersPage/js/scriptUsers.js"?></script>
<script><?php include_once ROOT . "/views/app/main.js"?></script>

</body>
</html>