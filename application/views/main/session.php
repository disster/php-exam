<div class="container">
    <h1 class="title"><?php echo $data['name'] ?></h1>

    <form action="/admin/session/<?php echo $data['token'] ?>" method="post" class="form" style="width: 70%;margin-bottom: 100px;">
        <?php $counter = 1;
        foreach ($data['questions'] as $val) : ?>
            <div class="session_info">
                <div class="session_info__title"><span
                            class="bold">Вопрос</span> №<?php echo $counter; $counter++ ?>
                </div>
                <p><?php echo htmlspecialchars($val['text'], ENT_QUOTES); ?></p>
                <div class="form__item">
                    <label for="">Ваш ответ</label>
                    <input type="text" name="">
                </div>
            </div>
        <?php endforeach; ?>
        <div class="form__item">
            <button type="submit" class="button" name="submit">Сохранить</button>
        </div>
    </form>

</div>