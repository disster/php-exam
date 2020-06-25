<div class="container">
    <h1 class="title"><?php echo $title ?></h1>
    <h1 class="subtitle">Сессия № <?php echo $id+1 ?></h1>

    <form action="/admin/add" method="post" class="form">
            <div class="form__item">
                <label for="">Название сессии</label>
                <input type="text" name="name">
            </div>
        <div class="form__item">
            <button type="submit" class="button" name="submit">Создать</button>
        </div>
    </form>
</div>
