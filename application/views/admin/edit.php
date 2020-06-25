<div class="container">
    <h1 class="title"><?php echo $title ?></h1>
    <h2 class="subtitle">Сессия № <?php echo $data['id'] ?></h2>
    <h2 class="subtitle">Добавить вопрос</h2>
    <form action="/admin/edit/<?php echo $data['id'] ?>" method="post" class="form">
        <div class="form__item">
            <label for="">Тип вопроса</label>
            <select name="type">
                <option selected value="1">C открытым ответом (число)</option>
                <option value="2">C открытым ответом (положительное число)</option>
                <option value="3">С открытым ответом (строка)</option>
                <option value="4">С открытым ответом (текст)</option>
                <option value="5" disabled>С единственным выбором</option>
                <option value="6" disabled>С множественным выбором</option>
            </select>
        </div>
        <div class="form__item">
            <label for="">Текст вопроса</label>
            <input type="text" name="text">
        </div>
        <div class="form__item">
            <button type="submit" class="button" name="submit">Добавить</button>
        </div>
    </form>
</div>
