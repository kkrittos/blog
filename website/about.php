<?php 
include "path.php"; 
include "app/controllers/topics.php";
$posts = selectAllFromPosts('posts', 'users');
?>

<!doctype html>
<html lang="uk">
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
    <div class="row">
      <main class="col-md-9 col-12 mt-4">
        <section>
            <h1>Про нас</h1>
            <p>Ласкаво просимо на сторінку про нас! Ми - команда професіоналів, які прагнуть надавати найкращі послуги для наших клієнтів.</p>
            <h2>Наша місія</h2>
            <p>Наша місія - допомагати клієнтам досягати їхніх цілей завдяки нашим високоякісним послугам та підтримці.</p>
            <h2>Наша команда</h2>
            <p>Ми складаємося з талановитих та досвідчених професіоналів у різних галузях. Ми працюємо разом, щоб забезпечити найкращий результат для наших клієнтів.</p>
            <img class="img-thumbnails mb-4" src="./assets/images/image-6.png" alt="">
        </section>
      </main>

      <aside class="sidebar col-md-3 col-12">
        <div class="section search mb-4">
          <h3>Пошук</h3>
          <form action="search.php" method="post">
            <input type="text" name="search-term" class="form-control" placeholder="Пошук...">
          </form>
        </div>

        <div class="section topics">
          <h3>Категорії</h3>
          <ul>
            <?php foreach ($topics as $key => $topic): ?>
            <li class="list-group-item">
              <a href="<?=BASE_URL . 'category.php?id=' . $topic['id']; ?>"><?= $topic['name']; ?></a>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </aside>
    </div>
  </div>

  <?php include("app/include/footer.php"); ?>

  <script src="https://kit.fontawesome.com/297b82d5ec.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>