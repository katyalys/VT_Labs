<!DOCTYPE html>
<head>
    <meta charset="UTF-8" lang="ru">
    <title>Test</title>
</head>
<body>
<main>
    <form method="POST">
        <input type="text" name="str"><br>
        <input type="submit"><br>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $str = $_POST['str'];

            $patt = [
                '~^[A-Z][A-Za-z]+[a-z]*|^[A-Z]*~u',  //+-1
                '~\d{3,}~',
                '~\s+[A-Z][A-Za-z]+[a-z]*|\s+[A-Z]+[a-z]*~u'
            ];
            $repl = [
                '<span style="text-decoration:underline;">$0</span>',
                '<span style="color:lime;">$0</span>',
                '<span style="color:red;">$0</span>'
            ];

            $str = preg_replace($patt, $repl, $str); // поиск и замена по регулярному выражению
        } else {
            $str = '';
        }
        echo $str;
        ?>
    </form>
</main>
</body>
</html>