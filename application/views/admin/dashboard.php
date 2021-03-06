<div class="container">
    <h1 class="title"><?php echo $title ?></h1>
    <?php if (empty($list)) : ?>
        <p>Список сессий пуст</p>
    <?php else : ?>
        <table class="accounts_table">
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Статус</th>
                <th>Ссылка</th>
                <th>Редактировать</th>
                <th>Закрыть сессию</th>
                <th>Удалить</th>
            </tr>
            <?php foreach ($list as $val) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($val['id'], ENT_QUOTES); ?></td>
                    <td>
                        <?php echo htmlspecialchars($val['name'], ENT_QUOTES); ?>
                    </td>
                    <td>

                        <?php if (htmlspecialchars($val['status'], ENT_QUOTES) == 0) {
                            echo "Закрыта";
                        } else echo "Открыта" ?>
                    </td>
                    <td>
                        <button class="button table_button edit_button copy"
                                value="<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/session/' . htmlspecialchars($val['token'], ENT_QUOTES); ?>">
                            Копировать ссылку
                        </button>
                    </td>
                    <td>
                        <a href="/admin/edit/<?php echo $val['id']; ?>"
                           class="">
                            <button class="button table_button edit_button">
                                Редактировать
                            </button>
                        </a>
                    </td>
                    <td>
                        <?php if($val['status'] == 0):?>
                        <a href="/admin/open/<?php echo $val['id']; ?>"
                           class="">
                            <button class="button table_button edit_button">
                                Открыть
                            </button>
                        </a>
                        <?php else:?>
                        <a href="/admin/close/<?php echo $val['id']; ?>"
                           class="">
                            <button class="button table_button edit_button">
                                Закрыть
                            </button>
                        </a>
                        <?php endif;?>
                    </td>
                    <td>
                        <a href="/admin/delete/<?php echo $val['id']; ?>"
                           class="">
                            <button class="button table_button delete_button">
                                Удалить
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="pagination">
            <?php echo $pagination; ?>
        </div>
    <?php endif; ?>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.copy').click(
            function () {
                let tmp = document.createElement('INPUT'),
                    focus = document.activeElement;
                tmp.value = $(this).val();
                document.body.appendChild(tmp);
                tmp.select();
                document.execCommand('copy');
                document.body.removeChild(tmp);
                alert('Ссылка скопирована в буфер обмена');
            }
        )
    });
</script>
