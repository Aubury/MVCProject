<?php
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style><?php include_once ROOT . "/views/css/reset.css";?></style>
    <style><?php include_once ROOT . "/views/css/style.css";?></style>
    <style><?php include_once ROOT . "/views/ViewPersonalPage/css/style.css"?></style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<script><?php include_once ROOT . "/views/ViewPersonalPage/js/scriptComplaints.js"?></script>
<script><?php include_once ROOT . "/views/app/main.js"?></script>

</body>
</html>
