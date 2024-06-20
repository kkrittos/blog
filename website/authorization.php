<?php include "path.php"; 
      include "app/controllers/users.php";
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
    <form class="row justify-content-center" method="post" action="authorization.php">
        <h2 class="col-12">
            Форма авторизації
        </h2>
        <div class="mb-3 col-12 col-md-4 err">
            <p>
              <?=$errMessage?>
            </p>
        </div>
        <div class="w-100"></div>  
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваша пошта</label>
            <input name="email" value="<?=$email?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введіть email">
          </div>
        <div class="w-100"></div>   
        <div class="form-group mb-3 col-12 col-md-4">
          <label for="exampleInputPassword1">Пароль</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль">
        </div>  
        <div class="w-100"></div>   
          <div class='form-group mb-3 col-12 col-md-4'>
        <button type="submit" name="button-log" class="btn btn-secondary">Увійти</button>
        <a href="registration.php">Зареєструватися</a>
    </div>
      </form>
    </div>


    <?php include("app/include/footer.php"); ?>