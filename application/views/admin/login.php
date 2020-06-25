<div class="container">
    <h1 class="title"><?php echo $title ?></h1>
    <form action="/admin/login" method="post" class="form">
        <div class="form__item">
            <label for="">Логин:</label>
            <input type="text" name="login">
        </div>
        <div class="form__item">
            <label for="">Пароль:</label>
            <input type="password" name="password">
        </div>
        <div class="form__item">
            <button type="submit" class="button" name="submit">Войти</button>
        </div>
    </form>
</div>