<?php 
include "path.php"; 
include SITE_ROOT . "/app/db/db.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])) {
    $posts = search($_POST['search-term'], 'posts', 'users');
}
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

      <div class="container">
      <div class="content row">
        <div class="main-content col-12">
          <h2>
            Результати пошуку
          </h2>
          <?php foreach ($posts as $post) : ?>
          <div class="post row">
            <div class="img col-12 col-md-4">
              <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" alt="" class="img-thumbnail">
            </div>
            <div class="post_text col-12 col-md-8">
              <h3>
                <a href="<?=BASE_URL . 'single.php?post=' . $post['id'];?>"><?=substr($post['title'], 0, 120) . '...' ?></a>
              </h3>
              <i class="far fa-user"> <?=$post['username'];?></i>
              <i class="far fa-calendar"> <?=$post['create_date'];?></i>
              <p class="preview-text">
              <?=substr($post['content'], 0, 150) . '...' ?>
              </p>
            </div>
            </div>
            <?php endforeach; ?>
          </div>
      </div>
    </div>

    <?php include("app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/297b82d5ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>