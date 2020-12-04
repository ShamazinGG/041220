<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Информация о пользователе: <b><?php echo $attribute['login'] ?></b></h3>
        </div>
        <div class="card-body">
<!--            <a class="btn btn-secondary" href="update.php?id=--><?php //echo $attribute['id'] ?><!--">Редактировать</a>-->
<!--            <form method="post" action="delete.php" style="display: inline-block">-->
<!--                <input type="hidden" name="id" value="--><?php //echo $attribute['id'] ?><!--">-->
<!--                <button class="btn  btn-danger" value="Удалить"-->
<!--                        onclick="return confirm('Вы уверены, что хотите удалить пользователя?')">Удалить</button>-->

            </form>
        </div>
        <table class="table">
            <tbody>
            <tr>
                <th>Логин:</th>
                <td><?php echo $attribute['login'] ?></td>
            </tr>
            <tr>
                <th>Имя:</th>
                <td><?php echo $attribute['username'] ?></td>
            </tr>
            <tr>
                <th>Фамилия:</th>
                <td><?php echo $attribute['surname'] ?></td>
            </tr>
            <tr>
                <th>Дата рождения:</th>
                <td><?php echo $attribute['birthdate'] ?></td>
            </tr>
            <tr>
                <th>email:</th>
                <td><?php echo $attribute['email'] ?></td>
            </tr>
            <tr>
                <th>Адрес:</th>
                <td><input name="address" value="<?php echo $attribute ['address'] ?>" class="form-control"></td>
            </tr>


            </tbody>

        </table>

    </div>

</div>

