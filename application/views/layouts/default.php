<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link href="/public/styles/main.css" rel="stylesheet">
    <script
            src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="/public/scripts/form.js"></script>

<body>
<header>
    <div class="container header__inner">
        <a href="/"><img src="https://via.placeholder.com/150x75.png" class="logo" alt=""></a>
        <ul class="nav">
            <?php if (isset($_SESSION['admin'])): ?>
                <li class="nav__item">
                    <a href="/admin/dashboard" class="link">В панель администратора</a>
                </li>
                <li class="nav__item">
                    <a href="/admin/add" class="link">Добавить опрос</a>
                </li>
                <li class="nav__item">
                    <a href="/admin/logout" class="link">Выход</a>
                </li>
            <?php else: ?>
                <li class="nav__item">
                    <a href="/admin/login" class="link">Вход</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</header>
<main>
    <?php echo $content; ?>
</main>
<footer>&copy; 2020, Толпаров Пётр</footer>
</body>
</html>