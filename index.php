<?php
require 'config.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <title>Галерея изображений | Список файлов</title>
</head>

<body>
    <?php require_once 'add/header.php'; ?>
    <main>
        <div class="container pt-4">
            <h1 class="mb-4"><a href="<?php echo URL; ?>">Галерея изображений</a></h1>

            <!-- Вывод сообщений об успехе/ошибке -->
            <?php foreach ($errors as $error) : ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endforeach; ?>

            <?php foreach ($messages as $message) : ?>
                <div class="alert alert-success"><?php echo $message; ?></div>
            <?php endforeach; ?>

            <h2>Список файлов</h2>

            <!-- Вывод изображений -->
            <div class="mb-4">
                <?php if (!empty($files)) : ?>
                    <div class="row">
                        <?php foreach ($files as $file) : ?>

                            <div class="col-12 col-sm-3 mb-4">
                                <form method="post">
                                    <input type="hidden" name="name" value="<?php echo $file; ?>">
                                    <button type="submit" class="close" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </form>
                                <a href="<?php echo URL . '/file.php?name=' . $file; ?>" title="Просмотр полного изображения">
                                    <img src="<?php echo URL . '/' . UPLOAD_DIR . '/' . $file ?>" class="img-thumbnail" alt="<?php echo $file; ?>">
                                </a>
                            </div>

                        <?php endforeach; ?>
                    </div><!-- /.row -->
                <?php else : ?>
                    <div class="alert alert-secondary">Нет загруженных изображений</div>
                <?php endif; ?>
            </div>


            <!-- Форма загрузки файлов -->
            <form method="post" enctype="multipart/form-data">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файлы</label>
                    <small class="form-text text-muted">
                        Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.
                        Допустимые форматы: <?php echo implode(', ', ALLOWED_TYPES) ?>.
                    </small>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">Загрузить</button>
            </form>
        </div><!-- /.container -->
    </main>
    <?php include 'add/footer.phtml'; ?>
</body>

</html>