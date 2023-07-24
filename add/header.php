<header class="bg-dark bg-gradient text-light">
    <h2 class="h2-nav">Модуль 25 Галерея изображений (HW-04)</h2>
    <nav class="nav">
        <!--<a href="/">Главная</a>-->
        <!--<a href="Sl">Зарегистрироваться</a>-->
        <?php if (empty($_SESSION['auth'])): ?> <div class="form">

            <form method="POST" class="form-inline">
            <div class="form-group mb-2"><input name="login" type="text" placeholder='Login' required></div>
            <div class="form-group mx-sm-3 mb-2"><input name="password" type="password" placeholder='password' required></div>
                <input name="submit"  class="btn btn-primary mb-2" type="submit" value="Войти">
            </form>
            <?php else: ?>
	<div>Здравствуйте: <?php echo  $_SESSION['auth'] ?></div>
<?php endif; ?>
        </div>
    </nav>



</header>