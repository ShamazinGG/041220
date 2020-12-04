<div class="container">
    <p>
        <a class="btn btn-outline-success" href="/user/create">Добавить пользователя</a>
        <a class="btn btn-outline-danger" href="/">Выйти</a>
        <a href="../index.php"><img src="../img/123.png" alt="" class="img-thumbnail" align="right" width="100" height="56"></a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <th>Логин</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th>Дата рождения</th>
            <th>Email</th>
            <th>Адрес</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($attributes as $attribute): ?>
            <tr>
                <td><?php echo $attribute['login'] ?></td>
                <td><?php echo $attribute['username'] ?></td>
                <td><?php echo $attribute['surname'] ?></td>
                <td><?php echo $attribute['birthdate'] ?></td>
                <td><?php echo $attribute['email'] ?></td>
                <td><?php echo $attribute['address'] ?></td>
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



