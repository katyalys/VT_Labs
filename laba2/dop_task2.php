<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <p>Enter string: <input type="text" name="name"/></p>
    <input type="submit" value="Enter">
</form>

<?php

    // initialization
    $array = htmlspecialchars($_POST['name']);
    $array_words = explode(" ", $array);
    $color = "blue";

    // number of letters 'o' and 'O' in the string
    $count = 0;
        for ($k = 0; $k < mb_strlen($array); $k++){
            if ($array[$k] == 'o' || $array[$k] == 'O'){
                $count++;
            }
        }
    echo $count, PHP_EOL;


    for ($i = 0; $i < count($array_words); $i++) {

        // turn into upper case letters of third words
        if (($i + 1) % 3 == 0) {
            $array_words[$i] = mb_strtoupper($array_words[$i]);
        }

        // change color of third letters
        $word = $array_words[$i];
        for ($j = 0; $j < mb_strlen($word); $j++){
              if (($j + 1) % 3 == 0){
                  echo  "<span style='color:rebeccapurple'>$word[$j]</span>";


              }
              else{
                  echo $word[$j];
              }
        }
        echo ' ';
    }

?>
</body>
</html>