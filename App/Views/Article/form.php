<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>
            <?php if ($attribute['id']): ?>
            Обновить статью: <b><?php echo $attribute['title']?></b>
            <?php else: ?>
                Написать статью
            <?php endif ?>
            </h3>

        </div>
        <div class="card-body">

<form method="post" enctype="multipart/form-data" action="">
                <div class="form-group">
                    <label>Заголовок</label>
                    <input name="title" value="<?php echo $attribute['title'] ?>"
                           class="form-control <?php echo $errors['title'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['title'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Тело статьи</label>
                    <input name="body" value="<?php echo $attribute['body'] ?>"
                           class="form-control <?php echo $errors['body'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['body'] ?>
                    </div>
                </div>
                <div class="form-group">
                    <label>Дата</label>
                    <input name="date" value="<?php $today = date("d.m.y"); echo $today ?>"

                </div>
                <div class="form-group">
                    <label>Автор статьи</label>
                    <input name="author" value="<?php echo $attribute['author'] ?>"
                           class="form-control <?php echo $errors['author'] ? 'is-invalid' : '' ?>">
                    <div class="invalid-feedback">
                        <?php echo $errors['author'] ?>
                    </div>
                </div>


                <button class="btn btn-success">Сохранить</button>
        </div>
    </div>
</form>
    </form>
</div>