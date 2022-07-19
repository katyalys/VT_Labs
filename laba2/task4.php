<?php

//if user doesn't enter any parameters
if (count($_GET) == 0){
    echo "enter parameters";
}

$new_array = array_values($_GET);

// initialization
// check for the valid parameter
if (is_numeric($new_array[0]) && strpos($new_array[0], '.') == 0 && strpos($new_array[0], 'e') == 0) {
    $len = mb_strlen($new_array[0]);
    $chars = array();
    $sum = 0;

    // split into char
    // char sum
    for ($i = 0; $i < $len; $i++) {
        $chars[] = mb_substr($new_array[0], $i, 1);
        $sum += $chars[$i];
    }
    echo $sum;
}
else{
    echo 'enter number as first parameter';
}