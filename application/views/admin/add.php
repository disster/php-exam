<div class="container">
    <h1 class="title"><?php echo $title ?></h1>
    <h1 class="subtitle">Сессия № <?php echo $id+1 ?></h1>

    <form action="/admin/add" method="post" class="form">
<!--            <select name="type">-->
<!--                <option disabled>Выберите тип вопросы</option>-->
<!--                <option selected value="1">с открытым ответом (число)</option>-->
<!--                <option value="2">с открытым ответом (положительное число)</option>-->
<!--                <option value="3">С открытым ответом (строка)</option>-->
<!--                <option value="4">С открытым ответом (текст)</option>-->
<!--                <option value="5">С единственным выбором</option>-->
<!--                <option value="6">с множественным выбором</option>-->
<!--            </select>-->
            <div class="form__item">
                <label for="">Название сессии</label>
                <input type="text" name="name">
            </div>

        <div class="form__item">
            <button type="submit" class="button" name="submit">Создать</button>
        </div>
    </form>
</div>
