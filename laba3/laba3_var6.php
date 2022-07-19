<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang="ru">
    <title>Test</title>
</head>
<body>
<main>
    <form method="POST">
        <textarea name='way' placeholder="Way"></textarea><br>
        <input type="date" name='date1'><br>
        <input type="date" name='date2'><br>
        <input type="submit" name="enter" value="Найти"><br>
        <?php

        // кладем в переменные сообщения взятые из формы
        $way = $_POST['way'];
        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        $flag = false;     // проверка нашлись ли файлы
        $date_1 = strtotime($date1);	// получаем дату от
        $date_2 = strtotime($date2);		// преобразовываем время

        function recursive($dir) {
            static $deep = 1;
            global $date_1;
            global $date_2;
            global $flag;
            $dirr = opendir($dir);	//открываем директорию
            while (($file = readdir($dirr)) !== false){ // читаем ее пока не конец
                if ($file == '.' || $file == '..') {
                    continue;
                }
                else {
                    $date = filectime($dir.DIRECTORY_SEPARATOR.$file);	// получаем дату
                    if($date_1 <= $date && $date_2 >= $date) {   // если попали в промежуток - выводим
                        echo $deep.' '.$dir.DIRECTORY_SEPARATOR.$file.'<br>';
                        $flag = true;	// что-то нашли
                    }
                }
                if (is_dir($dir.DIRECTORY_SEPARATOR.$file)) { // если нашли папку - заходим в нее
                    $deep++;
                    recursive($dir.DIRECTORY_SEPARATOR.$file);
                    $deep--;  // возврат из папки
                }
            }
            closedir($dirr);
        }

        if(is_dir($way) && $date_2 > $date_1 && $date1 != '') {		// все корректно
            recursive($way);
        }
        else if(!is_dir($way) || $date_2 <= $date_1 || $date1 == '') {
            if(!is_dir($way)) {  // если неправльный путь
                echo 'Проверьте корректность указанного пути.<br>';
            }
            if($date_2 <= $date_1 || $date1 == '') {  // если неправильные даты
                echo 'Проверьте корректность указанных дат.';
            }
            $flag = true;
        }
        if(!$flag) {					// если ничего не найдено
            echo 'Ничего не найдено!';
        }
        ?>
    </form>
</main>
</body>
</html>