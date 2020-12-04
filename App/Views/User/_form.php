<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
            <?php if ($attribute['id']): ?>
            Обновить пользователя: <b><?php echo $attribute['login']?></b>
            <?php else: ?>
                Создать нового пользователя

            <?php endif ?>
            </h3>

        </div>
        <div class="card-body">

<form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Логин</label>
                    <input name="login" value="<?php echo $attribute['login'] ?>"
                           class="form-control <?php echo $errors['login'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['login'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Имя</label>
                    <input name="username" value="<?php echo $attribute['username'] ?>"
                           class="form-control <?php echo $errors['username'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['username'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Фамилия</label>
                    <input name="surname" value="<?php echo $attribute['surname'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Дата рождения</label>
                    <input name="birthdate" value="<?php echo $attribute['birthdate'] ?>"
                           class="form-control <?php echo $errors['birthdate'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['birthdate'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" value="<?php echo $attribute['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Адрес</label>
                    <input name="address" value="<?php echo $attribute['address'] ?>" class="form-control">
                </div>

                <button class="btn btn-success">Сохранить</button>
        </div>
    </div>
</form>
    </form>
</div>
