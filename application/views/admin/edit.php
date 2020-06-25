<div class="container">
    <h1 class="title">
        <?php
        $_SESSION['sessionId'] = $data['id'];
        echo $title ?></h1>
    <h2 class="subtitle">Сессия № <?php echo $data['id'] ?></h2>
    <h2 class="subtitle">Вопросы</h2>
    <?php
    foreach ($data['questions'] as $val) : ?>
        <div class="question_info">
            <div class="question_info__title"><span
                        class="bold">Вопрос</span> №<?php echo htmlspecialchars($val['question_id'], ENT_QUOTES); ?>
            </div>
            <div class="question_info__title"><span
                        class="bold">Тип:</span> <?php
                if (htmlspecialchars($val['type'], ENT_QUOTES) == 1) {
                    echo 'C открытым ответом (число)';
                } elseif (htmlspecialchars($val['type'], ENT_QUOTES) == 2) {
                    echo 'C открытым ответом (положительное число)';
                } elseif (htmlspecialchars($val['type'], ENT_QUOTES) == 3) {
                    echo 'С открытым ответом (строка)';
                } elseif (htmlspecialchars($val['type'], ENT_QUOTES) == 4) {
                    echo 'С открытым ответом (текст)';
                } elseif (htmlspecialchars($val['type'], ENT_QUOTES) == 5) {
                    echo 'С единственным выбором';
                } elseif (htmlspecialchars($val['type'], ENT_QUOTES) == 6) {
                    echo 'С множественным выбором';
                } ?></div>
            <p>
                <span class="bold">Текст:</span>
                <?php echo htmlspecialchars($val['text'], ENT_QUOTES); ?>
            </p>
            <a href="/admin/remove/<?php echo htmlspecialchars($val['question_id'], ENT_QUOTES); ?>">
                <img src="/public/images/remove.png" class="delete_question">
            </a>
        </div>
    <?php endforeach; ?>
    <h2 class="subtitle" style="margin-top: 50px;">Добавить вопрос</h2>
    <form action="/admin/edit/<?php echo $data['id'] ?>" method="post" class="form" style="margin-bottom: 100px">
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
