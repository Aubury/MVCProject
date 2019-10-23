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
<body class="pad">
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
            <li class="nav-item active">
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
          <button class="btn btn-success">Выйти</button>
        </div>
      </nav>

<div class="container-fluid">
    <div class="row justify-content-center topTxt">
        <div class="col-12 reports">
            <span>Управление финансами</span>
           </div>
      </div> 
    <div class="row">
          <div class="col-4 col-lg-2 offset-lg-10">
                <input onkeyup="tableSearch()" id="searchFinances" class="form-control mr-sm-3" type="search" placeholder="Поиск по таблице" aria-label="Search">
          </div>
    </div> 
    <div class="row justify-content-around">
        <div class="col-3 ReportInfo">
            <div class="card border-info  mb-3">
                <div class="card-header reports"><h3>Создание платежа</h3></div>
                <div class="card-body formAddUsers">
                    <form name="formAddPay" action="" method="POST">
                       <p><select name="project_name" id="inputState" class="form-control"></p>
                            <option>Выберите проект</option>
                        </select>
                       <p><input type="text" class="form-control" name="email_user" placeholder="Email плательщика"></p>
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
                       <p class="posRel"><input type="text" class="form-control" name="amount" placeholder="Сумма платежа">
                                 <span class="title none">Вводите сумму без пробелов</span></p>
                       <p class="posRel"><input type="text" class="form-control" name="timeDate" placeholder="Дата платежа( гггг-мм-дд )">
                           <span class="title none">Вводить дату через тире и в формате <br /> гггг-мм-дд</span></p>
                       <p class="col-12 col-xl-12"><button class="btn btn-block btn-success" type="submit">Добавить</button></p>
<<<<<<< HEAD
=======
                       <p><input type="text" class="form-control" name="amount" placeholder="Сумма платежа"></p>
                       <p><input type="text" class="form-control" name="timeDate" placeholder="Дата платежа( гггг-мм-дд )"></p>
                        <div class="row">
                          <div class="col-12 col-xl-12"> <button class="btn btn-block btn-success" type="submit">Добавить</button></div>
                        </div>
>>>>>>> parent of e316925... Merge branch 'master' into Dacemmi2mmi2_mainPage
=======
>>>>>>> parent of 1f249eb... Merge pull request #2 from Aubury/Dacemmi2mmi2_mainPage
                    </form>
                    <span class="italic"></span>
                </div>
            </div>
        </div>
        <div class="col-9">
          <table class="tableFinances table table-hover"></table>
        </div>
    </div>
</div>

<script><?php include_once ROOT . "/views/ViewSuperAdminPage/js/search/finances.js"?></script>
<script><?php include_once ROOT . "/views/ViewBudgetPage/js/scriptFinances.js"?></Script>
<script><?php include_once ROOT . "/views/app/main.js"?></script>
</body>
</html>