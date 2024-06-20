<?php include("path.php");
include "app/controllers/topics.php";
$post = selectForSingle('posts', 'users', $_GET['post']);

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

        </div>
        </div>
    </div>

      <div class="container">
      <div class="content row">
        <div class="main-content col-md-9 col-12">
          <h2>
            <?php echo $post['title']; ?>
          </h2>
          <div class="single-post row">
            <div class="img col-12">
              <img src="<?=BASE_URL . 'assets/images/posts/' . $post['img']?>" alt="" class="single-img-fluid">
            </div>
            <div class="info">
                <i class="far fa-user"> <?=$post['username'];?></i>
                <i class="far fa-calendar"> <?=$post['create_date'];?></i>
            </div>
            <div class="single-post_text col-12">
              <?=$post['content'];?>
            </div>
            </div>
          </div>

        <div class="sidebar col-md-3 col-12">
          <div class="section search">
            <h3>
              Пошук
            </h3>
            <form action="/" method="post">
              <input type="text" name="search-term" class="text-input" placeholder="Пошук...">
            </form>
          </div>

          <div class="section topics">
            <h3>
              Категорії
            </h3>
            <ul>
            <?php foreach ($topics as $key => $topic): ?>
              <li>
                <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?= $topic['name']; ?></a>
            </li>
              <?php endforeach; ?>
            </ul>
          </div>

        </div>
      </div>
    </div>

    <?php include("app/include/footer.php"); ?>

    <script src="https://kit.fontawesome.com/297b82d5ec.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>