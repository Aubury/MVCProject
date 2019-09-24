<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css";
        include_once  ROOT . "/views/ViewSuperAdminPage/css/style.css";
        include_once ROOT . "/views/ViewSuperAdminPage/css/bootstrap.min.css";
        include_once ROOT . "/views/ViewPersonalPage/css/style.css"?></style>
    <title>Document</title>
</head>
<body>
       <h1>Personal Page</h1>

       <div class="card border-info  mb-3">
           <div class="card-header reports">
               <h3>Дoбавить жалобу</h3>
           </div>
           <div class="card-body">
               <form name="formComplaints" action="#" class="formAddUsers" method="">
                   <p><input type="text" class="inpText form-control"  name="user" placeholder="Ваше ФИО" required>
                   <p><input type="email" class="inpText form-control"  name="email" placeholder="Email" required>
                   <p><textarea class="inpText form-control height" name="text" placeholder="Жалоба или предложения" required></textarea>
                   <p class="col-12 col-xl-12"> <button class="btn btn-block btn-success" type="submit">Подать</button></p>
               </form>
               <span class="italic"></span>
           </div>
       </div>
       <script src="/views/ViewPersonalPage/js/scriptComplaints.js"></script>
</body>
</html>
