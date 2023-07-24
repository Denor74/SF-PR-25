<?php


require_once 'app/autorisation.php';

define('URL', 'http://localhost:8000'); // URL текущей страницы
define('UPLOAD_MAX_SIZE', 1000000); // 1mb
define('ALLOWED_TYPES', ['image/jpeg', 'image/png', 'image/gif']);
define('UPLOAD_DIR', 'uploads');
define('COMMENT_DIR', 'comments');


require_once 'app/file_load.php';

