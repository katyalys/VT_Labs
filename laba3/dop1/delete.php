<?php

$filename = isset($_POST['full_filename']) ? $_POST['full_filename'] : "";

if (file_exists($filename)){
    if (unlink($filename)) echo "Success!";  // удаляет имя файла
} else {
    exit("Неверный путь к файлу");
}