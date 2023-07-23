<?php
$errors = [];
$messages = [];

// Если файл был отправлен
if (!empty($_FILES)) {

    // Проходим в цикле по файлам
    for ($i = 0; $i < count($_FILES['files']['name']); $i++) {

        $fileName = $_FILES['files']['name'][$i];

        // Проверяем размер
        if ($_FILES['files']['size'][$i] > UPLOAD_MAX_SIZE) {
            $errors[] = 'Недопостимый размер файла ' . $fileName;
            continue;
        }

        // Проверяем формат
        if (!in_array($_FILES['files']['type'][$i], ALLOWED_TYPES)) {
            $errors[] = 'Недопустимый формат файла ' . $fileName;
            continue;
        }

        $filePath = UPLOAD_DIR . '/' . basename($fileName);

        // Пытаемся загрузить файл
        if (!move_uploaded_file($_FILES['files']['tmp_name'][$i], $filePath)) {
            $errors[] = 'Ошибка загрузки файла ' . $fileName;
            continue;
        }
    }

    if (empty($errors)) {
        $messages[] = 'Файлы были загружены';
    }
}

// Если файл был удален
if (!empty($_POST['name'])) {

    $filePath = UPLOAD_DIR . '/' . $_POST['name'];
    $commentPath = COMMENT_DIR . '/' . $_POST['name'] . '.txt';

    // Удаляем изображение
    unlink($filePath);

    // Удаляем файл комментариев, если он существует
    if (file_exists($commentPath)) {
        unlink($commentPath);
    }

    $messages[] = 'Файл был удален';
}

// Получаем список файлов, исключаем системные
$files = scandir(UPLOAD_DIR);
$files = array_filter($files, function ($file) {
    return !in_array($file, ['.', '..', '.gitkeep']);
});
?>