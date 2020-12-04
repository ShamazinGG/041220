<div class="container">
    <p>
        <a class="btn btn-outline-success" href="/article/create">Добавить статью</a>
        <a class="btn btn-outline-danger" href="/">Выйти</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th>Тело</th>
            <th>Дата публикации</th>
            <th>Автор статьи</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($attributes as $attribute): ?>
            <tr>
                <td><?php echo $attribute['title'] ?></td>
                <td><?php echo $attribute['body'] ?></td>
                <td><?php echo $attribute['date'] ?></td>
                <td><?php echo $attribute['author'] ?></td>
                <td>

                    <a href="<?php echo $attribute['id']?>/view" class="btn btn-sm btn-outline-info">Показать</a>
                    <a href="<?php echo $attribute['id']?>/update" class="btn btn-sm btn-outline-secondary">Редактировать</a>
                    <a href="<?php echo $attribute['id']?>/delete" class="btn btn-sm btn-outline-danger">Удалить</a>

                    </form>
                </td>
            </tr>
        <?php endforeach;; ?>
        </tbody>
    </table>
</div>