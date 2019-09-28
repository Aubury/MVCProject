<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css"?></style>
    <style><?php include_once  ROOT . "/views/ViewSuperAdminPage/css/style.css"?></style>
<!--    <style>--><?php //include_once ROOT . "/views/ViewSuperAdminPage/css/bootstrap.min.css"?><!--</style>-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SuperAdmin</title>
</head>
<body class="pad">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img class="logo" src="/views/ViewSuperAdminPage/img/logo.png" alt="logo"></a>
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
              <a class="nav-link" href="/show/Projects">Проекты</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/show/Admins">Управление администраторами</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/show/Address">Адрес и номер</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/views/ViewSuperAdminPage/pages/logs.html">Logs</a>
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
                    <form class="formAddPay" action="" method="POST">
                       <p><select name="projects" id="inputState" class="form-control"></p>
                            <option value="acc1">Проект 1</option>
                            <option value="acc2">Проект 2</option>
                            <option value="acc3">Проект 3</option>
                            <option value="acc4">Проект 4</option>
                        </select>
                       <p><input type="text" class="form-control" name="email" placeholder="Email плательщика"></p>
                       <p><input type="text" class="form-control" name="payment" placeholder="Сумма платежа"></p>
                       <p><input type="text" class="form-control" name="date" placeholder="Дата платежа"></p>
                        <div class="row">
                          <div class="col-12 col-xl-12"> <button class="btn btn-block btn-success" type="submit">Добавить</button></div>
                        </div>
        
                    </form>
                </div>
              </div>
        </div>

        <div class="col-8">
          <table class="tableFinances table table-hover">
              <thead>
                <tr>
                  <th scope="col">Дата</th>
                  <th scope="col">Счет</th>
                  <th scope="col">Сумма</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>22.22.22</td>
                  <td>1939</td>
                  <td>100000$</td>
                </tr>
                <tr>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
                
                
              </tbody>
            </table>
      </div>

    </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="/views/ViewSuperAdminPage/js/bootstrap.min.js"></script>
<script src="/views/ViewSuperAdminPage/js/search/finances.js"></script>
</body>
</html>