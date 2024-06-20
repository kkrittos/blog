<header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>
                        <a href="<?php echo BASE_URL ?>">ТДВ "ОДЕБП"</a>
                    </h1>
                </div>
                <nav class="col-8">
                    <ul>
                        <li><a href="<?php echo BASE_URL ?>">Головна</a></li>
                        <li><a href="about.php">Про нас</a></li>
                        <li>
                            <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                <?php if ($_SESSION['admin']): ?>
                                <li><a href="/website/admin/posts/index.php">Адмін-панель</a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Вийти</a></li>
                            </ul>
                            <?php else: ?>
                            <a href="<?php echo BASE_URL . "authorization.php"; ?>">
                                <i class="fa fa-user"></i>
                                Увійти
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . "registration.php"; ?>">Реєстрація</a></li>
                            </ul>
                            <? endif; ?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>