<?php 
include("path.php");
include("app/controllers/users.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ТДВ "ОДЕБП"</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>
  <body>
    
  <?php include("app/include/header.php"); ?>

    <div class="container reg-form">
    <form class="row justify-content-center" method="post" action="registration.php">
        <h2>
            Форма реєстрації
        </h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p>
              <?=$errMessage?>
            </p>
        </div>
        <div class="w-100"></div>  
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш логін</label>
            <input name="login" value="<?=$login?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Введіть ваш логін">
          </div>
        <div class="w-100"></div>          
        <div class="form-group mb-3 col-12 col-md-4">
          <label for="exampleInputEmail1">Email</label>
          <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть email">
          <small id="emailHelp" class="form-text text-muted">Ми ніколи нікому не передамо вашу електронну адресу.</small>
        </div>
        <div class="w-100"></div>   
        <div class="form-group mb-3 col-12 col-md-4">
          <label for="exampleInputPassword1">Пароль</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
        </div>
        <div class="w-100"></div>   
        <div class="form-group mb-3 col-12 col-md-4">
            <label for="exampleInputPassword2">Підтвердіть пароль</label>
            <input name="confPassword" type="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль">
          </div>
          <div class="w-100"></div>   
          <div class='form-group mb-3 col-12 col-md-4'>
        <button type="submit" name="button-reg" class="btn btn-secondary">Зареєструватися</button>
        <a href="authorization.php">Увійти</a>
    </div>
      </form>
    </div>


    <?php include("app/include/footer.php"); ?>