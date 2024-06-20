<!-- <?php session_start(); ?> -->
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
                    <?php if (isset($_SESSION['login'])): ?>
                        <li>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL . "logout.php"; ?>">Вийти</a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo BASE_URL . "login.php"; ?>">Увійти</a>
                        </li>
                        <li>
                            <a href="<?php echo BASE_URL . "register.php"; ?>">Зареєструватися</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
</header>