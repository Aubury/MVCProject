
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css";?></style>
    <style><?php include_once  ROOT . "/views/ViewSuperAdminPage/css/style.css";?></style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>SuperAdmin</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img class="logo" src="/views/ViewSuperAdminPage/img/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
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
               <span>Жалобы и предложения</span>
              </div>
         </div>
         <div class="row justify-content-around">
             <div class="col-3 ReportInfo">
              <div class="card border-info  mb-3">
                  <div class="card-header reports">
                      <h3>Жалобы</h3>
                  </div>
                      <div class="card-body">
                          <div>Новых: <span id="newComplaints"></span></div>
                          <div>Всего: <span id="allComplaints"></span></div>
                          <div>Отвеченных: <span id="answeredComplaints"></span></div>
                      </div>
                  </div>
                 <div class="card border-info  mb-3">
                     <div class="card-header reports">
                     <h3>Дoбавить ответ</h3>
                     </div>
                         <div class="card-body">
                             <form name="formAnswer" action="#" class="formAddUsers">
                                 <p><input type="text" class="form-control"  name="id" placeholder="№ Жалобы или предложения" required>
                                 <p><input type="text" class="form-control"  name="email" placeholder="email" required>
                                 <p><textarea class="form-control height" name="text" placeholder="Жалоба или предложения" required></textarea>
                                 <p class="col-12 col-xl-12"> <button class="btn btn-block btn-success" type="submit">Подать</button></p>
                             </form>
                             <span class="italic"></span>
                         </div>
                 </div>
              </div>
             <div class="col-8 tableReports">


<!--            <div class="card border-warning mb-3">-->
<!--                    <div class="card-header">-->
<!--                          <div class="row complaintInfo">-->
<!--                                <div class="col reporterName"></div>-->
<!--                                <div class="col reportNumber">№</div>-->
<!--                                <div class="col reportEmail"></div>-->
<!--                                <div class="col reportTimeData"></div>-->
<!--                          </div>-->
<!--                    </div>-->
<!--                <div class="card-body reportComplaints">-->
<!--                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, debitis! Labore praesentium adipisci ea maxime accusamus excepturi molestias inventore cum ullam, cumque necessitatibus, reiciendis, magni nihil! Fugit autem vero quod!-->
<!--                </div>-->
<!--                <div class="card-header">-->
<!--                    <div class="row answerInfo">-->
<!--                        <div class="col answName">Ответ на жалобу</div>-->
<!--                        <div class="col answNumber">№</div>-->
<!--                        <div class="col answEmail"></div>-->
<!--                        <div class="col answTimeDate"></div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="card-body reportAnswer">-->
<!--                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, debitis! Labore praesentium adipisci ea maxime accusamus excepturi molestias inventore cum ullam, cumque necessitatibus, reiciendis, magni nihil! Fugit autem vero quod!-->
<!--                </div>-->
<!--            </div>-->

            </div>
         </div>
      </div>

    <script><?php include_once ROOT ."/views/ViewSuperAdminPage/js/scriptAnswer.js"?></script>
    <script><?php include_once ROOT . "/views/ViewSuperAdminPage/js/backInfo.js"?></script>
</body>
</html>