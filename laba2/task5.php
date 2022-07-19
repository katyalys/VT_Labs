<?php

$new_array = array_values($_GET);
$len = mb_strlen($new_array[0]);
$len_arr = array();
$i = 0;

for ($j = 0; $j < count($new_array ); $j++){
    if(!(is_numeric($new_array[$j])) && mb_strlen($new_array[$j]) > $len) {
        $len_arr = array();
        $i = 0;
        $len = mb_strlen($new_array[$j]);
        $len_arr[$i] = $new_array[$j];
    }
    else if (!(is_numeric($new_array[$j])) && mb_strlen($len_arr[$i]) == mb_strlen($new_array[$j])){
        $i++;
        $len_arr[$i] = $new_array[$j];
    }
}

foreach ($len_arr as $row){
    echo "$row ";
}

