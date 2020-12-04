<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Информация о статье: <b><?php echo $attribute['title'] ?></b></h3>
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
                <th>Название статьи:</th>
                <td><?php echo $attribute['title'] ?></td>
            </tr>
            <tr>
                <th>Тело статьи:</th>
                <td><?php echo $attribute['body'] ?></td>
            </tr>
            <tr>
                <th>Дата:</th>
                <td><?php echo $attribute['date'] ?></td>
            </tr>
            <tr>
                <th>Автор статьи:</th>
                <td><?php echo $attribute['author'] ?></td>
            </tr>


            </tbody>

        </table>

    </div>

</div>
